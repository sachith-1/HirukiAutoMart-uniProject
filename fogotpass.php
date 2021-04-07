<?php
session_start();
if (isset($_SESSION['email']) || !empty($_SESSION['email'])) {
    header("Location:index.php?login=success");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Fogot Password</title>
    <!--Re captcha js-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles/reg.css">

</head>

<div class="register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
            <h3>Welcome</h3>
            <p>Hiruki Auto Mart</p>

        </div>
        <div class="col-md-9 register-right">
            <div class="col-md-4"></div>
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">

            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Fogget Password</h3>
                    <div class="row register-form">

                        <div class="col-md-3"></div>
                        <div class="col-md-6 text-center">

                            <form action="includes/fogotpassback.php" method="post">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email  *" required name="email" />
                                </div>

                                <div class="g-recaptcha" data-sitekey="6LfACMwUAAAAADenewTsX6She4-MsepWjJv5OLwA"></div>

                                <input style="margin-bottom: 10px;" type="submit" class="btnLogin" name="fgtpass" value="Login" />
                            </form>
                            <div class="row ">
                                <?php
                                if (isset($_GET['error'])) {
                                    echo " <div 
                                    style= 'color: #8d6c09;
                                    background-color: #fff3cd;
                                    border-color: #ffeeba;
                                    padding: 0.75rem 1.25rem;
                                    margin-top: 10px;
                                    border: 1px solid transparent;
                                    border-top-color: transparent;
                                    border-right-color: transparent;
                                    border-bottom-color: transparent;
                                    border-left-color: transparent;
                                    border-radius: 0.25rem;
                                    margin-left:auto;
                                    margin-right:auto;'>
                                    ";
                                    if ($_GET['error'] == "captcha") {
                                        echo "<center>Please use reCAPTCHA</center>
                                    </div>";
                                    } else if ($_GET['error'] == "cptIncrct") {
                                        echo "<center>Capture Incorrect</center>
                                    </div>";
                                    } else  if ($_GET['error'] == "sql") {
                                        echo "<center>Something went wrong</a></center>
                                    </div>";
                                    } else  if ($_GET['error'] == "email") {
                                        echo "<center>Incorrect username<br>New Customer? <a href='../userReg.php'>Register here.</a></center>
                                    </div>";
                                    }
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
</body>

</html>