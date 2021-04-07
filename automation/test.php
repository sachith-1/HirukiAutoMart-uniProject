<?php

$serverName = "localhost";
$userName = "root";
$password = "password";
$dbName = "hirukiautomart";

$conn = mysqli_connect($serverName, $userName, $password, $dbName);
mysqli_report(MYSQLI_REPORT_OFF);

$sql = "insert into debug (t1,t2) values(12,33)";
mysqli_query($conn, $sql);
