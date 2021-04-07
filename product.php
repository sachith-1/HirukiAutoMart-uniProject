<?php
if (isset($_SESSION)) {
	session_start();
}

if (!isset($_GET['type'])) {
	header("Location:index.php");
} else {
	include_once("includes/DbConn.php");
	$query = null;

	$name = null;
	$colour = null;
	$brand = null;
	$price = null;
	$preprice = null;
	$year = null;
	$fuel = null;
	$milege = null;
	$disc = null;
	$con = null;
	$period = null;
	$qty = null;
	if ($_GET['type'] == "Spare-Parts") {
		$id = $_GET['id'];
		$query = "SELECT name,year,brand,price,disc,con,qty from part where partID=$id";
	} else if ($_GET['type'] == "Vehicles") {
		$id = $_GET['id'];
		$query = "SELECT name,carYear,brand,price,disc,con,colour,preOderPrice,fuelType,milege,period from car where carID=$id";
	}
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_array($result)) {
		$name = $row['0'];
		$year = $row['1'];
		$brand = $row['2'];
		$price = $row['3'];
		$disc = $row['4'];
		$con = $row['5'];
		if ($_GET['type'] == "Vehicles") {
			$colour = $row['6'];
			$preprice = $row['7'];
			$fuel = $row['8'];
			$milege = $row['9'];
			$period = $row['10'];
		} else if ($_GET['type'] = "Spare-Parts") {
			$qty = $row['6'];
		}
	}
}
$custID = '';
if (isset($_SESSION['email'])) {
	$email = $_SESSION['email'];
	$sql = "select custID from customer where email='$email'";
	$result = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_assoc($result)) {
		$custID = $row['custID'];
	}
}

?>


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
	<link rel="stylesheet" type="text/css" href="styles/header_style.css">
	<link rel="stylesheet" type="text/css" href="styles/footer_style.css">
	<link rel="stylesheet" type="text/css" href="styles/product_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/product_responsive.css">

</head>

<?php
include_once("header.php");
?>

<!-- Single Product -->
<?php
if (isset($_GET['alert'])) {
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
	margin-right:auto;'>";
	if ($_GET['alert'] == "error") {
		echo "<center>Something went wrong while executing.</center>
	</div>";
	}
}
?>
<div class="single_product">
	<div class="container">
		<div class="row">

			<!-- Images -->
			<div class="col-lg-2 order-lg-1 order-2">
				<ul class="image_list">
					<?php
					$sql = null;
					if ($_GET['type'] == "Vehicles") {
						$sql = "select img1,img2,img3,img4 from car where carID=" . $_GET['id'];
					} else if ($_GET['type'] == "Spare-Parts") {
						$sql = "select img1,img2,img3,img4 from part where partID=" . $_GET['id'];
					}
					$result = mysqli_query($conn, $sql);
					$img1 = null;
					while ($row = mysqli_fetch_assoc($result)) {
						$img1 = $row['img1'];
						echo '<li data-image="images/vehicles/' . $row['img2'] . '"><img src="images/vehicles/' . $row['img2'] . '" alt=""></li>';
						echo '<li data-image="images/vehicles/' . $row['img3'] . '"><img src="images/vehicles/' . $row['img3'] . '" alt=""></li>';
						echo '<li data-image="images/vehicles/' . $row['img4'] . '"><img src="images/vehicles/' . $row['img4'] . '" alt=""></li>';
					}
					?>


				</ul>
			</div>

			<!-- Selected Image -->
			<div class="col-lg-5 order-lg-2 order-1">
				<div class="image_selected"><img src="images/vehicles/<?php echo $img1; ?>" alt=""></div>
			</div>

			<!-- Description -->
			<div class="col-lg-5 order-3">
				<div class="product_description">
					<div class="product_category"><?php echo $_GET['type']; ?></div>
					<div class="product_name"><?php echo $name; ?></div>

					<div class="product_text">
						<p><?php echo $disc; ?></p>
					</div>
					<br>
					<div class="container">
						<div class="row">
							<div class="col">
								<h3 style="font-size: 15px;"><b>Brand:</b><span style="font-style: normal;"> <?php echo " " . $brand; ?></span></h3>
							</div>
							<div class="col">
								<h3 style="font-size: 15px;"><b>Year:</b><span style="font-style: normal;"><?php echo " " . $year; ?></span></h3>
							</div>
						</div>
						<div class="row">

							<div class="col">
								<h3 style="font-size: 15px;"><b>Condition:</b><span style="font-style: normal;"><?php echo $con; ?></span></h3>
							</div>
							<?php
							if ($_GET['type'] == "Spare-Parts") {
								echo '<div class="col">';
								echo '<h3 style="font-size: 15px;"><b>Quantity:</b><span style="font-style: normal;"> ' . $qty . '</span></h3>';
								echo '</div>';
							} else if ($_GET['type'] == "Vehicles") {
								echo '<div class="col">';
								echo '<h3 style="font-size: 15px;"><b>Colour:</b><span style="font-style: normal;"> ' . $colour . '</span></h3>';
								echo '</div>';
							}
							?>
						</div>

						<?php
						if ($_GET['type'] == "Vehicles") {
							echo '<div class="row">';
							echo '<div class="col">';
							echo '<h3 style="font-size: 15px;"><b>Fuel Type:</b><span style="font-style: normal;"> ' . $fuel . '</span></h3>';
							echo '</div>';
							echo '<div class="col">';
							echo '<h3 style="font-size: 15px;"><b>Mileage:</b><span style="font-style: normal;"> Km ' . $milege . '</span></h3>';
							echo '</div>';
							echo '</div>';
							echo '<div class="row">';
							echo '<div class="col">';
							echo '<h3 style="font-size: 15px;"><b>Full payment Duration:</b><span style="font-style: normal;"> ' . $period . '</span></h3>';
							echo '</div>';
							echo '</div>';
							echo '<div class="row">';
							echo '<div class="col">';
							echo '<h3 style="font-size: 15px;"><b>Full Price:</b><span style="font-style: normal;"> Rs.' . $price . '</span></h3>';
							echo '</div>';
							echo '</div>';
						}
						echo '<br>';
						if ($_GET['type'] == "Vehicles") {
							if ($loginbol == true) {
								$carID = $_GET["id"];
								$query = "select tdriveID,date,timeSlot from testdrive where custID=$custID and carID=$carID";
								$result = mysqli_query($conn, $query);
								if (mysqli_num_rows($result) <= 0) {
									echo '<form action="testDrive.php" method="POST">';
									echo '<input type="hidden" name="carID" value=' . $carID . '>';
									echo '<input type="submit" style="cursor:pointer;" value="Test Drive" class="btn btn-info">';
									echo '</form>';
								} else {
									while ($row = mysqli_fetch_assoc($result)) {
										echo '<h6 style="color:black;">You have already booked. </h6>';
										echo "<p style='margin:2px;'>Booked Details :</p>";
										echo '<p style="color:black;margin:2px;">Date : '  . $row["date"] . '</p>';
										echo '<p style="color:black;margin:2px;">Time Slot : ' . $row["timeSlot"] . '</p>';
									}
								}
							}
						}
						?>


					</div>
					<div class="order_info d-flex flex-row">
						<form action="includes/productToCart.php" method="POST">
							<?php
							if ($_GET['type'] == "Spare-Parts") {
								echo '<label style="font-size: 15px;" for="qtyselect" class="form-label">Select Quantity</label>';
								echo "<input class='form-control' name='qty' type='number' id='qtyselect' min='1' max=$qty required />";
							} else {
								echo "<input name='qty' type='hidden' id='qtyselect' value=1 />";
								echo "<input type='hidden' name='period' value=$period>";
							}
							?>
							<div class="product_price" style="margin-top: 10px;">Pre Order Price : Rs.<?php if ($_GET['type'] == "Vehicles") {
																											echo $preprice;
																										} else {
																											echo $price;
																										} ?></div>
							<div class="button_container" style="margin-top: 5px;">
								<input type="hidden" name="id" value=<?php echo $id; ?>>
								<input type="hidden" name="img" value=<?php echo $img1; ?>>
								<input type="hidden" name="name" value=<?php echo $name; ?>>

								<input type="hidden" name="preprice" value=<?php if ($_GET['type'] == "Vehicles") {
																				echo $preprice;
																			} else {
																				echo $price;
																			} ?>>
								<button type="submit" name=<?php if ($_GET['type'] == "Vehicles") {
																echo "vehi";
															} else {
																echo "part";
															} ?> class="button cart_button"><?php if ($_GET['type'] == "Vehicles") {
																								echo "Pre-Oder";
																							} else {
																								echo "Add to Cart";
																							} ?></button>

								<!-- for wish list - <div class="product_fav"><i class="fas fa-heart"></i></div> -->
						</form>

					</div>


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
</body>

</html>