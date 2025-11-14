<?php 

namespace App\Helpers;

use Mail;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\View;

class Mailer
{
    public static function sendMail($subject, $receiver_email, $receiver_name, $template, $data)
    {
       
        Mail::send($template, $data, function($message) use ($receiver_email, $receiver_name, $subject) {
             $message->to($receiver_email, $receiver_name)->subject
                ($subject);
             $message->from(env('MAIL_FROM_ADDRESS'),'GulfRealty.ae');
          });

        return true;
    }
}