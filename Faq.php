<!DOCTYPE html>
<html lang="en">

<head>
  <title>FAQ</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="OneTech shop project">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
  <link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="styles/header_style.css">
  <link rel="stylesheet" type="text/css" href="styles/footer_style.css">
  <link rel="stylesheet" type="text/css" href="styles/faq_style.css">
  <link rel="stylesheet" type="text/css" href="styles/faq_style2.scss">
  <link rel="stylesheet" type="text/css" href="styles/shop_styles.css">
  <link rel="stylesheet" type="text/css" href="styles/shop_responsive.css">

</head>

<body>
  <?php
  include("header.php");
  ?>
  <div class="container">
    </br>
    <h1 class="text-center">Hiruki Auto Mart - FAQ</h1>
    </br>
    <div class="col-md-12">
      <div class="tab-content panels-faq">
        <div class="tab-pane active" id="tab1">
          <div class="panel-group" id="help-accordion-1">
            <div class="panel panel-default panel-help">
              <a href="#opret-produkt" data-toggle="collapse" data-parent="#help-accordion-1">
                <div class="panel-heading">
                  <h2>I cannot remember the password I used.</h2>
                </div>
              </a>
              <div id="opret-produkt" class="collapse in">
                <div class="panel-body">
                  <br>
                  <p>If your password is not working, request a new password by entering your email address in our forgot password page.Link is below the sign_in page.</p>
                  <br>
                </div>
              </div>
            </div>
            <div class="panel panel-default panel-help">
              <a href="#rediger-produkt" data-toggle="collapse" data-parent="#help-accordion-1">
                <div class="panel-heading">
                  <h2>I cannot remember the email address I used on my account.</h2>
                </div>
              </a>
              <div id="rediger-produkt" class="collapse">
                <div class="panel-body">
                  </br>
                  <p>Please contact us through the chat option.</p>
                  </br>
                </div>
              </div>
            </div>
            <div class="panel panel-default panel-help">
              <a href="#ret-pris" data-toggle="collapse" data-parent="#help-accordion-1">
                <div class="panel-heading">
                  <h2>How do I log in and log out of my account?</h2>
                </div>
              </a>
              <div id="ret-pris" class="collapse">
                <div class="panel-body">
                  </br>
                  <p>To log in to your account, simply go to the Sign in page and enter your email and password.
                    To log out of your account, go to profile and simply click the "Sign out" option.
                  </p>
                  </br>
                </div>
              </div>
            </div>
            <div class="panel panel-default panel-help">
              <a href="#slet-produkt" data-toggle="collapse" data-parent="#help-accordion-1">
                <div class="panel-heading">
                  <h2>How do I sign up?</h2>
                </div>
              </a>
              <div id="slet-produkt" class="collapse">
                <div class="panel-body">
                  </br>
                  <p>Signing up for an account is quick, and easy! To sign up, please go to the Sign up
                    page and follow the instructions or click the Register-Icon on Home Page.
                    You can sign up with the email address.Once you have signed up, a link will be sent to your email with instructions on how to verify your email address.
                  </p>
                  </br>
                </div>
              </div>
            </div>
            <div class="panel panel-default panel-help">
              <a href="#opret-kampagne" data-toggle="collapse" data-parent="#help-accordion-1">
                <div class="panel-heading">
                  <h2>How do I change my account details?</h2>
                </div>
              </a>
              <div id="opret-kampagne" class="collapse">
                <div class="panel-body">
                  <br>
                  <p>To change the details on your account, log in to your account and go to "Profile" and select "Account"</p>
                  <br>
                </div>
              </div>
            </div>

            <div class="panel panel-default panel-help">
              <a href="#rediger-produkt1" data-toggle="collapse" data-parent="#help-accordion-1">
                <div class="panel-heading">
                  <h2>How do I change my Passowrd?</h2>
                </div>
              </a>
              <div id="rediger-produkt1" class="collapse">
                <div class="panel-body">
                  </br>
                  <p>To change the Password, log in to your account and go to "Profile" and select "Password Change"</p>
                  </br>
                </div>
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
  <script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
  <script src="plugins/greensock/TweenMax.min.js"></script>
  <script src="js/faq.js"></script>
</body>

</html>