<?php
session_start();
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header("Location:../login.php");
}
if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
    $secret = '6LfACMwUAAAAAPVJcYy9sNTcvGP1eMeYbqsrpWdP';
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);
    if ($responseData->success) {
        if (isset($_POST['login_btn'])) {
            include_once("../../includes/DbConn.php");
            if (isset($_POST['email'], $_POST['password'], $_POST['admin'])) {

                $username = $_POST['email'];
                $password = $_POST['password'];
                $type     = $_POST['admin'];
                $query = null;

                if ($type == "Owner") {
                    $GLOBALS['query'] = "select pass,email from owner where email=?";
                } else if ($type == "Salesman") {
                    $GLOBALS['query'] = "select pass,status,vkey,email from salesman where email=?";
                }

                $stmnt = mysqli_stmt_init($conn);
                if (mysqli_stmt_prepare($stmnt, $query)) {
                    mysqli_stmt_bind_param($stmnt, "s", $username);
                    if (mysqli_stmt_execute($stmnt)) {
                        $result = mysqli_stmt_get_result($stmnt);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {

                                if (password_verify($password, $row['pass'])) {
                                    if ($type == "Owner") {
                                        session_start();
                                        $_SESSION['type'] = "Owner";
                                        $_SESSION['email'] = $row['email'];
                                        header("Location:../Dashboard.php?login=success");
                                    } else if ($type == "Salesman") {
                                        if ($row['status'] == 2) {
                                            session_start();
                                            $_SESSION['type'] = "Salesman";
                                            $_SESSION['email'] = $row['email'];
                                            header("Location:../Dashboard.php?login=success");
                                        } else if ($row['status'] == 1) {
                                            $_SESSION['type'] = "Salesman";
                                            $_SESSION['email'] = $row['email'];
                                            header("Location:../webpages/passwordChange.php?vkey=" . $row['vkey']);
                                        }
                                    }
                                } else {
                                    header("Location:../login.php?login=unsuccess");
                                }
                            }
                        } else {
                            header("Location:../login.php?login=Invalidusername");
                        }
                    } else {
                        header("Location:../login.php?login=mysql");
                    }
                } else {
                    header("Location:../login.php?login=mysql");
                }
            } else {
                echo "error";
            }
        } else {
            header("Location:../login.php?login=failed");
        }
    } else {
        header("Location:../login.php?error=cptIncrct");
        exit();
    }
} else {
    header("Location:../login.php?error=captcha");
    exit();
}
