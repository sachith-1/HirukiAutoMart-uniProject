<?php
if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
    $secret = '6LfACMwUAAAAAPVJcYy9sNTcvGP1eMeYbqsrpWdP';
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);
    if ($responseData->success) {
        if (isset($_POST['fgtpass']) && isset($_POST['email'])) {
            include_once("Dbconn.php");
            $email = $_POST['email'];
            if (emailCheck($email, $conn)) {
                $query = "select vkey from customer where email=?";
                $stmt = mysqli_stmt_init($conn);
                if (mysqli_stmt_prepare($stmt, $query)) {
                    mysqli_stmt_bind_param($stmt, "s", $email);
                    if (mysqli_stmt_execute($stmt)) {
                        $result = mysqli_stmt_get_result($stmt);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $vkey = $row['vkey'];
                            $to = $email;
                            $subject = "Reset Password";
                            $message = " To Chanage password click the click below <br>
                                <a href='http://localhost/HirukiAutoMart/supPages/resetpass.php?vkey=$vkey'>Change Password</a>";
                            $headers = "From: hirukicar@gmail.com \r\n";
                            $headers .= "MIME-Version: 1.0" . "\n";
                            $headers .= "Content-type:text/html;charset=UTF-8" . "\n";
                            @mail($to, $subject, $message, $headers);
                            header("Location:../supPages/fogetpassmail.php?email=$to");
                            exit();
                        }
                    } else {
                        header("Location:../fogotpass.php?error=sql");
                        exit();
                    }
                } else {
                    header("Location:../fogotpass.php?error=sql");
                    exit();
                }
            } else {
                header("Location:../fogotpass.php?error=email");
                exit();
            }
        }
    } else {
        header("Location:../fogotpass.php?error=cptIncrct");
        exit();
    }
} else {
    header("Location:../fogotpass.php?error=captcha");
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
        return true;
    } else {
        return false;
    }
}
