<?php
include_once "includes/DB.inc.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


?>
<!DOCTYPE html>
<html>
<head>
    <title>Verifying Mail</title>
</head>
<body>
<h1>Verifying Mail</h1>
<form action="" method="post">
    <label>Enter Your Verification Code:</label><br>
    <input type="text" name="VCode"><br>
    <input type="submit" value="Submit" name="Submit">
    <input type="submit" value="Re-Send Code" name="resend_code">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $VCode = $_POST["VCode"] ?? '';
    $VC = $_COOKIE['VCode'] ?? ''; // Check if cookie exists
    $EmailUn = $_COOKIE['Emailforv'] ?? ''; // Check if cookie exists
    $FnameforM = $_COOKIE['Fnameforv'] ?? ''; // Check if cookie exists

    if (isset($_POST['Submit'])) {
        if ($VC === $VCode) {
            echo "Mail Verified Successfully";
            header("Location:Login.php");
            exit(); // Ensure script stops after redirection
        } else {
            echo "Invalid Verification Code<br><br>";
        }
    }

    if (isset($_POST['resend_code'])) {
        $RVCode = bin2hex(random_bytes(3)); // Generate a new random code
        setcookie("VCode", $RVCode, time() + 1500); // Update cookie with the new code

        require 'vendor/autoload.php'; // Load SendGrid

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("youssefashrafdem@gmail.com", "ASP");
        $email->setSubject("VERIFY YOUR MAIL");
        $email->addTo($EmailUn, $FnameforM);
        $email->addContent("text/plain", "Your code: " . $RVCode);

        $sendgrid = new \SendGrid('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');

        try {
            $response = $sendgrid->send($email);
            echo "Verification code has been resent to your email.";
        } catch (Exception $e) {
            error_log('Caught exception: ' . $e->getMessage());
            echo "An error occurred while sending the email.";
        }
    }
}
?>

</body>
</html>
