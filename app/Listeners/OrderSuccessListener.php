<?php

namespace App\Listeners;

use App\Events\OrderSuccess;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use PHPMailer\PHPMailer\PHPMailer;

class OrderSuccessListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderSuccess  $event
     * @return void
     */
    public function handle(OrderSuccess $event)
    {
        $email = $event->email;

        $mail = Mail::send(['html' => 'order.email_notification'], $email['data'], function ($msg) use ($email) {
            $msg->to($email['mail_to']);
            $msg->subject($email['subject']);
        });

        // $mail = new PHPMailer(true);
        // try{
        //     $mail->isSMTP();     
        //     $mail->CharSet = "utf-8";
        //     $mail->Host = env('MAIL_HOST', '');
        //     $mail->SMTPAuth = true;
        //     $mail->Username = env('MAIL_USERNAME');                 // SMTP username
        //     $mail->Password = env('MAIL_PASSWORD');                           // SMTP password
        //     $mail->SMTPSecure = env('MAIL_ENCRYPTION');
        //     $mail->Port = env('MAIL_PORT');

        //     //Recipients
        //     $mail->setFrom(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
        //     $mail->addAddress($email['mail_to']);

        //     //Content
        //     $mail->isHTML(true);                                  // Set email format to HTML
        //     $mail->Subject = $email['subject'];
        //     $mail->Body    = $email['body'];

        //     $mail->send();
        // } catch (Exception $e) {
            
        // }
    }
}
