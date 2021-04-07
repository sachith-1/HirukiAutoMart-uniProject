<?php
if (!isset($_GET['vkey'], $_GET['email'])) {
    header("Location:../index.php");
} else {
    $vkey = $_GET['vkey'];
    $email = $_GET['email'];

    if (isset($_GET['resendbtn'])) {

        $to = $_GET['email'];
        $subject = "Email Verification";
        $message = " Please verify your Email address to login <br>
                                <a href='http://localhost/HirukiAutoMart/includes/emailVerify.php?vkey=$vkey'>Verify Account</a>";
        $headers = "From: hirukicar@gmail.com \r\n";
        $headers .= "MIME-Version: 1.0" . "\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\n";
        @mail($to, $subject, $message, $headers);

        header("Location:../supPages/regThanks.php?vkey=$vkey&email=$to");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign up Complete</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap4/bootstrap.min.css">
    <link href="../plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../styles/header_style.css">
    <link rel="stylesheet" type="text/css" href="../styles/footer_style.css">
    <link rel="stylesheet" type="text/css" href="../styles/cart_styles.css">
    <link rel="stylesheet" type="text/css" href="../styles/cart_responsive.css">
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
</head>

<?php include_once("header.php"); ?>

<section class="container-fluid" style="margin:30px 5px 60px 5px;;">
    <div class="row">
        <div class="col-sm-3">

        </div>
        <div class="col-sm-6 text-center">
            <h2 style="font-family: 'Muli', sans-serif;color:#769ff8;">Thank you for signin up!</h2>
            <img src="../images/emailsend.png" class="img-fluid" style="margin-top:12px;width:35%;" alt="">
            <h5 style="margin-top:10px;font-family: 'Muli', sans-serif;color:#2e4053;">We have sent an email with an activation link to your email
                address(It may take up to 24 hours).In order to complete the sign-up process,please click the activation link.</h5>
            <br>
            <h5 style="margin:15px 0px;font-family: 'Muli', sans-serif;color:#2e4053;"> If you didn't recieve the activation email,click on the link below
                to resend. </h5>

            <form action="regThanks.php" method="GET">

                <input type="hidden" name="vkey" value=<?php echo $vkey; ?>>
                <input type="hidden" name="email" value=<?php echo $email; ?>>
                <button type="submit" name="resendbtn" class="btn btn-primary">Resend activation email</button>

            </form>

        </div>
        <div class="col-sm-3">

        </div>
    </div>
</section>
<?php
include_once("footer.php");
?>

<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../styles/bootstrap4/popper.js"></script>
<script src="../styles/bootstrap4/bootstrap.min.js"></script>
<script src="../plugins/greensock/TweenMax.min.js"></script>
<script src="../plugins/greensock/TimelineMax.min.js"></script>
<script src="../plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="../plugins/greensock/animation.gsap.min.js"></script>
<script src="../plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="../plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="../plugins/easing/easing.js"></script>
<script src="../plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="../plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="../plugins/parallax-js-master/parallax.min.js"></script>
<script src="../js/shop_custom.js"></script>
</body>

</html>