<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);

        // Set up SMTP
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'nmagsanop@gmail.com';
        $mail->Password = 'zwxu tgfv mkes csty';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Set sender and recipient
        $mail->setFrom($_POST['email'], $_POST['subject']);
        $mail->addAddress('nmagsanop@gmail.com');

        // Set email content
        $mail->isHTML(true);
        $mail->Subject = $_POST['subject'];
        $mail->Body = 'Name: ' . $_POST['subject'] . '<br>Email: ' . $_POST['user_email'] . '<br>Phone: ' . $_POST['contact'] . '<br>Message: ' . $_POST['message'];
        $mail->AltBody = 'Name: ' . $_POST['subject'] . '\nEmail: ' . $_POST['user_email'] . '\nPhone: ' . $_POST['contact'] . '\nMessage: ' . $_POST['message'];

        // Send email
        $mail->send();

        // Return success response
        $response = array('status' => 'success', 'message' => 'Mail sent successfully!');
        echo json_encode($response);
    } catch (Exception $e) {
        // Return error response
        $response = array('status' => 'error', 'message' => 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo);
        echo json_encode($response);
    }
} else {
    // Return error response for invalid form submission
    $response = array('status' => 'error', 'message' => 'Invalid form submission.');
    echo json_encode($response);
}
?>
