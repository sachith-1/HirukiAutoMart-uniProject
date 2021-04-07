<?php

if (isset($_GET['vkey'])) {
    include_once("DbConn.php");

    $query = 'SELECT vkey,status from customer WHERE vkey=?'; //hash 1st letter is $.
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        echo "Verification faild";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $_GET['vkey']);
        if (!mysqli_stmt_execute($stmt)) {
            echo "Verification faild";
            exit();
        } else {
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $cvkey = $row['vkey'];
                    $status = $row['status'];
                }
                //status=0 - need email verify ,status=1 need password change, status=2 normal,
                if ($status == 0) {
                    $query = "UPDATE customer SET status=2 WHERE vkey='$cvkey'";
                    if (mysqli_query($conn, $query)) {
                        header("Location:../login.php?verify=yes");
                        exit();
                    } else {
                        header("Location:../login.php?verify=no");
                        exit();
                    }
                }elseif ($status == 1){
                    header("Location:../supPages/resetpass.php?vkey=".$cvkey);
                } else {
                    header("Location:../login.php?verify=old");
                }
            } else {
                echo "Verification faild";
                exit();
            }
        }
    }
}
