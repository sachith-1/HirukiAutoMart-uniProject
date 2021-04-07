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
    <title>Registration</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!--Re captcha js-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles/reg.css">
    <!--link href="styles/reg.css" rel="stylesheet" media="all"-->
</head>

<div class=" register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
            <h3>Welcome</h3>
            <p>Hiruki Auto Mart</p>
            <p>Have an account ? <a href="login.php" style="color: white;">Sign-IN</a></p>
        </div>
        <div class="col-md-9 register-right">
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Registration Form</h3>
                    <form action="includes/userRegBack.php" method="post" name="regUser">
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="First Name *" name="first_name" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Address *" name="address" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email *" name="email" required>
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password *" id="pass" name="pass" required>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Last Name *" name="last_name">
                                </div>
                                <div class="form-group">
                                    <div class="maxl">
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="male" checked>
                                            <span> Male </span>
                                        </label>
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="female">
                                            <span>Female </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" minlength="10" maxlength="10" name="phone" class="form-control" placeholder="Your Phone *" required />
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="cpass" placeholder="Confirm Password *" required />
                                </div>
                                <div class="g-recaptcha" data-sitekey="6LfACMwUAAAAADenewTsX6She4-MsepWjJv5OLwA"></div>
                                <input type="submit" class="btnRegister" name="submit" value="Register" />
                            </div>
                        </div>
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
                                } else if ($_GET['error'] == "fields") {
                                    echo "<center>All the Fields are requred</center>
                                    </div>";
                                } else if ($_GET['error'] == "cptIncrct") {
                                    echo "<center>Capture Incorect</center>
                                    </div>";
                                } else if ($_GET['error'] == "email") {
                                    echo "<center>There is an existing account associated with given email <a href='login.php'>Login</a></center>
                                    </div>";
                                } else if ($_GET['error'] == "wrong") {
                                    echo "<center>Something went wrong</center>
                                    </div>";
                                } else if ($_GET['error'] = "sql") {
                                    echo "<center>Something went wrong while executing query</center>
                                    </div>";
                                }
                            }
                            ?>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</div>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="js/form-validation.js"></script>
</body>

</html>