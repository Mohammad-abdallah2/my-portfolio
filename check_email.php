<?php
include("admin/includes/db_config.php");
session_start();



if (isset($_POST['submit2'])) {
    $idunihidden = $_POST['idunihidden'];
    $iduniqinput = $_POST['iduniqinput'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];


    $mailto = "mohammadadballah4@gmail.com";  //My email address
    //getting customer data
    $name =  mysqli_real_escape_string($conn, $_POST['name']); //getting customer name
    $fromEmail =  mysqli_real_escape_string($conn, $_POST['email']); //getting customer email
    $subject =  mysqli_real_escape_string($conn, $_POST['subject']); //getting subject line from client

    //Email body I will receive
    $message = "Name: " . $name . "\n"
        . "The Message: " . "\n" .  mysqli_real_escape_string($conn, $_POST['message']);

    //Email headers
    $headers = "From: " . $fromEmail; // Client email, I will receive
    $errorEmpty = $errorEmail = false;
    $headersconform = "From: " . $mailto; // Client email, I will receive



    if ($iduniq2 == $iduniq) {
        mail($mailto, $subject, $message, $headers);
        echo "<span class='form-success'>The message has been sent successfully</span>";
    } else {
        echo "<span class='form-error'>The code is wrong</span>";
    }
}