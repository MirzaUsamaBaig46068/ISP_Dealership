<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';  // Adjust the path to autoload.php if necessary

loadEnv(__DIR__ . '/.env');

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
        $mail->Host = $_ENV['SMTP_HOST'];
        $mail->SMTPAuth   = true;
        $mail->Username   = $_ENV['SMTP_USERNAME'];
        $mail->Password   = $_ENV['SMTP_PASSWORD'];
        $mail->SMTPSecure = $_ENV['SMTP_SECURE'];
        $mail->Port       = $_ENV['SMTP_PORT'];
        $mail->SMTPOptions = array(
                                  'ssl' => array(
                                  'verify_peer' => false,
                                  'verify_peer_name' => false,
                                  'allow_self_signed' => true
                                                ));
        
        // Recipients
        $mail->setFrom($_ENV['SMTP_FROM_EMAIL'], $_ENV['SMTP_FROM_NAME']);
        $mail->addAddress($_ENV['SMTP_TO_EMAIL'], $_ENV['SMTP_TO_NAME']);
        $mail->addCC($_ENV['SMTP_TO_EMAIL_CC'], $_ENV['SMTP_TO_NAME']);
        //SMTP_TO_EMAIL_CC=usama.baig@shispare.com
        
        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission - DirectStreamOne';
        $mail->Body = "<html><body style='margin: 0;
                font-family: \"Open Sans\", sans-serif;
                font-size: 1rem;
                font-weight: 400;
                line-height: 1.5;
                color: #8d8d8d;
                background-color: #fff;
                -webkit-text-size-adjust: 100%;
                -webkit-tap-highlight-color: rgba(0, 0, 0, 0);'>
                    <div class='container' style='width: 88%;
                    padding-right: var(--bs-gutter-x, 0.75rem);
                    padding-left: var(--bs-gutter-x, 0.75rem);
                    margin-right: auto;
                    margin-left: auto;'>
                <table border='0' cellpadding='0' cellspacing='0' width='100%'
                    style='table-layout:fixed;background-color:#f9f9f9;' id='bodyTable'>
                    <tbody>
                        <tr>
                            <td style='padding-right:10px;padding-left:10px;' align='center' valign='top' id='bodyCell'>
                                <table border='0' cellpadding='0' cellspacing='0' width='100%' class='wrapperWebview'
                                    style='max-width:600px;'>
                                    <tbody>
                                        <tr>
                                            <td align='center' valign='top'>
                                                <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                                                    <tbody>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table border='0' cellpadding='0' cellspacing='0' width='100%' class='wrapperBody' style='max-width:600px;'>
                    <tbody>
                        <tr>
                            <td align='center' valign='top'>
                                <table border='0' cellpadding='0' cellspacing='0' width='100%' class='tableCard'
                                    style='background-color: #fff;
                                    border-color: #e5e5e5;
                                    border-style: solid;
                                    border-width: 0 1px 1px 1px;'>
                                    <tbody>
                                        <tr>
                                            <td style='background-color:#15B9D9;font-size:1px;line-height:3px;'
                                                class='topBorder' height='3'>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td style='padding-top: 60px; padding-bottom: 20px;' align='center' valign='middle'
                                                class='emailLogo'>
                                                <a href='https://directstreamone.com' style='text-decoration: none;margin-right: 1rem;
                                                font-size: 1.25rem;
                                                white-space: nowrap;'>
                                                    <h1
                                                        style='color: #15B9D9 !important;
                                                        font-family: \"Open Sans\", sans-serif;
                                                        font-size: calc(1.375rem + 1.5vw);
                                                margin: 0 !important;
                                                padding: 0;
                                                font-weight: 500;
                                                line-height: 1.2;'>
                                                
                                                <img src='https://directstreamone.com/img/play-circle-solid.png' style='width: 1em;
                                                display: inline-block;
                                                font-size: inherit;
                                                height: 1em;
                                                overflow: visible;
                                                vertical-align: -.125em;' alt='Logo'>
                                                        Direct Stream<sup
                                                            style='font-size: small;
                                                            top: -1em;
                                                            color: #efa286 !important;
                                                            line-height: 0;
                                                            vertical-align: super;
                                                            position: relative;'>One</sup>
                                                    </h1>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='padding-left:20px;padding-right:20px;' align='center' valign='top'
                                                class='containtTable'>
                                                <table border='0' cellpadding='0' cellspacing='0' width='100%'
                                                    class='tableDescription'>
                                                    <tbody>
                                                        <tr>
                                                            <td style='padding-bottom: 20px;' align='center' valign='top'
                                                                class='description'>
                                                                <p
                                                                    style='color:#666;font-family:\"Open Sans\",Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:22px;text-align:center;padding:0;margin:0;text-align:start;'>
                                        Dear Sales Team,<br><br>

                                        We have received a new inquiry from our website. Please find the customer details below:
                                                                </pre>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                        <table style='width: 90%;border-left: inset;padding-left: 15px;padding-right: 20px;'>
                                        <tbody style='text-align:left;'>
                                        <tr>
                                        <th scope='row'>Name:</th>
                                        <td>".htmlspecialchars($name)."</td>
                                        </tr>
                                        <tr>
                                        <th scope='row'>Phone:</th>
                                        <td>".htmlspecialchars($phone)."</td>
                                        </tr>
                                        <tr>
                                        <th scope='row'>Email:</th>
                                        <td>".htmlspecialchars($email)."</td>
                                        </tr>
                                        <tr>
                                        <th scope='row'>From:</th>
                                        <td>".htmlspecialchars($source)."</td>
                                        </tr>
                                        <tr>
                                        <th scope='row'>Message:</th>
                                        <td>".htmlspecialchars($text)."</td>
                                        </tr>
                                        </tbody>
                                        </table>
                                        </tr>
                                        <tr>
                                            <td style='padding-left:20px;padding-right:20px;' align='center' valign='top'
                                                class='containtTable'>
                                                <table border='0' cellpadding='0' cellspacing='0' width='100%'
                                                    class='tableDescription'>
                                                    <tbody>
                                                        <tr>
                                                            <td style='padding-bottom: 20px;' align='center' valign='top'
                                                                class='description'>
                                                                <p
                                                                    style='color:#666;font-family:\"Open Sans\",Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:22px;text-align:center;padding:0;margin:0;text-align:start;'>
                                        <br>Please reach out to the customer using the provided information. Ensure to follow up as necessary to address their query and provide assistance.
                                        <br><br>
                                        Thank you for your prompt attention to this matter.
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='font-size:1px;line-height:1px;' height='20'>&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table border='0' cellpadding='0' cellspacing='0' width='100%' class='space'>
                                    <tbody>
                                        <tr>
                                            <td style='font-size:1px;line-height:1px;' height='10'>&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table border='0' cellpadding='0' cellspacing='0' width='100%' class='wrapperFooter' style='max-width:600px;'>
                    <tbody>
                        <tr>
                            <td align='center' valign='top'>
                                <table border='0' cellpadding='0' cellspacing='0' width='100%' class='footer'
                                    style='background: linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.9)), url(https://directstreamone.com/img/carousel-2.webp);
                                    background-position: center center;
                                    background-repeat: no-repeat;
                                    background-size: cover;'>
                                    <tbody>
                                        <tr>
                                            <td style='padding: 10px 10px 5px;' align='center' valign='top' class='brandInfo'>
                                                <p style='color:#bbb;font-family:\"Open Sans\",Helvetica,Arial,sans-serif;font-size:12px;font-weight:400;line-height:20px;text-align:center;padding:0;margin:0;'>© DirectStreamOne | 11088 Trask ave Garden Grove | California, CA 92843, USA.
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='padding: 0px 10px 20px;' align='center' valign='top' class='footerLinks'>
                                                <p
                                                    style='color:#bbb;font-family:\"Open Sans\",Helvetica,Arial,sans-serif;font-size:12px;font-weight:400;line-height:20px;text-align:center;padding:0;margin:0;'>
                                                    <a href='https://directstreamone.com' style='color:#bbb;text-decoration:underline;'
                                                        target='_blank'>View Web Version</a>&nbsp;|&nbsp;
                                                    <a href='#' style='color:#bbb;text-decoration:underline;'
                                                        target='_blank'>Email Preferences</a>&nbsp;|&nbsp;
                                                    <a href='https://directstreamone.com/Privacy-Policy' style='color:#bbb;text-decoration:underline;'
                                                        target='_blank'>Privacy Policy</a>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align='center'>
                                                <p
                                                    style='color:#bbb;font-family:\"Open Sans\",Helvetica,Arial,sans-serif;font-size:12px;font-weight:400;line-height:20px;text-align:center;padding:0;margin:0; text-decoration:none;'>
                                                    Please note: This email was sent to ". htmlspecialchars($email) ." from a
                                                    notification-only address that cannot accept incoming email. Please do not
                                                    reply to this email.
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='font-size: 1px; line-height: 1px;' height='30'>&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style='font-size:1px;line-height:1px' height='30'>&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
                </div>
                </body>
            </html>";
      
        $mail->AltBody = 'This is the body in styled text for HTML mail clients';

        $mail->send();
        echo 'Email has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
function loadEnv($filePath) {
    if (!file_exists($filePath)) {
        throw new Exception("The .env file does not exist: $filePath");
    }

    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue;
        }
        list($key, $value) = explode('=', $line, 2);
        $key = trim($key);
        $value = trim($value);
        if (!array_key_exists($key, $_ENV)) {
            $_ENV[$key] = $value;
        }
        if (!array_key_exists($key, $_SERVER)) {
            $_SERVER[$key] = $value;
        }
        putenv("$key=$value");
    }
}
?>