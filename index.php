<?php
if (empty($_SESSION)) {
	session_start();
}
$loginbol = false;
if (isset($_SESSION['email']) || !empty($_SESSION['email'])) {
	$GLOBALS['loginbol'] = true;
}

if (isset($_GET['alert'])) {
	if ($_GET['alert'] == "success") {
		echo "<script> alert('Success')</script>";
	} else if ($_GET['alert'] == "unsuccess") {
		echo "<script> alert('Unsuccess')</script>";
	}
}
include("includes/DbConn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Hiruki AutoMart</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="OneTech shop project">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="styles/header_style.css">
	<link rel="stylesheet" type="text/css" href="styles/footer_style.css">
	<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/responsive.css">

</head>
<!--Start of Tawk.to Script (pop-up msg service) -->
<script type="text/javascript">
	var Tawk_API = Tawk_API || {},
		Tawk_LoadStart = new Date();
	(function() {
		var s1 = document.createElement("script"),
			s0 = document.getElementsByTagName("script")[0];
		s1.async = true;
		s1.src = 'https://embed.tawk.to/5df3624143be710e1d21eed7/default';
		s1.charset = 'UTF-8';
		s1.setAttribute('crossorigin', '*');
		s0.parentNode.insertBefore(s1, s0);
	})();
</script>
<!--End of Tawk.to Script-->

<body>

	<div class="super_container">
		<header class="header">
			<div class="header_main">
				<div class="container">
					<div class="row">
						<!-- Logo -->
						<div class="col-lg-8 col-sm-8 col-3">
							<div class="logo_container">
								<div class="logo"><a href="index.php">Hiruki AutoMart</a></div>
							</div>
						</div>
						<!-- Wishlist-->
						<div class="col-lg-4 col-9 text-lg-left text-right">
							<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
								<!--<div class="wishlist d-flex flex-row align-items-center justify-content-end">
									<div class="wishlist_icon" style="width:20%;margin:3px;padding: 0px;"><img src="images/heart.png" alt=""></div>
									<div class="wishlist_content">
										<div class="wishlist_text"><a href="#">Wishlist</a></div>
										<div class="wishlist_count">11</div>
									</div>
								</div>-->


								<!-- Cart -->
								<div class="cart">
									<div class="cart_container d-flex flex-row align-items-center justify-content-end">
										<div class="cart_icon" style="width:20%;margin:3px;padding: 0px;">
											<img src="images/cart.png" alt="">
										</div>
										<div class="cart_content">
											<div class="cart_text"><a href="cart.php">Cart</a></div>
											<div style="font-size: 14px;color: #a3a3a3;margin-top: 3px;"><span><?php
																												if (isset($_SESSION['custID'])) {
																													$custID = $_SESSION['custID'];
																													$query = "select PreOderPrice from car,preoder where car.carID=preoder.carID AND custID=" . $custID . " AND isPaid=0 ORDER BY preoderID DESC";
																													$result = mysqli_query($conn, $query);
																													$count = 0;
																													while ($row = mysqli_fetch_assoc($result)) {
																														$count++;
																													}
																													$query = "select price from oder,part where part.partID=oder.partID AND custID=" . $custID . " AND isPaid=0 ORDER BY oderID DESC";
																													$result = mysqli_query($conn, $query);
																													while ($row = mysqli_fetch_assoc($result)) {
																														$count++;
																													}
																													echo $count;
																												}

																												?></span></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Main Navigation -->

			<nav class="main_nav">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="main_nav_content d-flex flex-row">
								<!-- Main Nav Menu -->
								<div class="main_nav_menu ml-auto">
									<ul class="standard_dropdown main_nav_dropdown">
										<li>
											<a href="index.php">Home</a>
										</li>
										<li>
											<a href="#help">Get Help</a>
										</li>
										<?php
										if ($GLOBALS['loginbol'] == false) {
											echo '<div class="top_bar_user">';
											echo '<div class="user_icon"><i class="fas fa-user-plus fa-lg" style="color:#0d82d3;margin-top: 5px;margin-right: 4px;"></i></div>';
											echo '<div class="mainnav-account" style="font-family: rubik;"><a href="userReg.php">Register</a></div>';
											echo '<div class="user_icon"><i class="fas fa-sign-in-alt fa-lg" style="color:#0d82d3;margin-top: 5px;margin-right: 4px;"></i></div>';
											echo '<div class="mainnav-account"><a href="login.php">Sign in</a></div>';
											echo '</div>';
										} else {

											echo '<li class="nav-item dropdown">';
											echo '<a class="nav-link dropdown-toggle" style="color: #a19a9a;cursor:pointer;" id="navbarDropdownMenuLink-333" data-toggle="dropdown"';
											echo 'aria-haspopup="true" aria-expanded="false">';
											echo '<i class="fas fa-user" style="color:#0d82d3;"></i> Profile';
											echo '</a>';
											echo '<div class="dropdown-menu"';
											echo 'aria-labelledby="navbarDropdownMenuLink-333">';
											echo '<a class="dropdown-item" href="userprof.php" style="padding-top:2px;padding-bottom:2px;">Account</a>';
											echo '<a class="dropdown-item" href="supPages/passChange.php" style="padding-top:2px;padding-bottom:2px;">Passoword change</a>';
											echo '<a class="dropdown-item" href="includes/logout.php" style="padding-top:2px;padding-bottom:2px;">Sign Out</a>';
											echo '</div>';
											echo '</li>';
										}
										?>
									</ul>
								</div>

								<!-- Menu Trigger(desc or mobile) -->

								<div class="menu_trigger_container ml-auto">
									<div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
										<div class="menu_burger">
											<div class="menu_trigger_text">menu</div>
											<div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</nav>

			<!-- Mobile Menu -->

			<div class="page_menu">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="page_menu_content">
								<div class="page_menu_search">
									<form action="shop.php" method="GET" class="header_search_form clearfix">
										<div class="input-group">
											<input type="text" class="form-control" name="search" aria-label="Text input with dropdown button">
											<div class="input-group-append">
												<span class="custom_dropdown_placeholder clc" style="color:white;">Vehicles</span>
												<i class="fas fa-chevron-down" style="color:white;"></i>
												<ul class="custom_list clc" id="molist">
													<li class="clc">Vehicles</li>
													<li class="clc">Spare-Parts</li>
												</ul>
												<input type="hidden" name="catgo" value="Vehicles" id="sftxt">
											</div>
										</div>
									</form>
								</div>
								<ul class="page_menu_nav">
									<li class="page_menu_item">
										<a href="index.php">Home</a>
									</li>
									<li class="page_menu_item">
										<a href="faq.php">Get Help</a>
									</li>
									<?php
									if ($GLOBALS['loginbol'] == false) {
										echo '<li class="page_menu_item">';
										echo '<a href="userReg.php">Register</a>';
										echo '</li>';
										echo '<li class="page_menu_item">';
										echo '<a href="login.php">Login</a>';
										echo '</li>';
									} else {
										echo '<li class="page_menu_item">';
										echo '<a href="userReg.php">Profile</a>';
										echo '</li>';
										echo '<li class="page_menu_item">';
										echo '<a href="includes/logout.php">Log Out</a>';
										echo '</li>';
									}

									?>
								</ul>
								<div class="menu_contact">
									<div class="menu_contact_item">
										<div class="menu_contact_icon"><img src="images/phone_white.png" alt=""></div>011 0011001
									</div>
									<div class="menu_contact_item">
										<div class="menu_contact_icon"><img src="images/mail_white.png" alt=""></div><a href="mailto:hirukiAuto@gmail.com">hirukiAuto@gmail.com</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			if (isset($_GET['alert'])) {

				if ($_GET['alert'] == "error") {
					echo '<div id="alert" class="alert alert-warning alert-dismissible" role="alert">
							<center>Something went wrong while executing.<center>
				  		</div>';
				} else if ($_GET['alert'] == 'bksuccess') {
					echo '<div id="alert" class="alert alert-success alert-dismissible" role="alert">
							<center>Test Drive Booking Success!<center>
				  		</div>';
				}
			}
			?>
		</header>
		<!-- Banner -->

		<div class="banner">
			<div class="banner_background" style="background-image:url(images/banner_background.jpg)"></div>
			<div class="container fill_height">
				<div class="row fill_height">
					<div class="banner_product_image"><img src="images/header (3).png" alt=""></div>
					<div style="top: 25%;" class="col-lg-12 offset-lg-2 fill_height">
						<!-- Search -->
						<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
							<div class="header_search">
								<div class="header_search_content">
									<div class="header_search_form_container">
										<form action="shop.php" method="GET" class="header_search_form clearfix">
											<input type="search" name="search" required="required" class="header_search_input" placeholder="Search for products...">
											<div class="custom_dropdown">
												<div class="custom_dropdown_list">
													<span class="custom_dropdown_placeholder clc">Vehicles</span>
													<i class="fas fa-chevron-down"></i>
													<ul class="custom_list clc" id="list">
														<li class="clc">Vehicles</li>
														<li class="clc">Spare-Parts</li>
													</ul>
													<input type="hidden" name="catgo" value="Vehicles" id="txt">
												</div>
											</div>
											<button type="submit" class="header_search_button trans_300" value="Submit"><img src="images/search.png" alt=""></button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Categories (Vehicles/Spare-parts) -->

		<div class="adverts">
			<div class="container">
				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-4 advert_col">
						<!-- Cat Item -->
						<div class="advert d-flex flex-row align-items-center justify-content-start">
							<div class="advert_content">
								<div class="advert_title"><a href="#">Vehicles</a></div>
								<div class="advert_text">Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</div>
							</div>
							<div class="ml-auto">
								<div class="advert_image"><img src="images/car0.png" alt=""></div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 advert_col">
						<!-- Cat Item -->
						<div class="advert d-flex flex-row align-items-center justify-content-start">
							<div class="advert_content">
								<div class="advert_title"><a href="#">Car Parts</a></div>
								<div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
							</div>
							<div class="ml-auto">
								<div class="advert_image"><img src="images/spareParts.png" alt=""></div>
							</div>
						</div>
					</div>
					<div class="col-lg-2"></div>
				</div>
			</div>
		</div>
		<!-- In A Trubble -->
		<section id="help">
			<div class="inAtrubble" style="background-image:url(images/inAtrubble.png)">
				<div class="container h-100">
					<div class="row h-100 align-text-top">
						<div class="col-12 text-center">
							<h2 class="font-weight-light"><br>In A Trubble ?</h2><br>
							<a href="./faq.php" class="btn btn-primary" style="border-radius: 50px; width: 150px;height: 40px;">Get Help</a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Footer -->
		<?php
		include_once("footer.php")
		?>
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="styles/bootstrap4/popper.js"></script>
		<script src="styles/bootstrap4/bootstrap.min.js"></script>
		<script src="plugins/greensock/TweenMax.min.js"></script>
		<script src="js/custom.js"></script>
		<!--select catgo frm dropdown-->
		<script>
			$(document).ready(function() {
				setTimeout(function() {
					$("#alert").fadeOut();
				}, 4000)
			});

			var items = document.querySelectorAll("#list li");
			for (var i = 0; i < items.length; i++) {
				items[i].onclick = function() {
					document.getElementById("txt").value = this.innerHTML;
				};
			}
		</script>
		<script>
			var items = document.querySelectorAll("#molist li");
			for (var i = 0; i < items.length; i++) {
				items[i].onclick = function() {
					document.getElementById("sftxt").value = this.innerHTML;
				};
			}
		</script>
</body>

</html>