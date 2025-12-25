<?php 

namespace App\Helpers;

use Mail;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\View;

class Mailer
{
    public static function sendMail(
        $subject,
        $receiver_email,
        $receiver_name,
        $template,
        $data,
        $attachments = []
    ) {
        Mail::send($template, $data, function ($message) use (
            $receiver_email,
            $receiver_name,
            $subject,
            $attachments
        ) {

            $message
                ->from(env('MAIL_FROM_ADDRESS'), 'GulfRealty.ae')
                ->to($receiver_email, $receiver_name)
                ->subject($subject);

            // Attach files if available
            if (!empty($attachments)) {
                foreach ($attachments as $file) {
                    if (file_exists($file)) {
                        $message->attach($file);
                    }
                }
            }
        });

        return true;
    }
}