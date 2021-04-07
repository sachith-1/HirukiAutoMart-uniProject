<?php
session_start();


if (isset($_POST['submit'])) {
    include_once("../../includes/DbConn.php");

    $query = "update car set name=?, colour=?, brand=?, price=? ,PreOderPrice=?, carYear=?, fuelType=?, milege=?, period=?  where carID=?";

    
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $query);

    mysqli_stmt_bind_param($stmt,"sssiiissii", $_POST['name'], $_POST['colour'], $_POST['brand'], $_POST['price'], $_POST['PreOderPrice'], $_POST['year'],$_POST['fueltype'],$_POST['milege'],$_POST['period'],$_POST['carID']);
    if(mysqli_stmt_execute($stmt)){
       header("Location:../webPages/viewCars.php?alert=success");
    }else{
      header("Location:../webPages/viewCars.php?alert=unsuccess");
    }
}
?>
