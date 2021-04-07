<?php
if (empty($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header("Location:../login.php");
    exit();
}

include_once("DbConn.php");

if (!isset($_GET['preoderID'])) {
    if (!isset($_GET['oderID'])) {
        header("Location:../index.php");
    } else {
        $oderID = $_GET['oderID'];
        $query = "delete from oder where oderID=$oderID";
        if (!mysqli_query($conn, $query)) {
            header("Location:../cart.php?alert=error");
        } else {
            header("Location:../cart.php?alert=success");
        }
    }
} else {
    $preID = $_GET['preoderID'];
    $query = "delete from preoder where preoderID=$preID";
    if (!mysqli_query($conn, $query)) {
        header("Location:../cart.php?alert=error");
    } else {
        header("Location:../cart.php?alert=success");
    }
}
