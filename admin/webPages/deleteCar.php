<?php
session_start();
if (!isset($_SESSION['type']) || empty($_SESSION['type'])) {
    header("Location:../login.php");
}
include_once("../../includes/DbConn.php");
$carID = $_GET['carID'];
if ($_SESSION['type'] == 'Owner') {
    $query = "delete from car where carID=$carID";
    if(mysqli_query($conn,$query)){
        header("Location:../webPages/viewCars.php?alert=success");
    }else{
        header("Location:../webPages/viewCars.php?alert=unsuccess");
    }
}
?>