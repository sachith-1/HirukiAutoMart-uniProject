<?php
if (!isset($_POST['email'])) { //to change pass comming from chnge pass by logged user
    header("Location:../index.php");
} else {
    include_once("DbConn.php");
    $pass = $_POST['pass'];
    if (empty($_SESSION)) {
        session_start();
    }
    $email = $_SESSION['email'];
    $encpass = password_hash($pass, PASSWORD_ARGON2ID);
    $query = "update customer set pass=? where email=?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $query);
    mysqli_stmt_bind_param($stmt, "ss", $encpass, $email);
    if (mysqli_stmt_execute($stmt)) {
        header("Location:../supPages/passchanged.php?bool=true");
        exit();
    } else {
        echo "Something went wrong while Changing your password trye again later";
    }
}
