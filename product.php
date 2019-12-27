<!DOCTYPE html>
<html lang="en">

<head>
	<title>Single Product</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="OneTech shop project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="styles/product_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/product_responsive.css">

</head>

<?php
include_once("header.php");
?>

<!-- Single Product -->

<div class="single_product">
	<div class="container">
		<div class="row">

			<!-- Images -->
			<div class="col-lg-2 order-lg-1 order-2">
				<ul class="image_list">
					<li data-image="images/single_4.jpg"><img src="images/single_4.jpg" alt=""></li>
					<li data-image="images/single_2.jpg"><img src="images/single_2.jpg" alt=""></li>
					<li data-image="images/single_3.jpg"><img src="images/single_3.jpg" alt=""></li>
				</ul>
			</div>

			<!-- Selected Image -->
			<div class="col-lg-5 order-lg-2 order-1">
				<div class="image_selected"><img src="images/single_4.jpg" alt=""></div>
			</div>

			<!-- Description -->
			<div class="col-lg-5 order-3">
				<div class="product_description">
					<div class="product_category">Category vehicle or part</div>
					<div class="product_name">MacBook Air 13</div>
					<div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
					<div class="product_text">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum. laoreet turpis, nec sollicitudin dolor cursus at. Maecenas aliquet, dolor a faucibus efficitur, nisi tellus cursus urna, eget dictum lacus turpis.</p>
					</div>
					<br>
					<div class="container">
						<div class="row">
							<div class="col">
								<h3 style="font-size: 15px;"><b>Brand:</b><span style="font-style: normal;"> Brand</span></h3>
							</div>
							<div class="col">
								<h3 style="font-size: 15px;"><b>Modal:</b><span style="font-style: normal;"> Brand</span></h3>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<h3 style="font-size: 15px;"><b>Modal Year:</b><span style="font-style: normal;"> Brand</span></h3>
							</div>
							<div class="col">
								<h3 style="font-size: 15px;"><b>Condition:</b><span style="font-style: normal;"> Brand</span></h3>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<h3 style="font-size: 15px;"><b>Transmission:</b><span style="font-style: normal;"> Brand</span></h3>
							</div>
							<div class="col">
								<h3 style="font-size: 15px;"><b>Body Type:</b><span style="font-style: normal;"> Brand</span></h3>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<h3 style="font-size: 15px;"><b>Fuel Type:</b><span style="font-style: normal;"> Brand</span></h3>
							</div>
							<div class="col">
								<h3 style="font-size: 15px;"><b>Engine Capacity:</b><span style="font-style: normal;"> Brand</span></h3>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<h3 style="font-size: 15px;"><b>Mileage:</b><span style="font-style: normal;"> Brand</span></h3>
							</div>
						</div>
					</div>
					<div class="order_info d-flex flex-row">
						<form action="#">
							<div class="product_price">$2000</div>
							<div class="button_container">
								<button type="button" class="button cart_button">Add to Cart</button>
								<div class="product_fav"><i class="fas fa-heart"></i></div>
							</div>

						</form>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>



<!-- Footer -->

<?php
include_once("footer.php")
?>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/product_custom.js"></script>
</body>

</html>