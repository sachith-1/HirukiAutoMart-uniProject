<?php

include_once("includes/DbConn.php");

$sql = "insert into debug (t1,t2) values(12,33)";
mysqli_query($conn, $sql);
