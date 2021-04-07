<?php

if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
    $secret = '6LfACMwUAAAAAPVJcYy9sNTcvGP1eMeYbqsrpWdP';
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);
    if ($responseData->success) {
        if (isset($_POST['submit'])) {
            if (isset($_POST['first_name'], $_POST['last_name'], $_POST['address'], $_POST['gender'], $_POST['email'], $_POST['phone'], $_POST['pass'])) {

                $fname = $_POST['first_name'];
                $lname = $_POST['last_name'];
                $address = $_POST['address'];
                $gender = $_POST['gender'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $pass = $_POST['pass'];
                include_once("DbConn.php");
                if (emailCheck($email, $conn)) {
                    $query = "insert into customer(fname,lname,address,gender,email,phone,pass,status,vkey)
                    values(?,?,?,?,?,?,?,?,?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $query)) {
                        header("Location:../userReg.php?error=wrong");
                        exit();
                    } else {
                        $encPass = password_hash($pass, PASSWORD_ARGON2ID);
                        $vkey = password_hash(time() . $email, PASSWORD_DEFAULT);
                        $status = 0;
                        mysqli_stmt_bind_param($stmt, "sssssisis", $fname, $lname, $address, $gender, $email, $phone, $encPass, $status, $vkey);
                        //status=0 - need email verify ,status=1 need password change, status=2 normal,
                        if (mysqli_stmt_execute($stmt)) {
                            //send email
                            $to = $email;
                            $subject = "Email Verification";
                            $message = " Please verify your Email address to login <br>
                                <a href='http://localhost/HirukiAutoMart/includes/emailVerify.php?vkey=$vkey'>Verify Account</a>";
                            $headers = "From: hirukicar@gmail.com \r\n";
                            $headers .= "MIME-Version: 1.0" . "\n";
                            $headers .= "Content-type:text/html;charset=UTF-8" . "\n";
                            @mail($to, $subject, $message, $headers);

                            header("Location:../supPages/regThanks.php?vkey=$vkey&email=$to");
                            exit();
                        } else {
                            header("Location:../userReg.php?error=sql");
                            exit();
                        }
                    }
                } else {
                    header("Location:../userReg.php?error=email");
                    exit();
                }
            } else {
                header("Location:../userReg.php?error=fields");
                exit();
            }
        }
    } else {
        header("Location:../userReg.php?error=cptIncrct");
        exit();
    }
} else {
    header("Location:../userReg.php?error=captcha");
    exit();
}

function emailCheck($email, $conn)
{
    $query = "SELECT * FROM customer WHERE email = '" . $email . "'";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        return false;
    } else {
        return true;
    }
}
