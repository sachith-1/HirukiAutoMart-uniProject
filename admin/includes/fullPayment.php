<?php
session_start();
if (!isset($_SESSION['type']) || empty($_SESSION['type'])) {
    header("Location:../login.php");
}
if (!isset($_GET['preID'])) {
    header("Location:../Dashboard.php");
}
include_once("../../includes/DbConn.php");

$email = $_SESSION['email'];
$aID = '';
if ($_SESSION['type'] == "Owner") {
    $query = "select OwnID from owner where email='$email'";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $aID = $row['OwnID'];
    }
} else {
    $query = "select smanID from salesman where email=$email";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $aID = $row['smanID'];
    }
}

$aType = $_SESSION['type'];
$preID = $_GET['preID'];
$timestamp = date("Y-m-d h:i:sa");
$carID = '';
//add to carfullpayed table

$query = "select custID,car.name,car.carYear,preoder.carID from preoder inner join car on preoder.carID=car.carID where preoderID=$preID and isPaid=2";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $custID = $row['custID'];
    $cname = $row['name'];
    $carYear = $row['carYear'];
    $carID = $row['carID'];
    $query = "insert into carfullpayed (custID,adminID,cName,year,timeStamp,aType) values($custID,$aID,'$cname',$carYear,'$timestamp','$aType')";
    if (!mysqli_query($conn, $query)) {
        header("Location:../webPages/carPreOders.php?alert=error");
    }
}

//delete the row from preorder talbe

$query = "delete from preoder where preoderID=$preID";
if (!mysqli_query($conn, $query)) {
    header("Location:../webPages/carPreOders.php?alert=error");
}

//delete the row from carTable

$query = "delete from car where carID=$carID";
if (!mysqli_query($conn, $query)) {
    header("Location:../webPages/carPreOders.php?alert=error");
}
//redirect
header("Location:../webPages/carPreOders.php?alert=success");
