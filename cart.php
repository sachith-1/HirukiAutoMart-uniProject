<?php
if (empty($_SESSION)) {
	session_start();
}
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
	header("Location:login.php");
	exit();
}

include_once("includes/DbConn.php");

$custID = $_SESSION['custID'];
$car = false;
$part = false;


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Cart</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="OneTech shop project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="styles/cart_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/header_style.css">
	<link rel="stylesheet" type="text/css" href="styles/footer_style.css">
	<link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">

</head>

<body>
	<?php
	include("header.php");
	?>
	<!-- Cart -->
	<?php
	if (isset($_GET['alert'])) {

		if ($_GET['alert'] == "error") {
			echo '<div id="alert" class="alert alert-warning alert-dismissible" role="alert">
							<center>Something went wrong while executing.<center>
				  		</div>';
		} else if ($_GET['alert'] == 'success') {
			echo '<div id="alert" class="alert alert-success alert-dismissible" role="alert">
							<center>Successfuly removed from cart<center>
				  		</div>';
		}
	}
	?>
	<div class="cart_section">
		<div class="container">
			<div class="row">

				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<div class="cart_title">Shopping Cart</div><br>
						<div class="card">
							<div class="card-body p-0">
								<div class="table-responsive">
									<table class="table m-0" id="cartTable">
										<thead>
											<tr>
												<th></th>
												<th>Name</th>
												<th>Quantity</th>
												<th>Price</th>
												<th>Total</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php
											$query = "select img1,name,qty,PreOderPrice,preoderID from car,preoder where car.carID=preoder.carID AND custID=" . $custID . " AND isPaid=0 ORDER BY preoderID DESC";
											$result = mysqli_query($conn, $query);
											$items = null;
											while ($row = mysqli_fetch_assoc($result)) {
												$car = true;
												$preoderID = $row['preoderID'];
												echo "<tr>";
												echo "<td><img src=images/vehicles/" . $row['img1'] .  " style='width: 60px;height:auto;'></td>";
												echo "<td>" . $row['name'] . "</td>";
												echo "<td>" . $row['qty'] . "</td>";
												echo "<td>" . $row['PreOderPrice'] . "</td>";
												echo "<td class=rowtotal>" . (float) $row['qty'] * (float) $row['PreOderPrice'] . "</td>";
												echo "<td style='margin:0px;'><a href='includes/removeFromCart.php?preoderID=$preoderID' type='button' style='cursor:pointer;' class='close' aria-label='Close'>";
												echo '<span aria-hidden="true">&times;</span>';
												echo '</a></td>';
												echo "</tr>";
												$items .= " + " .  $row['name'] . " ";
											}
											$query = "select img1,name,oder.qty,price,oderID from oder,part where part.partID=oder.partID AND custID=" . $custID . " AND isPaid=0 ORDER BY oderID DESC";
											$result = mysqli_query($conn, $query);

											while ($row = mysqli_fetch_assoc($result)) {
												$part = true;
												$oderID = $row['oderID'];
												echo "<tr>";
												echo "<td><img src=images/vehicles/" . $row['img1'] .  " style='width: 60px;height:auto;'></td>";
												echo "<td>" . $row['name'] . "</td>";
												echo "<td>" . $row['qty'] . "</td>";
												echo "<td>" . $row['price'] . "</td>";
												echo "<td class=rowtotal>" . (float) $row['qty'] * (float) $row['price'] . "</td>";
												echo "<td style='margin:0px;'><a href='includes/removeFromCart.php?oderID=$oderID' type='button' style='cursor:pointer;' class='close' aria-label='Close'>";
												echo '<span aria-hidden="true">&times;</span>';
												echo '</a></td>';
												echo "</tr>";
												$items .= " + " . $row['name'] . " ";
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<!-- Order Total -->
						<div class="order_total">
							<div class="order_total_content text-md-right">
								<div class="order_total_title">Order Total:</div>
								<div id="total" class="order_total_amount"></div>
							</div>
						</div>

						<div class="cart_buttons">
							<form action="https://sandbox.payhere.lk/pay/checkout" method="post">
								<input type="hidden" name="merchant_id" value="1213606"> <!-- Replace your Merchant ID -->
								<input type="hidden" name="return_url" value="http://http://hirukiautomart.eastus.cloudapp.azure.com/supPages/paymentSuccess.php">
								<input type="hidden" name="cancel_url" value="http://http://hirukiautomart.eastus.cloudapp.azure.com/supPages/paymentCancel.php">
								<input type="hidden" name="notify_url" value="http://http://hirukiautomart.eastus.cloudapp.azure.com/includes/payNotify.php">
								<?php
								$sql = "select fname,lname,phone,address from customer where custID=$custID";
								$result = mysqli_query($conn, $sql);
								while ($row = mysqli_fetch_assoc($result)) {

								?>
									<input type="hidden" name="order_id" value="<?php echo $custID; ?>">
									<input type="hidden" name="items" value="<?php echo $items; ?>"><br>
									<input type="hidden" name="currency" value="LKR">
									<input type="hidden" name="amount" id="amountTotal">

									<input type="hidden" name="first_name" value="<?php echo $row['fname']; ?>">
									<input type="hidden" name="last_name" value="<?php echo $row['lname']; ?>"><br>
									<input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
									<input type="hidden" name="phone" value="<?php echo $row['phone']; ?>"><br>
									<input type="hidden" name="address" value="<?php echo $row['address']; ?>">
									<input type="hidden" name="city" value="Sri Lanka">
									<input type="hidden" name="country" value="Sri Lanka"><br><br>
								<?php }
								if ($car == true) {
									echo "<input type='hidden' name='custom_1' value=car>";
								}
								if ($part == true) {
									echo "<input type='hidden' name='custom_2' value=part>";
								}

								?>

								<button type="submit" style="color: #3498db;" class="button cart_button_clear">Pay</button>
								<button type="button" class="button cart_button_clear"><a href="index.php">Cancel</a></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<?php
	include_once("footer.php");
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
	<!--calculate total from total column-->
	<script type="text/javascript">
		$(document).ready(function() {
			var cls = document.getElementById("cartTable").getElementsByTagName("td");
			var sum = 0;
			for (var i = 0; i < cls.length; i++) {
				if (cls[i].className == "rowtotal") {
					sum += isNaN(cls[i].innerHTML) ? 0 : parseInt(cls[i].innerHTML);
				}
			}
			document.getElementById('total').innerHTML = "Rs." + sum;
			document.getElementById('amountTotal').value = sum;
		});
	</script>
</body>

</html>