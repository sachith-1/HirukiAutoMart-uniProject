<?php
session_start();
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header("Location:../login.php");
}

if (isset($_POST['submit'])) {
    include_once("../../includes/DbConn.php");

    if (isset($_POST['productName'], $_POST['price'], $_POST['brand'], $_POST['year'], $_POST['qty'], $_FILES['img1'], $_FILES['img2'], $_FILES['img3'], $_FILES['img4'], $_POST['desc'], $_POST['con'])) {

        $query = "insert into part (name,year,brand,price,qty,disc,img1,img2,img3,img4,con) values
        (?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $query)) {
            header("Location:../webPages/addSparePart.php?error=sql");
        } else {
            $upOne = dirname(__DIR__, 2) . "\\images/vehicles/";
            $tmp_pathImg1 = $_FILES['img1']['tmp_name'];
            $dest_pathImg1 = $upOne  . basename($_FILES['img1']['name']);

            $tmp_pathImg2 = $_FILES['img2']['tmp_name'];
            $dest_pathImg2 = $upOne . basename($_FILES['img2']['name']);

            $tmp_pathImg3 = $_FILES['img3']['tmp_name'];
            $dest_pathImg3 = $upOne . basename($_FILES['img3']['name']);

            $tmp_pathImg4 = $_FILES['img4']['tmp_name'];
            $dest_pathImg4 = $upOne . basename($_FILES['img4']['name']);

            if (move_uploaded_file($tmp_pathImg1, $dest_pathImg1) && move_uploaded_file($tmp_pathImg2, $dest_pathImg2) && move_uploaded_file($tmp_pathImg3, $dest_pathImg3) && move_uploaded_file($tmp_pathImg4, $dest_pathImg4)) {
                mysqli_stmt_bind_param(
                    $stmt,
                    "sisiissssss",
                    $_POST['productName'],
                    $_POST['year'],
                    $_POST['brand'],
                    $_POST['price'],
                    $_POST['qty'],
                    $_POST['desc'],
                    basename($_FILES['img1']['name']),
                    basename($_FILES['img2']['name']),
                    basename($_FILES['img3']['name']),
                    basename($_FILES['img4']['name']),
                    $_POST['con']
                );
                if (mysqli_stmt_execute($stmt)) {
                    header("Location:../webPages/addSparePart.php?error=success");
                    echo "Success";
                } else {
                    header("Location:../webPages/addSparePart.php?error=sql");
                }
            } else {
                header("Location:../webPages/addSparePart.php?error=photo");
            }
        }
    } else {
        header("Location:../webPages/addSparePart.php?error=fields");
    }
}
