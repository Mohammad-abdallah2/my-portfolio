<?php

include("admin/includes/db_config.php");
session_start();


if (isset($_POST['submit'])) {

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
    $iduniq = uniqid();



    if (empty($name) || empty($fromEmail) || empty($subject) || empty($message)) {
        echo "<span class='form-error'>Fill in all fields!</span>";
        $errorEmpty = true;
    } elseif (!filter_var($fromEmail, FILTER_VALIDATE_EMAIL)) {
        echo "<span class='form-error'>The email is not valid!</span>";
        $errorEmail = true;
    } else {
        mail($fromEmail, "confirmation code", "Please enter the code to verify\n" . $iduniq, $headersconform);
        echo "<span style='color:blue;'>We have sent you a confirmation code. Please enter the code to verify your account </span>";
        echo "<span> <input type='text' id='iduniqinput' placeholder='Enter the code'></span>";
        echo "<span> <input type='hidden' id='idunihidden' value='.$iduniq.'></span>";
        echo "<span> <input type='submit' id='iduniqsubmit' class='primary_btn' value='Enter code'></span>";

        echo '
         <script>
        $(document).ready(function() {
            $("#iduniqsubmit").click(function() {
              var name = $("#iduniqinput").val();
              if(name == iduniq){
                    ' . mail($mailto, $subject, $message, $headers) . '
                     <span class="form-success">The message has been sent successfully</span>
              }else{
                  <span class="form-error">The code is wrong</span>
              }
        });
    </script>
         ';
    }
} else {
    echo 'There was an error!';
}

?>

<script>
    $("#fname, #email, #subject, #message").removeClass("input-error");

    var errorEmpty = "<?php echo $errorEmpty; ?>";
    var errorEmail = "<?php echo $errorEmail; ?>";

    if (errorEmpty == true) {
        $("#fname, #email, #subject, #message").addClass("input-error");
    }
    if (errorEmail == true) {
        $("#email").addClass("input-error");
    }
</script>

<script>
    $(document).ready(function() {
        $("#iduniqsubmit").click(function() {
            var iduniqinput = $("#iduniqinput").val();
            var idunihidden = $("#idunihidden").val();
            var name = $("#fname").val();
            var email = $("#email").val();
            var subject = $("#subject").val();
            var message = $("#message").val();
            var submit2 = $("#iduniqsubmit").val();
            $(".form-message-send").load("check.php", {
                idunihidden: idunihidden,
                iduniqinput: iduniqinput,
                name: name,
                email: email,
                subject: subject,
                message: message,
                submit2: submit2
            });
        });
    });
</script>