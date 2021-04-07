<?php

if (isset($_POST["email_val"])) {
    include("DbConn.php");
    $email = mysqli_real_escape_string($conn, $_POST["email_val"]);
    $query = "SELECT * FROM customer WHERE email = '" . $email . "'";
    $result = mysqli_query($conn, $query);
    echo mysqli_num_rows($result);
}
