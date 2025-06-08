<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "the1997db") or die(mysqli_connect_errno($con));

if (isset($_POST["username"])) {
    $username = mysqli_real_escape_string($con, $_POST["username"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);

    $semak = mysqli_query($con, "SELECT * FROM register WHERE username='$username' AND password='$password'") or die(mysqli_error($con));

    $bilrekod = mysqli_num_rows($semak);

    if ($bilrekod == 0) {
        echo "Wrong username or password";
    } else {
        $datarekod = mysqli_fetch_array($semak);
        
        // Store necessary session data
        $_SESSION["id"] = $datarekod['id'];
        $_SESSION["username"] = $username;
        $_SESSION["status"] = $datarekod['status'];

        if ($datarekod['status'] == "USER") {
            // Convert index.html to index.php to maintain session
            header("location: index.php");
            exit();
        } elseif ($datarekod['status'] == "ADMIN") {
            header("location: admin.php");
            exit();
        }
    }
}
?>