<?php
session_start();
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header("Location:../login.php");
}
if (isset($_POST['submit'])) {
    if (isset($_POST['fname'], $_POST['lname'], $_POST['address'], $_POST['email'], $_POST['phone'], $_POST['nic'])) {

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $nic = $_POST['nic'];
        $genPass=password_generate(8);
        $encPass = password_hash($genPass, PASSWORD_ARGON2ID);

        include_once("../../includes/DbConn.php");
        if (emailCheck($email, $conn)) {
            $query = "insert into salesman(fname,lname,address,NIC,email,phone,pass,status,vkey)
                    values(?,?,?,?,?,?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $query)) {
                header("Location:../webPages/addCustomer.php?error=wrong");
                exit();
            } else {
                $vkey = password_hash(time() . $email, PASSWORD_DEFAULT);
                $status = 1;
                mysqli_stmt_bind_param($stmt, "sssssisis", $fname, $lname, $address, $nic, $email, $phone, $encPass, $status, $vkey);
                //status=0 - need email verify ,status=1 need password change, status=2 normal,
                if (mysqli_stmt_execute($stmt)) {

                    $to = $email;
                    $subject = "Email Verification";
                    $message = " Please verify your Email address to login <br>
                                <p>Password : $genPass </p>
                                <a href='http://localhost/HirukiAutoMart/admin/login.php'>Verify Account</a>";
                    $headers = "From: hirukicar@gmail.com \r\n";
                    $headers .= "MIME-Version: 1.0" . "\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\n";
                    @mail($to, $subject, $message, $headers);

                    header("Location:../webPages/addSalesman.php?alert=success");
                    exit();
                } else {
                    header("Location:../webPages/addSalesman.php?error=sql");
                    exit();
                }
            }
        } else {
            header("Location:../webPages/addSalesman.php?error=email");
            exit();
        }
    } else {
        header("Location:../webPages/addSalesman.php?error=fields");
        exit();
    }
}

function emailCheck($email, $conn)
{
    $query = "SELECT * FROM customer WHERE email = '" . $email . "'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        return false;
    } else {
        return true;
    }
}
function password_generate($chars) 
{
  $data = '@#$%^&*!()1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
  return substr(str_shuffle($data), 0, $chars);
}