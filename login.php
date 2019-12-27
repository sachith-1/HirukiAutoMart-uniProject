<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="styles/bootstrap4/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="styles/util.css" />
  <link rel="stylesheet" type="text/css" href="styles/login_user.css" />
</head>

<body>
  <div class="container-login100" style="background-image: url('images/loginBack.png');">
    <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
      <form class="login100-form validate-form">
        <span class="login100-form-title p-b-37">
          Sign In
        </span>

        <div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
          <input class="input100" type="email" name="email" placeholder="username or email" />
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input m-b-25" data-validate="Enter password">
          <input class="input100" type="password" name="pass" placeholder="password" />
          <span class="focus-input100"></span>
        </div>

        <div class="container-login100-form-btn">
          <button class="login100-form-btn">
            Sign In
          </button>
        </div>

        <div class="text-center" style="margin-top:30px">
          Dont have a Account
          <u><a href="userReg.php" class="txt2 hov1" style="font-weight: 500;margin-left: 4px;">
              Sign Up
            </a>
          </u>
        </div>
      </form>
    </div>
  </div>
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="styles/bootstrap4/js/popper.js"></script>
  <script src="styles/bootstrap4/js/bootstrap.min.js"></script>
  <script src="js/loginUser.js"></script>
</body>

</html>