<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once PATH . 'lib/vendor/PHPMailer/src/Exception.php';
require_once PATH . 'lib/vendor/PHPMailer/src/PHPMailer.php';
require_once PATH . 'lib/vendor/PHPMailer/src/SMTP.php';

function SendMail($to, $subject, $mailText)
{

    //Создаем библиотеку
    $mail = new PHPMailer;

    //Говорим PHPMailer использовать SMTP
    $mail->isSMTP();

    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = 2;

    //Ask for HTML-friendly debug output
    $mail->Debugoutput = 'html';

    //Set the hostname of the mail server
    $mail->Host = 'smtp.rambler.ru';
    // use
    // $mail->Host = gethostbyname('smtp.gmail.com');
    // if your network does not support SMTP over IPv6

    //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 465;

    //Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'ssl';

    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;

    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = "rubiconetest@rambler.ru";

    //Password to use for SMTP authentication
    $mail->Password = "RubiconeTest123";

    //Set who the message is to be sent from
    $mail->setFrom('rubiconetest@rambler.ru', 'RubiconeTest');

    //Set an alternative reply-to address
    $mail->addReplyTo('rubiconetest@rambler.ru', 'RubiconeTest');

    //Set who the message is to be sent to
    $mail->addAddress($to, 'John Doe');

    //Set the subject line
    $mail->Subject = $subject;

    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    $mail->msgHTML($mailText, dirname(__FILE__));

    //Replace the plain text body with one created manually
    $mail->AltBody = 'Пожалуйста используйте нормальный браузер';

    //Attach an image file
    //$mail->addAttachment('images/phpmailer_mini.png');

    //send the message, check for errors
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
        //Section 2: IMAP
        //Uncomment these to save your message in the 'Sent Mail' folder.
        #if (save_mail($mail)) {
        #    echo "Message saved!";
        #}
    }

    exit();
}
