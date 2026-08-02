<?php

namespace App;

/**
 * Simple mailer for the AAA LED contact form.
 *
 * Reads its settings from config/mail.php. By default it sends with the
 * native PHP mail() function. When MAIL_USE_SMTP is enabled in the config
 * it connects directly to the SMTP server (used for Gmail app passwords).
 */
class Mailer
{
    protected array $config;

    public function __construct()
    {
        $this->config = require dirname(__DIR__) . '/config/mail.php';
    }

    public function config(string $key, $default = null)
    {
        return $this->config[$key] ?? $default;
    }

    /**
     * Send a plain-text email.
     *
     * @return array{success: bool, error?: string}
     */
    public function send(string $to, string $subject, string $body): array
    {
        $from = $this->config('mail_from');
        $fromName = $this->config('mail_from_name');

        if ($this->config('mail_use_smtp')) {
            return $this->sendViaSmtp($to, $subject, $body, $from, $fromName);
        }

        return $this->sendViaNative($to, $subject, $body, $from, $fromName);
    }

    /**
     * Send using the server's native mail() function.
     */
    protected function sendViaNative(string $to, string $subject, string $body, string $from, string $fromName): array
    {
        $headers = implode("\r\n", [
            'MIME-Version: 1.0',
            'Content-Type: text/plain; charset=UTF-8',
            'From: ' . $this->encodeName($fromName) . ' <' . $from . '>',
            'Reply-To: ' . $to,
        ]);

        $ok = @mail($to, $this->encodeSubject($subject), $body, $headers);

        return $ok
            ? ['success' => true]
            : ['success' => false, 'error' => 'The server mail() function failed.'];
    }

    /**
     * Send directly over SMTP using a raw socket (TLS supported).
     */
    protected function sendViaSmtp(string $to, string $subject, string $body, string $from, string $fromName): array
    {
        $host = $this->config('smtp_host');
        $port = (int) $this->config('smtp_port', 587);
        $encryption = strtolower($this->config('smtp_encryption', 'tls'));
        $username = $this->config('mail_username');
        $password = $this->config('mail_password');

        if ($password === '' || str_contains($password, 'YOUR_GMAIL_APP_PASSWORD')) {
            return ['success' => false, 'error' => 'SMTP password is not configured in config/mail.php.'];
        }

        $remote = ($encryption === 'ssl' ? 'ssl://' : 'tcp://') . $host . ':' . $port;
        $context = stream_context_create(['ssl' => ['verify_peer' => true, 'verify_peer_name' => true]]);

        $conn = @stream_socket_client($remote, $errno, $errstr, 15, STREAM_CLIENT_CONNECT, $context);
        if (!$conn) {
            return ['success' => false, 'error' => "SMTP connection failed: $errstr ($errno)"];
        }

        $buffer = [];
        if (!$this->smtpExpect($conn, 220, $buffer)) {
            return $this->smtpError($conn, $buffer, 'Connection greeting');
        }

        $this->smtpCommand($conn, "EHLO " . ($_SERVER['SERVER_NAME'] ?? 'localhost'), $reply, $buffer);
        if ($encryption === 'tls') {
            $this->smtpCommand($conn, "STARTTLS", $reply, $buffer);
            if (!stream_socket_enable_crypto($conn, true, STREAM_CRYPTO_METHOD_TLS_CLIENT)) {
                fclose($conn);
                return ['success' => false, 'error' => 'Failed to enable TLS.'];
            }
            $this->smtpCommand($conn, "EHLO " . ($_SERVER['SERVER_NAME'] ?? 'localhost'), $reply, $buffer);
        }

        $this->smtpCommand($conn, "AUTH LOGIN", $reply, $buffer);
        $this->smtpCommand($conn, base64_encode($username), $reply, $buffer);
        $this->smtpCommand($conn, base64_encode($password), $reply, $buffer);

        if (!$this->smtpCommand($conn, "MAIL FROM:<{$from}>", $reply, $buffer)) {
            return $this->smtpError($conn, $buffer, 'MAIL FROM');
        }
        if (!$this->smtpCommand($conn, "RCPT TO:<{$to}>", $reply, $buffer)) {
            return $this->smtpError($conn, $buffer, 'RCPT TO');
        }

        if (!$this->smtpCommand($conn, "DATA", $reply, $buffer)) {
            return $this->smtpError($conn, $buffer, 'DATA');
        }

        $data = implode("\r\n", [
            "Date: " . date(DATE_RFC2822),
            "From: {$this->encodeName($fromName)} <{$from}>",
            "To: <{$to}>",
            "Subject: {$this->encodeSubject($subject)}",
            'MIME-Version: 1.0',
            'Content-Type: text/plain; charset=UTF-8',
            '',
            str_replace("\n.", "\n..", str_replace("\r\n", "\n", $body)),
            '.',
        ]);

        fwrite($conn, $data . "\r\n");
        if (!$this->smtpExpect($conn, 250, $buffer)) {
            return $this->smtpError($conn, $buffer, 'Message body');
        }

        $this->smtpCommand($conn, "QUIT", $reply, $buffer);
        fclose($conn);

        return ['success' => true];
    }

    protected function smtpCommand($conn, string $cmd, ?array &$reply, array &$buffer): bool
    {
        fwrite($conn, $cmd . "\r\n");
        return $this->smtpExpect($conn, [250, 235, 334, 354], $buffer);
    }

    protected function smtpExpect($conn, $codes, array &$buffer): bool
    {
        if (!is_array($codes)) {
            $codes = [$codes];
        }
        $buffer = [];
        while (($line = fgets($conn, 515)) !== false) {
            $buffer[] = trim($line);
            $code = (int) substr($line, 0, 3);
            // A space after the code means the response is complete.
            if (isset($line[3]) && $line[3] === ' ') {
                return in_array($code, $codes, true);
            }
        }
        return false;
    }

    protected function smtpError($conn, array $buffer, string $step): array
    {
        fclose($conn);
        return [
            'success' => false,
            'error' => "SMTP $step failed: " . implode(' | ', array_slice($buffer, -3)),
        ];
    }

    protected function encodeSubject(string $subject): string
    {
        return '=?UTF-8?B?' . base64_encode($subject) . '?=';
    }

    protected function encodeName(string $name): string
    {
        return strpos($name, '=') === false ? '=?UTF-8?B?' . base64_encode($name) . '?=' : $name;
    }
}
