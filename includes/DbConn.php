<?php
// Conncetion to mysql DB
$serverName = "localhost";
$userName = "root";
$password = "password";
$dbName = "hirukiautomart";

$conn = mysqli_connect($serverName, $userName, $password, $dbName);
mysqli_report(MYSQLI_REPORT_OFF);
