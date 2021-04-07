<?php
session_start();
if (!isset($_SESSION['type']) || empty($_SESSION['type'])) {
    header("Location:../login.php");
}
include_once("../../includes/DbConn.php");
$partID = $_GET['partID'];
if ($_SESSION['type'] == 'Owner') {
    $query = "delete from part where partID=$partID";
    if (mysqli_query($conn, $query)) {
        header("Location:../webPages/viewSpareParts.php?alert=success");
    } else {
        header("Location:../webPages/viewSpareParts.php?alert=unsuccess");
    }
} else {
    header("Location:viewSpareParts.php");
}
