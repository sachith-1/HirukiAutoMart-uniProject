<?php
session_start();
if(!isset($_SESSION['type']) || empty($_SESSION['type'])){
  header("Location:../login.php");
}
    include_once("../../includes/DbConn.php");
    $partID = $_GET['partID'];
     if(!isset($_GET['partID'])){
         header("Location:../Dashboard.php");
     } 
   


    $GLOBALS['query'] = "select name, year, brand, price, qty, disc from part where partID='".$partID."'";

    
    $result= mysqli_query($conn, $query);

  
    while ($row = mysqli_fetch_assoc($result)) {
      $GLOBALS['Name'] = $row['name'];
      $GLOBALS['Year'] = $row['year'];
      $GLOBALS['Brand'] = $row['brand'];
      $GLOBALS['Price'] = $row['price'];
      $GLOBALS['Qty'] = $row['qty'];
      $GLOBALS['Desc'] = $row['disc'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Hiruki AutoMart | Add Customer</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!--For Iframe resizing(for separate iframe)-->
    <script>
        function resizeIframe(obj) {
            obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
        }
    </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../dashboard.php" class="nav-link">Home</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../dashboard.php" class="brand-link">
                <span class="brand-text font-weight-light">DashBoard</span>
            </a>

            <!-- Sidebar -->
      <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
          <i class="fas fa-user" style="color:#ffffff;"></i>
          </div>
          <div class="info">
            <?php
                $email=$_SESSION['email'];
                $query=null;
                if($_SESSION['type']=="Salesman"){
                    $query = "select fname from salesman where email='$email'";
                }else if($_SESSION['type']=="Owner"){
                    $query = "select fname from owner where email='$email'";
                }
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                  $fname= $row['fname'];
                 
                echo "<a href='accountSettings.php' class='d-block'>$fname</a>";
                
                }
            
            ?>
          </div>
        </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class. Dont remove .nov-icon-->

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-car"></i>
                                <p>
                                    Cars
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item ">
                                    <a href="addCar.php" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add new Car</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="viewCars.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Cars</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tools"></i>
                                <p>
                                    Spare Parts
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="addSparePart.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Spare Part</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="viewSpareParts.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Spare Parts</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-shipping-fast"></i>
                                <p>
                                    Orders
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="sparePartsOders.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>SpareParts Oders</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="carPreOders.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Car PreOders</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header">Roles</li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Customers
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="addCustomer.php" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Customers</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="viewCustomer.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Customers</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="removeCustomer.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Remove Customer</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <?php
                                if($_SESSION['type']=='Owner'){
                                echo '<li class="nav-item has-treeview">';
                                echo '<a href="#" class="nav-link">';
                                echo '<i class="nav-icon fas fa-user-shield"></i>';
                                echo '<p>';
                                echo 'Salesmans';
                                echo '<i class="fas fa-angle-left right"></i>';
                                echo '</p>';
                                echo '</a>';
                                echo '<ul class="nav nav-treeview">';
                                echo '<li class="nav-item">';
                                echo '<a href="addSalesman.php" class="nav-link">';
                                echo '<i class="far fa-circle nav-icon"></i>';
                                echo '<p>Add Salesman</p>';
                                echo '</a>';
                                echo '</li>';
                                echo '<li class="nav-item">';
                                echo '<a href="viewSalesman.php" class="nav-link">';
                                echo '<i class="far fa-circle nav-icon"></i>';
                                echo '<p>View Salesman</p>';
                                echo '</a>';
                                echo '</li>';
                                echo '<li class="nav-item">';
                                echo '<a href="removeSalesman.php" class="nav-link">';
                                echo '<i class="far fa-circle nav-icon"></i>';
                                echo '<p>Remove Salesman</p>';
                                echo '</a>';
                                echo '</li>';
                                echo '</ul>';
                                echo '</li>';
                                }

                        ?>

                        <li class="nav-header">Account Settings</li>
                        <li class="nav-item">
                            <a href="accountSettings.php" target="blank" class="nav-link">
                                <i class="fas fa-sliders-h"></i>
                                <p>
                                    Account Settings
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="passwordChange.php" target="blank" class="nav-link">
                                <i class="fas fa-key"></i>
                                <p>
                                    Password Change
                                </p>
                            </a>
                        </li>

                        <li class="nav-header">Online Chat</li>
                        <li class="nav-item">
                            <a href="https://dashboard.tawk.to" target="blank" class="nav-link">
                                <i class="nav-icon fas fa-comments"></i>
                                <p>
                                    DashBoard
                                </p>
                            </a>
                        </li>

                        <li class="divider" style="height: 2px;
          margin: 9px 8px;
          overflow: hidden;
          background-color:
          #dbdada;
          border-bottom: 1px solid
          #ffffff;"></li>
                        <li class="nav-item">
                            <a href="../logout.php" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Sign Out
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!--Contains page content(right side) -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li>
                                <li class="breadcrumb-item active">Add Customer</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main content -->
            <section class="content" height="auto">
                <div class="container-fluid" height="auto">
                    <!-- Small boxes (Stat box) -->
                    <div class="row" height="auto">
                        <div class="col" height="auto">
                            <form style="margin:0 15%;" method="post" action="../includes/editPartBack.php" enctype="multipart/form-data">

                                <p class="h4 mb-4 text-center">Part Details</p>

                                
                                <input type="text" name="name" class="form-control mb-4" placeholder="Part Name" value=<?php echo $GLOBALS['Name']; ?>  required>
                                
                                <input type="text" name="year" class="form-control mb-4" placeholder="Year" value=<?php echo $GLOBALS['Year']; ?>  required>
                                
                                <input type="text" name="price" class="form-control mb-4" placeholder="Price" value=<?php echo $GLOBALS['Price']; ?>  required>                             
                                
                                <input type="text" name="qty" class="form-control mb-4" placeholder="Qty" value=<?php echo $GLOBALS['Qty']; ?>  required>

                                <input type="text" name="disc" class="form-control mb-4" placeholder="Desc" value=<?php echo $GLOBALS['Desc']; ?>  required>

                                <input type="text" name="brand" class="form-control mb-4" placeholder="Brand" value=<?php echo $GLOBALS['Brand']; ?>  required>

                                <input type="hidden" name="partID" value=<?php echo $partID; ?>>
                                <!--button -->
                                <button name="submit" class=" bg-info btn btn-info my-4 btn-block" type="submit">Change</button>
                            </form>

                        </div>
            </section>
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy;2019 <a href="http://hirukiAutoMart.com">hirukiAutoMart.com</a>.</strong>
            All rights reserved | Group-4 .

        </footer>
    </div>

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!--Push Menu for slideBar-->
    <script src="../dist/js/pushmenu.js"></script>
    <!--Tree View for sidebar dropdown-->
    <script src="../dist/js/treeview.js"></script>
    <!--Control SlideBar for header and footer width change with left slidebar-->
    <script src="../dist/js/controlslidebar.js"></script>

</body>

</html>