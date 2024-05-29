<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';  // Adjust the path to autoload.php if necessary

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $source = $_POST['source'];
    $text = $_POST['text'];

    if (empty($name) || empty($email) || empty($phone) || empty($source) || empty($text)) {
        echo "All fields are required.";
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host       = 'mail.directstreamone.com';//getenv('SMTP_HOST');directstreamone.com
        $mail->SMTPAuth   = true;
        $mail->Username   = 'team@directstreamone.com';//getenv('SMTP_USERNAME');
        $mail->Password   = 'r&DsRB1N0HwD';//getenv('SMTP_PASSWORD');
        $mail->SMTPSecure = 'tls';
        $mail->Port       = '587';//getenv('SMTP_PORT');
        $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
        
        // Recipients
        $mail->setFrom('team@directstreamone.com', 'Support Team');//getenv('SMTP_USERNAME')
        $mail->addAddress('usamamirza11999@gmail.com', 'Usama User');//getenv('SMTP_EMAILTO')

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = '<body class="bg-light">
        <div class="container">
          <img class="ax-center my-10 w-24" src="https://assets.bootstrapemail.com/logos/light/square.png" />
          <div class="card p-6 p-lg-10 space-y-4">
            <h1 class="h3 fw-700">
              Simple Card
            </h1>
            <p>
              Here is a very simple card. It has responsive padding so it gets less padding on mobile to fill the screen more.
              Hopefully it can be useful to you. It is very simple and basic but can be used for a lot of simple emails.
            </p>
            <a class="btn btn-primary p-3 fw-700" href="https://app.bootstrapemail.com/templates">Visit Website</a>
          </div>
          <img class="ax-center mt-10 w-40" src="https://assets.bootstrapemail.com/logos/light/text.png" />
          <div class="text-muted text-center my-6">
            Sent with <3 from Hip Corp. <br>
            Hip Corp. 1 Hip Street<br>
            Gnarly State, 01234 USA <br>
          </div>
        </div>
      </body>';
        // $mail->Body    = "<html><body>
        //                   <h2>Contact Form Submission</h2>
        //                   <p><strong>Name:</strong> " . htmlspecialchars($name) . "</p>
        //                   <p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>
        //                   <p><strong>Phone:</strong> " . htmlspecialchars($phone) . "</p>
        //                   <p><strong>Source:</strong> " . htmlspecialchars($source) . "</p>
        //                   <p><strong>Message:</strong> " . nl2br(htmlspecialchars($text)) . "</p>
        //                   </body></html>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Email has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
