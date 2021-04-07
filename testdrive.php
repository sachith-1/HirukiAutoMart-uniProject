<!DOCTYPE html>
<html lang="en">
<?php
if (empty($_SESSION)) {
	session_start();
}
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
	header("Localtion:index.php");
}

if (!isset($_POST['carID'])) {
	header("Location:index.php");
}

include_once("includes/DbConn.php");
$email = $_SESSION['email'];
$sql = "select custID from customer where email='$email'";
$result = mysqli_query($conn, $sql);
$custID = '';

while ($row = mysqli_fetch_assoc($result)) {
	$custID = $row['custID'];
}
//if the loggedin person is admin redirect to index 
if (empty($custID)) {
	header("Location:index.php");
}
?>

<head>
	<title>Test Drive</title>
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

<div class="single_product">
	<div class="row" style="display: block;margin-left:auto;margin-right:auto;width:60%;">
		<div class="col-6" style="display: block;margin-left:auto;margin-right:auto;">
			<h2 style="color:#0e8ce4;">Test Drive Booking</h2>
		</div>
		<br>
		<form action="includes/testDriveback.php" method="POST">

			<div class="row register-form">
				<div class="col-md-12" style="padding-left: 10%;padding-right:10%;">
					<div class="form-group">
						<label for="nic">NIC :</label>
						<input type="text" id='nic' class="form-control" placeholder="901721476V *" name="nic" required>
					</div>
					<div class="form-group">
						<label for="licence">Driver's Licence Number :</label>
						<input type="text" id="licence" class="form-control" placeholder="Driver's Licence Number *" name="licence" required>
					</div>
					<input type="hidden" name="carID" value=<?php echo $_POST['carID'] ?>>
					<input type="hidden" name="custID" value=<?php echo $custID ?>>
					<div class="form-group">
						<label for="fordate"> Pick a Date :</label>
						<div class='input-group date' id='datetimepicker1'>
							<?php
							$date = date_create(date("Y-m-d"));

							date_add($date, date_interval_create_from_date_string('1 days'));

							?>
							<input type='date' onchange="availableTime()" id="fordate" name="date" class="form-control" min=<?php echo date_format($date, 'Y-m-d');  ?> required />
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<!--Get time slots from DB ajax-->
					<div class="form-group" id="timeSlots">

					</div>
					<br>
				</div>
			</div>

		</form>
		<div name="tac">
			<p style="font-weight:500;color:black;">Terms and Conditions :</p>
			<p>Before you make you'r booking place take note of following</p>

			<ul style="list-style:circle;margin-left:17px;">
				<li>
					<p>Valid Driver's licence to test specific vehicle type.</p>
				</li>
				<li>
					<p>You must be accompanied by an employee of the car sale.</p>
				</li>
				<li>
					<p>Test Drive experiecne may not exceed 30 minutes.</p>
				</li>
				<li>
					<p>If the vehicle you booked is sold to someone after the booking made by you.we are really sorry to inform you that
						booking will be cancel and email will send to inform you that.
					</p>
				</li>
			</ul>
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
	function availableTime() {
		var date = document.getElementById("fordate").value;

		$.ajax({
			url: 'includes/timeSlotcheck.php',
			method: "POST",
			data: {
				date: date
			},
			success: function(response) {
				$("#timeSlots").html(response);
			}
		});

	}

	function submitEnable() {
		document.getElementById("submit").disabled = false;
	}
</script>
</body>

</html>