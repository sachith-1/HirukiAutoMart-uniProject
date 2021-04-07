<?php
if (empty($_SESSION)) {
  session_start();
}
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
  header("Location:login.php");
} else {
  include_once("includes/DbConn.php");
  $email = $_SESSION['email'];
  $query = "select fname,lname,address,gender,phone from customer where email='" . $email . "'";
  $result = mysqli_query($conn, $query);

  $fname = null;
  $lname = null;
  $address = null;
  $gender = null;
  $phone = null;

  while ($row = mysqli_fetch_assoc($result)) {
    $GLOBALS['fname'] = $row['fname'];
    $GLOBALS['lname'] = $row['lname'];
    $GLOBALS['address'] = $row['address'];
    $GLOBALS['gender'] = $row['gender'];
    $GLOBALS['phone'] = $row['phone'];
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Change User Profile</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="OneTech shop project">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
  <link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="styles/header_style.css">
  <link rel="stylesheet" type="text/css" href="styles/footer_style.css">
  <link rel="stylesheet" type="text/css" href="styles/user_profile_style.css">
  <link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">

</head>

<body>
  <?php
  include_once("header.php");
  ?>

  <!--userprofile-->
  </br>
  <h2 class="text-center">User Profile Change</h2>
  </br>
  <div class="container">
    <div class="row flex-lg-nowrap">
      <div class="col-12 col-lg-auto mb-3" style="width: 200px;">
      </div>
      <div class="col">
        <div class="row">
          <div class="col mb-3">
            <div class="card">
              <div class="card-body">
                <div class="e-profile">
                  <div class="row">
                    <div class="col-12 col-sm-auto mb-3">
                    </div>
                  </div>
                  <ul class="nav nav-tabs">
                    <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
                  </ul>
                  <div class="tab-content pt-3">
                    <div class="tab-pane active">
                      <form class="form" action="includes/editAccountback.php" method="post">
                        <div class="row">
                          <div class="col">
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label>First Name</label>
                                  <input class="form-control" type="text" name="fname" value=<?php echo $GLOBALS['fname']; ?> required>
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label>Last Name</label>
                                  <input class="form-control" type="text" name="lname" value=<?php echo $GLOBALS['lname']; ?> required>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="input-group">
                                  <div class="row">

                                    <div class="col-md-3"><label class="label">Gender</label></div>
                                    <div class="col-md-4">
                                      <label class="radio-container m-r-45">Male
                                        <input type="radio" checked="checked" name="gender">
                                        <span class="checkmark"></span>
                                      </label>
                                    </div>
                                    <div class="col-md-5">
                                      <label class="radio-container">Female
                                        <input type="radio" name="gender">
                                        <span class="checkmark"></span>
                                      </label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label>Address</label>
                                  <input class="form-control" type="text" value=<?php echo $GLOBALS['address']; ?> required name="address">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label>Phone Number</label>
                                  <input class="form-control" type="text" value=<?php echo $GLOBALS['phone']; ?> required name="phone">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col mb-3">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col d-flex justify-content-end">
                            <button class="btn btn-primary" name="edit" type="submit">Save Changes</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-3 mb-3">


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
  <script src="plugins/greensock/TimelineMax.min.js"></script>
  <script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
  <script src="plugins/greensock/animation.gsap.min.js"></script>
  <script src="plugins/greensock/ScrollToPlugin.min.js"></script>
  <script src="plugins/easing/easing.js"></script>
  <script src="js/cart_custom.js"></script>
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