<?php

include("admin/includes/db_config.php");
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['submit'])) {

    $mailto = "mohammadadballah4@gmail.com";  //My email address
    //getting customer data
    $name = $_POST['name']; //getting customer name
    $fromEmail = $_POST['email']; //getting customer email
    $subject = $_POST['subject']; //getting subject line from client

    //Email body I will receive
    $message = "Cleint Name: " . $name . "\n"
        . "Client Message: " . "\n" . $_POST['message'];

    //Email headers
    $headers =  'MIME-Version: 1.0' . "\r\n";
    $headers .= 'From: Your name' . $fromEmail . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; // Client email, I will receive
    $errorEmpty = false;

    if (empty($name) || empty($fromEmail) || empty($subject) || empty($message)) {
        echo "<span class='form-error'>Fill in all fields!</span>";
        $errorEmpty = $errorEmail = false;
    } elseif (!filter_var($fromEmail, FILTER_VALIDATE_EMAIL)) {
        echo "<span class='form-error'>The email is not valid!</span>";
        $errorEmail = true;
    } else {
        if (mail($mailto, $subject, $message, $headers)) { // This email sent to My address
            echo "<span class='form-success'>The message has been sent successfully</span>";
        } else {
            echo "<span class='form-error'>The message has not sent!</span>";
        }
    }
} else {
    echo 'There was an error!';
}

?>

<script>
    $("#fname, #email, #subject, #message").removeClass("input-error");

    var errorEmpty = "<?php echo $errorEmpty; ?>";

    if (errorEmpty == true) {
        $("#fname, #email, #subject, #message").addClass("input-error");
    }
    if (errorEmail == true) {
        $("#email").addClass("input-error");
    }
    if (errorEmpty == false) {
        $("#fname, #email, #subject, #message").val("");
    }
</script>