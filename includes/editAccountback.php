<?php
if (empty($_SESSION)) {
    session_start();
}
if (isset($_POST['edit'])) {
    include_once("DbConn.php");
    $query = "update customer set fname=?,lname=?,address=?,gender=?,phone=? where email=?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $query);
    mysqli_stmt_bind_param($stmt, "ssssis", $_POST['fname'], $_POST['lname'], $_POST['address'], $_POST['gender'], $_POST['phone'], $_SESSION['email']);
    if (mysqli_stmt_execute($stmt)) {
        header("Location:../index.php?alert=success");
    } else {
        header("Location:../index.php?alert=unsuccess");
    }
}
