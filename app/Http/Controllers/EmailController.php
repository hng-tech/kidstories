<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $recipient;
    private $message;
    private $subject;
    private $sender = 'kidsstoriesapp@gmail.com';
    private $password = 'helloworld123';

    public function __construct($recipient, $message, $subject)
    {
        $this->recipient = $recipient;
        $this->message = $message;
        $this->subject = $subject;
    }

    public function sendEmail () {
    
        $mail = new PHPMailer(true);                            // Passing `true` enables exceptions

        try {
             // Server settings
            $mail->SMTPDebug = 0;                                   // Enable verbose debug output
            $mail->isSMTP();                                        // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                                             // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                                 // Enable SMTP authentication
            $mail->Username = $this->sender;             // SMTP username
            $mail->Password = $this->password;              // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom($this->sender, 'KidStories');
            $mail->addAddress($this->recipient, '');  // Add a recipient, Name is optional
            
            //$mail->addReplyTo($this->sender, 'KidStories');
            //$mail->addCC($this->recipient);
            //$mail->addBCC($this->recipient);

            //Attachments (optional)
            // $mail->addAttachment('/var/tmp/file.tar.gz');            // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');   // Optional name

            //Content
            $mail->isHTML(true);                                                                    // Set email format to HTML
            $mail->Subject = $this->subject;
            $mail->Body    = $this->message;                     // message
    
            $mail->send();
            
            return 'success: Message has been sent!';
            
            } catch (Exception $e) {
                return 'error: Message could not be sent!!!' .$e;
            }
        //}
        //return 'view(phpmailer)';
  }
} 