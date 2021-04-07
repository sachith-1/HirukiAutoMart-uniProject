<?php

session_start();
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header("Location:../login.php");
    exit();
}

include_once("DbConn.php");

$custID = $_SESSION['custID'];

if (isset($_POST['vehi'])) {

    $carID = $_POST['id'];
    $name = $_POST['name'];
    $qty = $_POST['qty'];
    $price = $_POST['preprice'];
    $img = $_POST['img'];
    $period = $_POST['period'];
    $sql = "insert into preoder (custID,carID,qty,fullPayDuration) values('" . $custID . "','" . $carID . "','" . $qty . "','" . $period . "') ";
    if (!mysqli_query($conn, $sql)) {
        header("Location:../product.php?type=Vehicles&id=$carID&alert=error");
        exit();
    } else {
        header("Location:../cart.php");
        exit();
    }
} else if (isset($_POST['part'])) {

    $partID = $_POST['id'];
    $name = $_POST['name'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    $img = $_POST['img'];
    $sql = "insert into oder (custID,partID,qty) values('" . $custID . "','" . $partID . "','" . $qty . "') ";
    if (!mysqli_query($conn, $sql)) {
        header("Location:../product.php?type=Spare-Parts&id=$partID&alert=error");
        exit();
    } else {
        header("Location:../cart.php?qty=$qty");
        exit();
    }
} else {
    header("Location:../index.php");
    exit();
}
