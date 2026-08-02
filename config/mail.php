<?php

// =========================================================
// Mail configuration
// ---------------------------------------------------------
// Fill in your real values below. For Gmail use an App
// Password (https://myaccount.google.com/apppasswords):
//   MAIL_USERNAME  = your gmail address (e.g. aaa@gmail.com)
//   MAIL_PASSWORD  = the 16-character app password
//   MAIL_TO        = the inbox that receives contact forms
//
// If MAIL_USE_SMTP is false the mailer falls back to the
// server's native mail() function and ignores the SMTP
// host/port below.
// =========================================================

return [
    'mail_use_smtp' => true,

    'smtp_host'        => 'smtp.gmail.com',
    'smtp_port'        => 587,
    'smtp_encryption'  => 'tls', // 'tls' or 'ssl'

    'mail_username'    => 'mailcheck0733@gmail.com',
    'mail_password'    => 'qxpacebosjwppfas',

    'mail_from'        => 'mailcheck0733@gmail.com',
    'mail_from_name'   => 'AAA LED Contact Form',

    'mail_to'          => 'yahi0733@gmail.com',
    'mail_to_name'     => 'AAA LED Admin',

    'mail_subject'     => 'New Contact Form Message',
];
