<?php
session_start();


if (isset($_POST['submit'])) {
  include_once("../../includes/DbConn.php");

  $query = "update part set name=?, year=?, brand=?, price=?, qty=?, disc=? where partID=?";


  $stmt = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt, $query);

  mysqli_stmt_bind_param($stmt, "sisiisi", $_POST['name'], $_POST['year'], $_POST['brand'], $_POST['price'], $_POST['qty'], $_POST['disc'], $_POST['partID']);
  if (mysqli_stmt_execute($stmt)) {
    header("Location:../webPages/viewSpareParts.php?alert=success");
  } else {
    header("Location:../webPages/viewSpareParts.php?alert=unsuccess");
  }
}
