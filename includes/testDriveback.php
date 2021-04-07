<?php

include_once("DbConn.php");

if (isset($_POST['timeSlot'])) {

    $nic = $_POST['nic'];
    $licence = $_POST['licence'];
    $date = $_POST['date'];
    $timeSlot = $_POST['timeSlot'];
    $carID = $_POST['carID'];
    $custID = $_POST['custID'];
    $time = '';
    if ($timeSlot == "sl1") {
        $time = "9.00am - 9.30am";
    } elseif ($timeSlot == "sl2") {
        $time = "9.40am - 10.10am";
    } elseif ($timeSlot == "sl3") {
        $time = "10.20am - 10.50am";
    } elseif ($timeSlot == "sl4") {
        $time = "1.00pm - 1.30pm";
    } elseif ($timeSlot == "sl5") {
        $time = "1.40pm - 2.10pm";
    } elseif ($timeSlot == "sl6") {
        $time = "2.20pm - 2.50pm";
    } elseif ($timeSlot == "sl7") {
        $time = "3.00pm - 3.30pm";
    }


    $query = "insert into testdrive (custID,carID,date,timeSlot,nic,licence,tsID) values(?,?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $query);
    mysqli_stmt_bind_param($stmt, "iisssss", $custID, $carID, $date, $time, $nic, $licence, $timeSlot);

    if (mysqli_stmt_execute($stmt)) {
        $query = "select date from testdrivedates where date='$date'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $query = "update testdrivedates set $timeSlot=1 where date='$date'";
            echo $query;
            if (mysqli_query($conn, $query)) {
                header("Location:../index.php?alert=bksuccess");
            } else {
                header("Location:../index.php?alert=error");
            }
        } else {
            $query = "insert into testdrivedates (date,$timeSlot) values(?,?)";
            $bool = 1;

            $stmt = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt, $query);
            mysqli_stmt_bind_param($stmt, "si", $date, $bool);
            if (mysqli_stmt_execute($stmt)) {
                header("Location:../index.php?alert=bksuccess");
            } else {
                header("Location:../index.php?alert=error");
            }
        }
    } else {
        header("Location:index.php?alert=error");
    }
}
