<?php
if (!isset($_POST['vkey'])) {
    header("Location:../index.php");
    exit();
} else {
    include_once("DbConn.php");

    $vkey = $_POST['vkey'];
    $pass = $_POST['pass'];

    $encpass = password_hash($pass, PASSWORD_ARGON2ID);
    $query = "update customer set pass=?,status=2 where vkey=?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $query);
    mysqli_stmt_bind_param($stmt, "ss", $encpass, $vkey);
    if (mysqli_stmt_execute($stmt)) {
        header("Location:../supPages/passchanged.php?bool=true");
        exit();
    } else {
        echo "Something went wrong while Changing your password trye again later";
    }
}
