<!DOCTYPE html>

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
	<link rel="stylesheet" type="text/css" href="styles/header_style.css">
	<link rel="stylesheet" type="text/css" href="styles/footer_style.css">
	<link rel="stylesheet" type="text/css" href="styles/shop_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/shop_responsive.css">
</head>
<?php
include_once("includes/DbConn.php");
include_once("header.php");
?>

<!-- Shop -->
<div class="shop">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<form>
					<div class="shop_sidebar">
						<div class="sidebar_section filter_by_section">

						</div>
						<div class="sidebar_section">
							<div class="sidebar_title">Filter By</div>
							<div class="sidebar_subtitle">Condition</div>
							<br>
							<div class="form-check">
								<label class="form-check-label" style="margin-left: 10px;">
									<input class="form-check-input pro_check" name="condition" type="checkbox" id="condition" value="new">
									New
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label" style="margin-left: 10px;">
									<input class="form-check-input pro_check" name="condition" type="checkbox" id="condition" value="used">
									Used
								</label>
							</div>
						</div>
						<?php
						if ($_GET['catgo'] == "Vehicles") {
							echo '<div class="sidebar_section">';
							echo '<div class="sidebar_subtitle brands_subtitle">Transmition</div>';
							echo '<br>';
							echo '<div class="form-check">';
							echo '<label class="form-check-label" style="margin-left: 10px;">';
							echo '<input class="form-check-input pro_check" name="transmition" type="checkbox" id="transmition" value="auto">';
							echo 'Auto';
							echo '</label>';
							echo '</div>';
							echo '<div class="form-check">';
							echo '<label class="form-check-label" style="margin-left: 10px;">';
							echo '<input class="form-check-input pro_check" name="transmition" type="checkbox" id="transmition" value="manual">';
							echo 'Manual';
							echo '</label>';
							echo '</div>';
							echo '</div>';
							echo '<div class="sidebar_section">';
							echo '<div class="sidebar_subtitle brands_subtitle">Fuel Type</div>';
							echo '<br>';
							echo '<div class="form-check">';
							echo '<label class="form-check-label" style="margin-left: 10px;">';
							echo '<input class="form-check-input pro_check" name="fuel" type="checkbox" id="fuel" value="petrol">';
							echo 'Petrol';
							echo '</label>';
							echo '</div>';
							echo '<div class="form-check">';
							echo '<label class="form-check-label" style="margin-left: 10px;">';
							echo '<input class="form-check-input pro_check" name="fuel" type="checkbox" id="fuel" value="deisel">';
							echo 'Deisel';
							echo '</label>';
							echo '</div>';
							echo '<div class="form-check">';
							echo '<label class="form-check-label" style="margin-left: 10px;">';
							echo '<input class="form-check-input pro_check" name="fuel" type="checkbox" id="fuel" value="hybrid">';
							echo 'Hybrid';
							echo '</label>';
							echo '</div>';
							echo '<div class="form-check">';
							echo '<label class="form-check-label" style="margin-left: 10px;">';
							echo '<input class="form-check-input pro_check" name="fuel" type="checkbox" id="fuel" value="electric">';
							echo 'Electric';
							echo '</label>';
							echo '</div>';
							echo '</div>';
						}
						?>
						<br>
						<div class="sidebar_section">
							<div class="sidebar_title">Categories</div>
							<ul class="sidebar_categories">
								<li><a href="shop.php?catgo=Vehicles">Vehicles</a></li>
								<li><a href="shop.php?catgo=Spare-Parts">Spare Parts</a></li>
							</ul>
						</div>
					</div>
				</form>
			</div>
			<div class="col-lg-9">
				<!-- Shop Content -->
				<div class="shop_content">
					<div class="product_grid">
						<div class="product_grid_border"></div>
						<?php
						if (isset($_GET['catgo'], $_GET['search'])) {
							$catgo = $_GET['catgo'];
							$search = $_GET['search'];
							$query = null;
							if ($catgo == "Vehicles") {
								$GLOBALS['query'] = "SELECT name,price,img1,carID,MATCH (brand,name,colour,fuelType) AGAINST (?)as score FROM car WHERE MATCH (brand,name,colour,fuelType) AGAINST (?)> 0 AND isAvailable!=0 ORDER BY score DESC;";
							} else if ($catgo == "Spare-Parts") {
								$GLOBALS['query'] = "SELECT name,price,img1,partID,MATCH (brand,name,disc) AGAINST (?)as score FROM part WHERE MATCH (brand,name,disc) AGAINST (?)> 0  ORDER BY score DESC ";
							}
							$stmt = mysqli_stmt_init($conn);
							if (!mysqli_stmt_prepare($stmt, $query)) {
								echo "<script>window.location.href='index.php?error=wrong'</script>";
								exit();
							} else {

								mysqli_stmt_bind_param($stmt, "ss", $search, $search,);
								if (mysqli_stmt_execute($stmt)) {
									$result = mysqli_stmt_get_result($stmt);
						?>

									<div class="row" id="productGrid">
							<?php
									while ($row = mysqli_fetch_row($result)) {
										echo '<div class="product_item ">'; // for new use "is_new" ,for discount use "discount" 
										echo '<div class="product_border"></div>';
										echo '<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/vehicles/' . $row['2'] . '" alt=""></div>';
										echo '<div class="product_content">';
										echo '<div class="product_price">Rs.' . $row['1'] . '</div>';
										echo '<div class="product_name">';
										echo '<div><a href="product.php?type=' . $catgo . '&id=' . $row[3] . '" tabindex="0">' . $row['0'] . '</a></div>';
										echo '</div>';
										echo '</div>';
										echo '<div class="product_fav"><i class="fas fa-heart"></i></div>';
										echo '<ul class="product_marks">';
										echo '<li class="product_mark product_discount">-25%</li>';
										echo '<li class="product_mark product_new">new</li>';
										echo '</ul>';
										echo '</div>';
									}
								} else {
									echo "<script>window.location.href='index.php?error=wrong'</script>";
									exit();
								}
							}
						} else if (isset($_GET['catgo']) == "Vehicles") {
							$catgo = $_GET['catgo'];
							$query = "select  name,price,img1,carID from car where isAvailable!=0";
							$result = mysqli_query($conn, $query);
							while ($row = mysqli_fetch_row($result)) {
								echo '<div class="product_item ">'; // for new use "is_new" ,for discount use "discount" 
								echo '<div class="product_border"></div>';
								echo '<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/vehicles/' . $row['2'] . '" alt=""></div>';
								echo '<div class="product_content">';
								echo '<div class="product_price">Rs.' . $row['1'] . '</div>';
								echo '<div class="product_name">';
								echo '<div><a href="product.php?type=' . $catgo . '&id=' . $row[3] . '" tabindex="0">' . $row['0'] . '</a></div>';
								echo '</div>';
								echo '</div>';
								echo '<div class="product_fav"><i class="fas fa-heart"></i></div>';
								echo '<ul class="product_marks">';
								echo '<li class="product_mark product_discount">-25%</li>';
								echo '<li class="product_mark product_new">new</li>';
								echo '</ul>';
								echo '</div>';
							}
						} else if (isset($_GET['catgo']) == "Spare-Parts") {
							$catgo = $_GET['catgo'];
							$query = "select name,price,img1,partID from part where isAvailable!=0";
							$result = mysqli_query($conn, $query);
							while ($row = mysqli_fetch_row($result)) {
								echo '<div class="product_item ">'; // for new use "is_new" ,for discount use "discount" 
								echo '<div class="product_border"></div>';
								echo '<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/vehicles/' . $row['2'] . '" alt=""></div>';
								echo '<div class="product_content">';
								echo '<div class="product_price">Rs.' . $row['1'] . '</div>';
								echo '<div class="product_name">';
								echo '<div><a href="product.php?type=' . $catgo . '&id=' . $row[3] . '" tabindex="0">' . $row['0'] . '</a></div>';
								echo '</div>';
								echo '</div>';
								echo '<div class="product_fav"><i class="fas fa-heart"></i></div>';
								echo '<ul class="product_marks">';
								echo '<li class="product_mark product_discount">-25%</li>';
								echo '<li class="product_mark product_new">new</li>';
								echo '</ul>';
								echo '</div>';
							}
						} else {
							echo "<script>window.location.href='index.php'</script>";
							exit();
						}

							?>
									</div>

					</div>
					<div class="text-center">
						<img src="images/loading-2.gif" id="loading" style="display: none;" alt="" srcset="">
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
<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="js/custom.js"></script>
<!--select catgo frm dropdown-->
<script>
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
<script type="text/javascript">
	$(document).ready(function() {

		$(".pro_check").click(function() {
			$("#loading").show();

			var action = "<?php echo $catgo; ?>";
			var search = "<?php echo $search ?>"
			var condition = get_filter_data('condition');
			var transmition = get_filter_data('transmition');
			var fuel = get_filter_data('fuel');

			$.ajax({
				url: 'includes/filterback.php',
				method: "POST",
				data: {
					action: action,
					search: search,
					condition: condition,
					transmition: transmition,
					fuel: fuel
				},
				success: function(response) {
					$("#productGrid").html(response);
					$("#loading").hide();
				}
			});

		});

		function get_filter_data(id) {
			var filterData = [];
			$('#' + id + ':checked').each(function() {
				filterData.push($(this).val());
			});
			return filterData;
		}
	});
</script>
</body>

</html>