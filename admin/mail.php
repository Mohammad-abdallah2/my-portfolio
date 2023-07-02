<?php
session_start();
include "examples/db_config.php";

if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $name = mysqli_real_escape_string($conn,$name);
    $password = htmlspecialchars($_POST['password']);
    $password = mysqli_real_escape_string($conn, $password);

    $errorEmpty = false;

    if (empty($name) || empty($password)) {
        echo "<span class='form-error'>Fill in all fields!</span>";
        $errorEmpty = true;
    } else {
        $sql = "SELECT * FROM `information` WHERE username = '$name' and password = '$password' limit 1";
        $result = mysqli_query($conn, $sql);
        if (!$result || mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $_SESSION['id'] = $row['id'];
                echo '<script> window.location.href = "examples/index.php"; </script>';
            }
        } else {
            echo "<span class='form-error'>The username or password is wrong</span>";
        }
    }
} else {
    echo 'There was an error!';
}

?>

<script>
    $("#mail-name, #mail-password").removeClass("input-error");

    var errorEmpty = "<?php echo $errorEmpty; ?>";

    if (errorEmpty == true) {
        $("#mail-name, #mail-password").addClass("input-error");
    }
    if (errorEmpty == false) {
        $("#mail-name, #mail-password").val("");
    }
</script>