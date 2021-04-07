<?php
session_start();
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
  header("Location:../login.php"); 
}

if (isset($_POST['submit'])) {
    include_once("../../includes/DbConn.php");
    if($_POST['newpassword'] == $_POST['confirmpassword']){
    $pass = $_POST['confirmpassword'];
    $query=null;
    if($_SESSION['type']=="Salesman"){
        $query = "update salesman set pass=?,status=2 where email=?";
    }else if($_SESSION['type']=="Owner"){
        $query = "update owner set pass=? where email=?"; 
    }
    $encPass = password_hash($pass, PASSWORD_ARGON2ID);
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $query);
    mysqli_stmt_bind_param($stmt,"ss", $encPass, $_SESSION['email']);
 
    if(mysqli_stmt_execute($stmt)){
        header("Location:../webPages/passwordChange.php?alert=success");
    }else{
       header("Location:../webPages/passwordChange.php?alert=unsuccess");
    }

    }else{
        header("Location:../webPages/passwordChange.php?alert=passwords are not matching"); 
    }
}
?>