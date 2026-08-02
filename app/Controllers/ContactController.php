<?php

namespace App\Controllers;

use duncan3dc\Laravel\BladeInstance;
use App\Mailer;

class ContactController
{
    protected $blade;

    public function __construct(BladeInstance $blade)
    {
        $this->blade = $blade;
    }

    public function show()
    {
        echo $this->blade->render('contact');
    }

    public function send()
    {
        $name    = trim($_POST['name'] ?? '');
        $phone   = trim($_POST['phone'] ?? '');
        $message = trim($_POST['description'] ?? '');

        $errors = [];

        if ($name === '') {
            $errors['name'] = 'Please enter your name.';
        }

        if ($phone === '' || !preg_match('/^[0-9+\-\s()]{7,15}$/', $phone)) {
            $errors['phone'] = 'Please enter a valid contact number.';
        }

        if ($message === '') {
            $errors['description'] = 'Please describe your enquiry.';
        }

        if (!empty($errors)) {
            echo $this->blade->render('contact', [
                'errors' => $errors,
                'old'    => [
                    'name'        => $name,
                    'phone'       => $phone,
                    'description' => $message,
                ],
            ]);
            return;
        }

        $mailer = new Mailer();

        $subject = 'Contact Form: ' . $name . ' (' . $phone . ')';

        $body = implode("\n", [
            'You have received a new message from the website contact form.',
            '',
            'Name: ' . $name,
            'Contact Number: ' . $phone,
            '',
            'Description:',
            $message,
        ]);

        $result = $mailer->send($mailer->config('mail_to'), $subject, $body);

        $status = $result['success'] ? 'success' : 'error';

        echo $this->blade->render('contact', [
            'status' => $status,
            'message' => $result['success']
                ? 'Thank you, ' . $name . '! Your message has been sent. We will get back to you soon.'
                : 'Sorry, your message could not be sent. Please try again later.',
            'old' => [
                'name'        => '',
                'phone'       => '',
                'description' => '',
            ],
        ]);
    }
}
