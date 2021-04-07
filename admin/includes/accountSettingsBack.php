<?php
session_start();
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
  header("Location:../login.php"); 
}

if (isset($_POST['submit'])) {
    include_once("../../includes/DbConn.php");
    $query=null;
    if($_SESSION['type']=="Salesman"){
        $query = "update salesman set fname=?, lname=?, address=?, phone=? where email=?";
    }else if($_SESSION['type']=="Owner"){
        $query = "update owner set fname=?, lname=?, address=?, phone=? where email=?"; 
    }
    
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $query);
    mysqli_stmt_bind_param($stmt,"sssis", $_POST['fname'],$_POST['lname'],$_POST['address'],$_POST['phone'],$_SESSION['email']);
    if(mysqli_stmt_execute($stmt)){
        header("Location:../webPages/accountSettings.php?alert=success");
    }else{
       header("Location:../webPages/accountSettings.php?alert=unsuccess");
    }
}
?>
