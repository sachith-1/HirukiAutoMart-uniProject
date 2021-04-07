<?php
$serverName = "localhost";
$userName = "root";
$password = "password";
$dbName = "hirukiautomart";

$conn = mysqli_connect($serverName, $userName, $password, $dbName);
//mysqli_report(MYSQLI_REPORT_OFF);

$query = "select preoderID,fullPayDuration,daycounter,customer.fname,customer.email,preoder.carID,preoder.custID,car.name from preoder inner join customer on preoder.custID=customer.custID inner join car on preoder.carID=car.carID  where isPaid=2 and fullPayDuration>0";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {

    $fullDuration = $row['fullPayDuration'];
    $dayCounter = $row['daycounter'];
    $carID = $row['carID'];
    $preID = $row['preoderID'];
    $custID = $row['custID'];
    $email = $row['email'];
    $fname = $row['fname'];
    $carName = $row['name'];

    if ($fullDuration  >= $dayCounter) {

        if ($fullDuration - 7 == $dayCounter || $fullDuration - 2 == $dayCounter || $fullDuration - 1 == $dayCounter) {
            //email
            $to = $email;
            $subject = "Preorder Reminder";
            $message = '';

            if ($fullDuration - 7 == $dayCounter) {
                $message = "hi $fname, <br>
                        This is kind reminder that you have only 7 days remaining plase make full payment and buy the $carName you ordered.<br>
                        <b>If you are unable to make full payment within next 7 days your preorder will be canceled and you will not be refunded your preorder payment</b><br>
                        contact us :
                            telephone- 011 1122333
                            email - hirukicar@gmail.com";
            } else if ($fullDuration - 2 == $dayCounter) {
                $message = "hi $fname, <br>
                        This is kind reminder that you have only 2 days remaining plase make full payment and buy the $carName you ordered.<br>
                        <b>If you are unable to make full payment within next 2 days your preorder will be canceled and you will not be refunded your preorder payment</b><br>
                        contact us :
                            telephone- 011 1122333
                            email - hirukicar@gmail.com";
            } else if ($fullDuration - 1 == $dayCounter) {
                $message = "hi $fname, <br>
                        This is kind reminder that you have only 1 days remaining plase make full payment and buy the $carName you ordered.<br>
                        <b>If you are unable to make full payment within tommorow your preorder will be canceled and you will not be refunded your preorder payment</b><br>
                        contact us :
                            telephone- 011 1122333
                            email - hirukicar@gmail.com";
            }
            $headers = "From: hirukicar@gmail.com \r\n";
            $headers .= "MIME-Version: 1.0" . "\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\n";
            @mail($to, $subject, $message, $headers);
        } else if ($fullDuration == $dayCounter) {
            // email telling that preorder will remove from the systme after today

            $to = $email;
            $subject = "Preorder Reminder";
            $message = "hi $fname, <br>
                        This is kind remainder that you have to make full payment within today and buy the $carName you ordered.<br>
                        <b>If you are unable to make full payment within today your preorder will be canceled and you will not be refunded your preorder payment</b><br>
                        contact us :
                            telephone- 011 1122333
                            email - hirukicar@gmail.com";
            $headers = "From: hirukicar@gmail.com \r\n";
            $headers .= "MIME-Version: 1.0" . "\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\n";
            @mail($to, $subject, $message, $headers);
        }

        $dayCounter += 1;
        $query = "update preoder set daycounter=$dayCounter where preoderID=$preID";
        mysqli_query($conn, $query);
    } else {
        //add car to car table
        $query = "UPDATE car SET isAvailable=1 where carID=$carID";
        mysqli_query($conn, $query);

        //remove the preoder from preorder table
        $query = " delete from preoder where preoderID=$preID";
        mysqli_query($conn, $query);

        //add expired preorders to expiredpreorders table
        $query = "insert into expiredpreorders (custID,carID) values($custID,$carID)";
        mysqli_query($conn, $query);

        //email telling that preorder is removed.

        $to = $email;
        $subject = "Preorder Canceled";
        $message = "hi $fname, <br>
                        We are sorry to inform you that your preorder for $carName is canceled. and The preorder payment is not refunded<br>
                        contact us :
                            telephone- 011 1122333
                            email - hirukicar@gmail.com";
        $headers = "From: hirukicar@gmail.com \r\n";
        $headers .= "MIME-Version: 1.0" . "\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\n";
        @mail($to, $subject, $message, $headers);
    }
}
