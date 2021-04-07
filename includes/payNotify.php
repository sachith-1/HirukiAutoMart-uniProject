<?php
/*if (!isset($_POST['order_id']) && empty($_POST['order_id'])) {
    header("Location:../index.php");
}*/
include("DbConn.php");

$merchant_id         = $_POST['merchant_id'];
$custID             = $_POST['order_id'];
$payhere_amount     = $_POST['payhere_amount'];
$payhere_currency    = $_POST['payhere_currency'];
$status_code         = $_POST['status_code'];
$status_message      = $_POST['status_message'];
$md5sig                = $_POST['md5sig'];
$method = $_POST['method'];
$paymentID = null;



$merchant_secret = '4Tq088DJi5P8cLJ1Nyk8n28QkzytD2DAo4p9OWL1n2cJ';

$local_md5sig = strtoupper(md5($merchant_id . $custID . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret))));

$q = "insert into test values('$merchant_id',$custID,'$md5sig','$local_md5sig')";
mysqli_query($conn, $q);

if (($local_md5sig === $md5sig) and ($status_code == 2)) {
    /*status_code - Payment status code (2, 0, -1, -2, -3) 
    2 - success
    0 - pending
    -1 - canceled
    -2 - failed
    -3 - chargedback
    */
    $date = date("Y-m-d");

    //insert data into payment table
    $query = "INSERT INTO payment (date,payMethod,amount,status_message,status_code) VALUES (?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $query);
    mysqli_stmt_bind_param($stmt, "ssdsi", $date, $method, $payhere_amount, $status_message, $status_code);
    mysqli_stmt_execute($stmt);

    //take paymentID
    $query = "SELECT paymentID FROM payment ORDER BY paymentID DESC LIMIT 1";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $GLOBALS['paymentID'] = $row['paymentID'];
    }

    //if vehicle preoder 
    if (isset($_POST['custom_1']) && $_POST['custom_1'] == "car") {
        // get the carID of preodered cars
        $query0 = "SELECT carID FROM preoder where custID=? AND ispaid=0 AND paymentID IS NULL";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $query0);
        mysqli_stmt_bind_param($stmt, "i", $custID);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        //remove preodered cars from car table
        while ($row = mysqli_fetch_assoc($result)) {
            $carID = $row['carID'];
            $query0 = "UPDATE car SET isAvailable=0 where carID=$carID";
            //$query0 = "DELETE FROM car WHERE carID=$carID";
            mysqli_query($conn, $query0);

            //delete the booking for preordered vehicles and send email to customer
            $query2 = "select customer.fname,customer.email,car.name,tsID,date from testdrive inner join customer on testdrive.custID=customer.custID inner join car on testdrive.carID=car.carID where testdrive.carID=$carID";
            $result = mysqli_query($conn, $query2);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    //email
                    $to = $row['email'];
                    $subject = "Booking Cancelation";
                    $message = "hi " . $row['fname'] . ",<br> We are really sorry to inform you that,your booking for " . $row['name'] . " has been canceled since the vehicle is already sold. ";
                    $headers = "From: hirukicar@gmail.com \r\n";
                    $headers .= "MIME-Version: 1.0" . "\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\n";
                    @mail($to, $subject, $message, $headers);
                    $tsID = $row['tsID'];
                    $tdate = $row['date'];
                    //make timeSlot available
                    $query3 = "update testdrivedates set $tsID=0 where date='$tdate'";
                    mysqli_query($conn, $query3);
                }
                //delete
                $query2 = "delete from testdrive where carID=$carID";
                mysqli_query($conn, $query2);
            }
        }

        //update preoder table
        $query0 = "UPDATE preoder SET paymentID=?,isPaid=?,daycounter=1  where custID=? AND ispaid=0 AND paymentID IS NULL";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $query0);
        mysqli_stmt_bind_param($stmt, "iii", $paymentID, $status_code, $custID);
        mysqli_stmt_execute($stmt);
    }

    //if part oder
    if (isset($_POST['custom_2']) && $_POST['custom_2'] == "part") {

        // get the partID of ordered parts
        $query0 = "SELECT partID,qty FROM oder where custID=? AND ispaid=0 AND paymentID IS NULL";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $query0);
        mysqli_stmt_bind_param($stmt, "i", $custID);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        //remove ordered parts from oder table
        while ($row = mysqli_fetch_assoc($result)) {
            $partID = $row['partID'];
            $orderQty = $row['qty'];
            $query0 = "SELECT qty FROM part WHERE partID=$partID";
            $result1 = mysqli_query($conn, $query0);
            while ($data = mysqli_fetch_assoc($result1)) {
                if ($data['qty'] > 1) {
                    $partQty = $data['qty'] - $orderQty;
                    $query0 = "UPDATE part SET qty=$partQty WHERE partID=$partID";
                } else {
                    $query0 = "DELETE FROM part WHERE partID=$partID";
                }
                mysqli_query($conn, $query0);
            }
        }
        //update oder table
        $query1 = "UPDATE oder SET paymentID=?,isPaid=? where custID=? AND ispaid=0 AND paymentID IS NULL";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $query1);
        mysqli_stmt_bind_param($stmt, "iii", $paymentID, $status_code, $custID);
        mysqli_stmt_execute($stmt);
    }
}
