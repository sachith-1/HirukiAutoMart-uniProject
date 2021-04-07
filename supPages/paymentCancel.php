<?php

if (!isset($_GET['order_id']) && empty($_GET['order_id'])) {
    header("Location:../index.php");
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Payment Unsuccess</title>
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
            <h2 style="font-family: 'Muli', sans-serif;color:#769ff8;">Payment Unsuccess</h2>
            <img src="../images/payUnsuccess.png" class="img-fluid" style="margin-top:12px;width:35%;" alt="">
            <h5 style="margin-top:10px;font-family: 'Muli', sans-serif;color:#2e4053;">Unfortunatly, Payment was Unsuccessfull. Please ensure that you provide the
                valid Debit/Credit card details.Alternatively,please try a different payment method.</h5>
            <br>


            <form action="regThanks.php" method="GET">


                <button type="submit" name="resendbtn" class="btn btn-primary">Go to Home</button>

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