<!DOCTYPE html>
<html lang="en">

<head>
	<title>Shop</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="OneTech shop project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="styles/shop_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/shop_responsive.css">

</head>

<?php
include_once("header.php");
?>

<!-- Shop -->

<div class="shop">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">

				<!-- Shop Sidebar -->
				<form>
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Categories</div>
							<ul class="sidebar_categories">
								<li><a href="#">Vehicles</a></li>
								<li><a href="#">Spare Parts</a></li>

							</ul>
						</div>

						<div class="sidebar_section filter_by_section">
							<div class="sidebar_title">Filter By</div>
							<div class="sidebar_subtitle">Price</div>
							<div class="filter_price">
								<div id="slider-range" class="slider_range"></div>
								<p>Range: </p>
								<p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
							</div>
						</div>
						<div class="sidebar_section">
							<div class="sidebar_subtitle brands_subtitle">Condition</div>
							<br>
							<div class="form-check">
								<input class="form-check-input" style="margin-left:10px;" name="condition" type="radio" id="radioNew" value="New">
								<label class="form-check-label" style="margin-left:10px;" for="radioNew">
									New
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" style="margin-left:10px;" name="condition" type="radio" id="radioUsed" value="Used">
								<label class="form-check-label" style="margin-left:10px;" for="radioUsed">
									Used
								</label>
							</div>
						</div>
						<div class="sidebar_section">
							<div class="sidebar_subtitle brands_subtitle">Transmition</div>
							<br>
							<div class="form-check">
								<input class="form-check-input" style="margin-left:10px;" name="transmition" type="radio" id="radioAuto" value="Auto">
								<label class="form-check-label" style="margin-left:10px;" for="radioAuto">
									Auto
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" style="margin-left:10px;" name="transmition" type="radio" id="radioManual" value="Manual">
								<label class="form-check-label" style="margin-left:10px;" for="radioManual">
									Manual
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" style="margin-left:10px;" name="transmition" type="radio" id="radioBoth" value="Both">
								<label class="form-check-label" style="margin-left:10px;" for="radioBoth">
									Both
								</label>
							</div>
						</div>
						<div class="sidebar_section">
							<div class="sidebar_subtitle brands_subtitle">Model Year</div>
							<br>
							<div class="row" style="padding-right: 20px;">
								<div class="col">
									<input type="text" class="form-control" placeholder="Min">
								</div>
								<div class="col">
									<input type="text" class="form-control" placeholder="Max">
								</div>
							</div>

						</div>
						<div class="sidebar_section">
							<div class="sidebar_subtitle brands_subtitle">Mileage</div>
							<br>
							<div class="row" style="padding-right: 20px;">
								<div class="col">
									<input type="text" class="form-control" placeholder="Min">
								</div>
								<div class="col">
									<input type="text" class="form-control" placeholder="Max">
								</div>
							</div>

						</div>
						<div class="sidebar_section">
							<div class="sidebar_subtitle brands_subtitle">Brands</div>
							<ul class="brands_list">
								<li class="brand"><a href="#">Toyota</a></li>
								<li class="brand"><a href="#">Suzuki</a></li>
								<li class="brand"><a href="#">Honda</a></li>
								<li class="brand"><a href="#">MMW</a></li>
								<li class="brand"><a href="#">Audi</a></li>

							</ul>
						</div>
					</div>
				</form>
			</div>

			<div class="col-lg-9">

				<!-- Shop Content -->

				<div class="shop_content">
					<div class="shop_bar clearfix">
						<div class="shop_product_count"><span>186</span> products found</div>
						<div class="shop_sorting">
							<span>Sort by:</span>
							<ul>
								<li>
									<span class="sorting_text">highest rated<i class="fas fa-chevron-down"></span></i>
									<ul>
										<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
										<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
										<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "price" }'>price</li>
									</ul>
								</li>
							</ul>
						</div>
					</div>

					<div class="product_grid">
						<div class="product_grid_border"></div>

						<!-- Product Item -->
						<div class="product_item is_new">
							<div class="product_border"></div>
							<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_5.jpg" alt=""></div>
							<div class="product_content">
								<div class="product_price">$225</div>
								<div class="product_name">
									<div><a href="#" tabindex="0">Philips BT6900A</a></div>
								</div>
							</div>
							<div class="product_fav"><i class="fas fa-heart"></i></div>
							<ul class="product_marks">
								<li class="product_mark product_discount">-25%</li>
								<li class="product_mark product_new">new</li>
							</ul>
						</div>

						<!-- Product Item -->
						<div class="product_item discount">
							<div class="product_border"></div>
							<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/featured_1.png" alt=""></div>
							<div class="product_content">
								<div class="product_price">$225<span>$300</span></div>
								<div class="product_name">
									<div><a href="#" tabindex="0">Huawei MediaPad...</a></div>
								</div>
							</div>
							<div class="product_fav"><i class="fas fa-heart"></i></div>
							<ul class="product_marks">
								<li class="product_mark product_discount">-25%</li>
								<li class="product_mark product_new">new</li>
							</ul>
						</div>

						<!-- Product Item -->
						<div class="product_item">
							<div class="product_border"></div>
							<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/featured_2.png" alt=""></div>
							<div class="product_content">
								<div class="product_price">$379</div>
								<div class="product_name">
									<div><a href="#" tabindex="0">Apple iPod shuffle</a></div>
								</div>
							</div>
							<div class="product_fav"><i class="fas fa-heart"></i></div>
							<ul class="product_marks">
								<li class="product_mark product_discount">-25%</li>
								<li class="product_mark product_new">new</li>
							</ul>
						</div>

						<!-- Product Item -->
						<div class="product_item">
							<div class="product_border"></div>
							<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/featured_3.png" alt=""></div>
							<div class="product_content">
								<div class="product_price">$225</div>
								<div class="product_name">
									<div><a href="#" tabindex="0">Sony MDRZX310W</a></div>
								</div>
							</div>
							<div class="product_fav"><i class="fas fa-heart"></i></div>
							<ul class="product_marks">
								<li class="product_mark product_discount">-25%</li>
								<li class="product_mark product_new">new</li>
							</ul>
						</div>

						<!-- Product Item -->
						<div class="product_item is_new">
							<div class="product_border"></div>
							<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/featured_4.png" alt=""></div>
							<div class="product_content">
								<div class="product_price">$379</div>
								<div class="product_name">
									<div><a href="#" tabindex="0">LUNA Smartphone</a></div>
								</div>
							</div>
							<div class="product_fav"><i class="fas fa-heart"></i></div>
							<ul class="product_marks">
								<li class="product_mark product_discount">-25%</li>
								<li class="product_mark product_new">new</li>
							</ul>
						</div>

						<!-- Product Item -->
						<div class="product_item is_new">
							<div class="product_border"></div>
							<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/shop_1.jpg" alt=""></div>
							<div class="product_content">
								<div class="product_price">$379</div>
								<div class="product_name">
									<div><a href="#" tabindex="0">Canon IXUS 175...</a></div>
								</div>
							</div>
							<div class="product_fav"><i class="fas fa-heart"></i></div>
							<ul class="product_marks">
								<li class="product_mark product_discount">-25%</li>
								<li class="product_mark product_new">new</li>
							</ul>
						</div>

						<!-- Product Item -->
						<div class="product_item">
							<div class="product_border"></div>
							<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/featured_5.png" alt=""></div>
							<div class="product_content">
								<div class="product_price">$379<span>$300</span></div>
								<div class="product_name">
									<div><a href="#" tabindex="0">Canon STM Kit...</a></div>
								</div>
							</div>
							<div class="product_fav"><i class="fas fa-heart"></i></div>
							<ul class="product_marks">
								<li class="product_mark product_discount">-25%</li>
								<li class="product_mark product_new">new</li>
							</ul>
						</div>

						<!-- Product Item -->
						<div class="product_item">
							<div class="product_border"></div>
							<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/featured_6.png" alt=""></div>
							<div class="product_content">
								<div class="product_price">$225<span>$300</span></div>
								<div class="product_name">
									<div><a href="#" tabindex="0">Samsung J330F</a></div>
								</div>
							</div>
							<div class="product_fav"><i class="fas fa-heart"></i></div>
							<ul class="product_marks">
								<li class="product_mark product_discount">-25%</li>
								<li class="product_mark product_new">new</li>
							</ul>
						</div>

						<!-- Product Item -->
						<div class="product_item">
							<div class="product_border"></div>
							<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/featured_7.png" alt=""></div>
							<div class="product_content">
								<div class="product_price">$225</div>
								<div class="product_name">
									<div><a href="#" tabindex="0">Lenovo IdeaPad</a></div>
								</div>
							</div>
							<div class="product_fav"><i class="fas fa-heart"></i></div>
							<ul class="product_marks">
								<li class="product_mark product_discount">-25%</li>
								<li class="product_mark product_new">new</li>
							</ul>
						</div>

						<!-- Product Item -->
						<div class="product_item">
							<div class="product_border"></div>
							<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/featured_8.png" alt=""></div>
							<div class="product_content">
								<div class="product_price">$379</div>
								<div class="product_name">
									<div><a href="#" tabindex="0">Digitus EDNET...</a></div>
								</div>
							</div>
							<div class="product_fav"><i class="fas fa-heart"></i></div>
							<ul class="product_marks">
								<li class="product_mark product_discount">-25%</li>
								<li class="product_mark product_new">new</li>
							</ul>
						</div>

						<!-- Product Item -->
						<div class="product_item is_new">
							<div class="product_border"></div>
							<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_1.jpg" alt=""></div>
							<div class="product_content">
								<div class="product_price">$225</div>
								<div class="product_name">
									<div><a href="#" tabindex="0">Astro M2 Black</a></div>
								</div>
							</div>
							<div class="product_fav"><i class="fas fa-heart"></i></div>
							<ul class="product_marks">
								<li class="product_mark product_discount">-25%</li>
								<li class="product_mark product_new">new</li>
							</ul>
						</div>

						<!-- Product Item -->
						<div class="product_item is_new">
							<div class="product_border"></div>
							<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_2.jpg" alt=""></div>
							<div class="product_content">
								<div class="product_price">$225</div>
								<div class="product_name">
									<div><a href="#" tabindex="0">Transcend T.Sonic</a></div>
								</div>
							</div>
							<div class="product_fav"><i class="fas fa-heart"></i></div>
							<ul class="product_marks">
								<li class="product_mark product_discount">-25%</li>
								<li class="product_mark product_new">new</li>
							</ul>
						</div>

						<!-- Product Item -->
						<div class="product_item is_new">
							<div class="product_border"></div>
							<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_3.jpg" alt=""></div>
							<div class="product_content">
								<div class="product_price">$225</div>
								<div class="product_name">
									<div><a href="#" tabindex="0">Xiaomi Band 2...</a></div>
								</div>
							</div>
							<div class="product_fav"><i class="fas fa-heart"></i></div>
							<ul class="product_marks">
								<li class="product_mark product_discount">-25%</li>
								<li class="product_mark product_new">new</li>
							</ul>
						</div>

						<!-- Product Item -->
						<div class="product_item is_new">
							<div class="product_border"></div>
							<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_4.jpg" alt=""></div>
							<div class="product_content">
								<div class="product_price">$379</div>
								<div class="product_name">
									<div><a href="#" tabindex="0">Rapoo T8 White</a></div>
								</div>
							</div>
							<div class="product_fav"><i class="fas fa-heart"></i></div>
							<ul class="product_marks">
								<li class="product_mark product_discount">-25%</li>
								<li class="product_mark product_new">new</li>
							</ul>
						</div>

						<!-- Product Item -->
						<div class="product_item discount">
							<div class="product_border"></div>
							<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/featured_1.png" alt=""></div>
							<div class="product_content">
								<div class="product_price">$225<span>$300</span></div>
								<div class="product_name">
									<div><a href="#" tabindex="0">Huawei MediaPad...</a></div>
								</div>
							</div>
							<div class="product_fav"><i class="fas fa-heart"></i></div>
							<ul class="product_marks">
								<li class="product_mark product_discount">-25%</li>
								<li class="product_mark product_new">new</li>
							</ul>
						</div>

						<!-- Product Item -->
						<div class="product_item is_new">
							<div class="product_border"></div>
							<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_6.jpg" alt=""></div>
							<div class="product_content">
								<div class="product_price">$379</div>
								<div class="product_name">
									<div><a href="#" tabindex="0">Nokia 3310 (2017)</a></div>
								</div>
							</div>
							<div class="product_fav"><i class="fas fa-heart"></i></div>
							<ul class="product_marks">
								<li class="product_mark product_discount">-25%</li>
								<li class="product_mark product_new">new</li>
							</ul>
						</div>

						<!-- Product Item -->
						<div class="product_item is_new">
							<div class="product_border"></div>
							<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_7.jpg" alt=""></div>
							<div class="product_content">
								<div class="product_price">$225</div>
								<div class="product_name">
									<div><a href="#" tabindex="0">Rapoo 7100p Gray</a></div>
								</div>
							</div>
							<div class="product_fav"><i class="fas fa-heart"></i></div>
							<ul class="product_marks">
								<li class="product_mark product_discount">-25%</li>
								<li class="product_mark product_new">new</li>
							</ul>
						</div>

						<!-- Product Item -->
						<div class="product_item is_new">
							<div class="product_border"></div>
							<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_8.jpg" alt=""></div>
							<div class="product_content">
								<div class="product_price">$379</div>
								<div class="product_name">
									<div><a href="#" tabindex="0">Canon EF</a></div>
								</div>
							</div>
							<div class="product_fav"><i class="fas fa-heart"></i></div>
							<ul class="product_marks">
								<li class="product_mark product_discount">-25%</li>
								<li class="product_mark product_new">new</li>
							</ul>
						</div>

						<!-- Product Item -->
						<div class="product_item is_new">
							<div class="product_border"></div>
							<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/shop_2.jpg" alt=""></div>
							<div class="product_content">
								<div class="product_price">$225</div>
								<div class="product_name">
									<div><a href="#" tabindex="0">Gembird SPK-103</a></div>
								</div>
							</div>
							<div class="product_fav"><i class="fas fa-heart"></i></div>
							<ul class="product_marks">
								<li class="product_mark product_discount">-25%</li>
								<li class="product_mark product_new">new</li>
							</ul>
						</div>

						<!-- Product Item -->
						<div class="product_item is_new">
							<div class="product_border"></div>
							<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/featured_5.png" alt=""></div>
							<div class="product_content">
								<div class="product_price">$379</div>
								<div class="product_name">
									<div><a href="#" tabindex="0">Canon STM Kit...</a></div>
								</div>
							</div>
							<div class="product_fav"><i class="fas fa-heart"></i></div>
							<ul class="product_marks">
								<li class="product_mark product_discount">-25%</li>
								<li class="product_mark product_new">new</li>
							</ul>
						</div>

					</div>

					<!-- Shop Page Navigation -->

					<div class="shop_page_nav d-flex flex-row">
						<div class="page_prev d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-left"></i></div>
						<ul class="page_nav d-flex flex-row">
							<li><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">...</a></li>
							<li><a href="#">21</a></li>
						</ul>
						<div class="page_next d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-right"></i></div>
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
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/shop_custom.js"></script>
</body>

</html>