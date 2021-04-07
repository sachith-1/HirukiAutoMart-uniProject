<?php
if (empty($_SESSION)) {
    session_start();
}
$loginbol = false;
if (isset($_SESSION['email']) || !empty($_SESSION['email'])) {
    $GLOBALS['loginbol'] = true;
}
include_once("includes/DbConn.php");
?>

<body>

    <div class="super_container">

        <!-- Header -->

        <header class="header">
            <!-- Header Main -->

            <div class="header_main">
                <div class="container">
                    <div class="row">

                        <!-- Logo -->
                        <div class="col-lg-2 col-sm-3 col-3 order-1">
                            <div class="logo_container">
                                <div class="logo"><a href="index.php">Hiruki AutoMart</a></div>
                            </div>
                        </div>

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

                        <!-- Wishlist -->
                        <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                            <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                                <!--
                                <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                                    <div class="wishlist_icon" style="width:20%;margin:3px;padding: 0px;"><img src="images/heart.png" alt=""></div>
                                    <div class="wishlist_content">
                                        <div class="wishlist_text"><a href="#">Wishlist</a></div>
                                        <div class="wishlist_count">11</div>
                                    </div>
                                </div>
                                -->

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
                                            <a href="./faq.php">Get Help</a>
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
                                            echo '<a class="dropdown-item" href="includes/logout.php" style="padding-top:2px;padding-bottom:2px;">Sign Out</a>';
                                            echo '</div>';
                                            echo '</li>';
                                        }
                                        ?>
                                    </ul>
                                </div>

                                <!-- Menu Trigger -->

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
                                                <span class="custom_dropdown_placeholder clc" style="color:white	;">Vehicles</span>
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
                                        <a href="index.php">Home<i class="fa fa-angle-down"></i></a>
                                    </li>
                                    <li class="page_menu_item">
                                        <a href="faq.php">Get Help<i class="fa fa-angle-down"></i></a>
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
        </header>