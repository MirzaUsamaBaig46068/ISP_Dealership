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
        $main->Body = '
<div class="container">
    <table border="0" cellpadding="0" cellspacing="0" width="100%"
        style="table-layout:fixed;background-color:#f9f9f9" id="bodyTable">
        <tbody>
            <tr>
                <td style="padding-right:10px;padding-left:10px;" align="center" valign="top" id="bodyCell">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="wrapperWebview"
                        style="max-width:600px">
                        <tbody>
                            <tr>
                                <td align="center" valign="top">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                        <tbody>
                                            <!-- Add your content here -->
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="wrapperBody" style="max-width:600px">
        <tbody>
            <tr>
                <td align="center" valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="tableCard"
                        style="background-color:#fff;border-color:#e5e5e5;border-style:solid;border-width:0 1px 1px 1px;">
                        <tbody>
                            <tr>
                                <td style="background-color:#15B9D9;font-size:1px;line-height:3px" class="topBorder"
                                    height="3">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="padding-top: 60px; padding-bottom: 20px;" align="center" valign="middle"
                                    class="emailLogo">
                                    <a href="index.html" class="navbar-brand p-0">
                                        <h1 class="text-primary m-0" style="font-family:\'Open Sans\',sans-serif;">
                                            <i class="fas fa-play-circle"></i>
                                            Direct Stream<sup class="text-secondary"
                                                style="font-size: small; top: -1em;">One</sup>
                                        </h1>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom: 5px; padding-left: 20px; padding-right: 20px;"
                                    align="center" valign="top" class="mainTitle">
                                    <h2 class="text"
                                        style="color:#000;font-family:\'Open Sans\',sans-serif;font-size:28px;font-weight:500;font-style:normal;letter-spacing:normal;line-height:36px;text-transform:none;text-align:center;padding:0;margin:0">
                                        Hi ""</h2>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left:20px;padding-right:20px" align="center" valign="top"
                                    class="containtTable ui-sortable">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%"
                                        class="tableDescription">
                                        <tbody>
                                            <tr>
                                                <td style="padding-bottom: 20px;" align="center" valign="top"
                                                    class="description">
                                                    <p class="text"
                                                        style="color:#666;font-family:\'Open Sans\',Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:22px;text-transform:none;text-align:center;padding:0;margin:0">
                                                        We are received your query, our representative will get in touch with 
                                                        you within 2 business working days.
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size:1px;line-height:1px" height="20">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="space">
                        <tbody>
                            <tr>
                                <td style="font-size:1px;line-height:1px" height="10">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="wrapperFooter" style="max-width:600px">
        <tbody>
            <tr>
                <td align="center" valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="footer">
                        <tbody>
                            <tr>
                                <td style="padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px"
                                    align="center" valign="top" class="socialLinks">
                                    <div class="d-flex justify-content-center">
                                        <a class="btn-square btn btn-primary text-white rounded-circle mx-1"
                                            href=""><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn-square btn btn-primary text-white rounded-circle mx-1"
                                            href=""><i class="fab fa-twitter"></i></a>
                                        <a class="btn-square btn btn-primary text-white rounded-circle mx-1"
                                            href=""><i class="fab fa-instagram"></i></a>
                                        <a class="btn-square btn btn-primary text-white rounded-circle mx-1"
                                            href=""><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px 10px 5px;" align="center" valign="top" class="brandInfo">
                                    <p class="text"
                                        style="color:#bbb;font-family:\'Open Sans\',Helvetica,Arial,sans-serif;font-size:12px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:20px;text-transform:none;text-align:center;padding:0;margin:0">
                                        ©&nbsp;Vespro Inc. | 800 Broadway, Suite 1500 | New York, NY 000123, USA.
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0px 10px 20px;" align="center" valign="top" class="footerLinks">
                                    <p class="text"
                                        style="color:#bbb;font-family:\'Open Sans\',Helvetica,Arial,sans-serif;font-size:12px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:20px;text-transform:none;text-align:center;padding:0;margin:0">
                                        <a href="#" style="color:#bbb;text-decoration:underline"
                                            target="_blank">View
                                            Web Version </a>&nbsp;|&nbsp; <a href="#"
                                            style="color:#bbb;text-decoration:underline" target="_blank">Email
                                            Preferences
</a>&nbsp;|&nbsp; <a href="#"
                                        style="color:#bbb;text-decoration:underline" target="_blank">Privacy
                                        Policy</a>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-item-center">
                                <p style="color:#bbb;font-family:\'Open Sans\',Helvetica,Arial,sans-serif;font-size:12px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:20px;text-transform:none;text-align:center;padding:0;margin:0">
                                    Please note: This email was sent to '.htmlspecialchars($email).' from a notification-only address that cannot accept incoming email. Please do not reply to this email.
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size:1px;line-height:1px" height="30">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td style="font-size:1px;line-height:1px" height="30">&nbsp;</td>
        </tr>
    </tbody>
</table>
</div>
<script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
';




        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Email has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
