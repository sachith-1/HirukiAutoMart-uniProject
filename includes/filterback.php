<?php

include_once("DbConn.php");

if (isset($_POST['action'])) {
    $sql = null;
    if ($_POST['action'] == "Vehicles") {
        $GLOBALS['sql'] = "SELECT name,price,img1,carID,MATCH (brand,name,colour,fuelType) AGAINST (?) as score FROM car WHERE carID!='' AND MATCH (brand,name,colour,fuelType) AGAINST (?)> 0 AND isAvailable!=0 ";
        //concat into sql query
        if (isset($_POST['condition'])) {
            $condition = implode("','", $_POST['condition']);
            $GLOBALS['sql'] .= "AND con IN('" . $condition . "')";
        }

        if (isset($_POST['transmition'])) {
            $transmition = implode("','", $_POST['transmition']);
            $GLOBALS['sql'] .= "AND transmition IN('" . $transmition . "')";
        }

        if (isset($_POST['fuel'])) {
            $fuel = implode("','", $_POST['fuel']);
            $GLOBALS['sql'] .= "AND fuelType IN('" . $fuel . "')";
        }
    } else if ($_POST['action'] == "Spare-Parts") {

        $GLOBALS['sql'] = "SELECT name,price,img1,partID,MATCH (brand,name,disc) AGAINST (?) as score FROM part WHERE partID!='' AND MATCH (brand,name,disc) AGAINST (?)> 0 ";
        //concat into sql query
        if (isset($_POST['condition'])) {
            $condition = implode("','", $_POST['condition']);
            $GLOBALS['sql'] .= "AND con IN('" . $condition . "')";
        }
    }
    $search = $_POST['search'];
    $sql .= " ORDER BY score DESC";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $search, $search);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    // $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_row($result)) {
            echo '<div class="product_item ">'; // for new use "is_new" ,for discount use "discount" 
            echo '<div class="product_border"></div>';
            echo '<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/vehicles/' . $row['2'] . '" alt=""></div>';
            echo '<div class="product_content">';
            echo '<div class="product_price">Rs.' . $row['1'] . '</div>';
            echo '<div class="product_name">';
            echo '<div><a href="product.php?type=' . $_POST['action'] . '&id=' . $row[3] . '" tabindex="0">' . $row['0'] . '</a></div>';
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
        echo "<h4>No Product Found</h4>";
    }
}
