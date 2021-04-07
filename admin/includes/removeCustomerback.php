<?Php
session_start();
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
  header("Location:../login.php");
}
if (isset($_POST['confirm'])) {
    if (isset($_POST['id'])){
        $userid = $_POST['id'];
include_once("../../includes/DbConn.php");

$sql="select * from customer where custID=?";
$stmnt = mysqli_stmt_init($conn);
if (mysqli_stmt_prepare($stmnt, $sql)) {
    mysqli_stmt_bind_param($stmnt,"i",$userid);

    if(mysqli_stmt_execute($stmnt)){
       $result=mysqli_stmt_get_result($stmnt);
       if(mysqli_num_rows($result)>0){

        $query = "DELETE FROM customer WHERE custID=?";
        $stmnt = mysqli_stmt_init($conn);
        
        if (mysqli_stmt_prepare($stmnt, $query)) {
            mysqli_stmt_bind_param($stmnt,"i",$userid);
        
                if(mysqli_stmt_execute($stmnt)){
                
                    header("Location:../webPages/removeCustomer.php?remove=success");
                }
                else{
                    header("Location:../webPages/removeCustomer.php?remove=mysql_error");
                }   
        }
        else {
            header("Location:../webPages/removeCustomer.php?remove=mysql_error");
        }

       }else{
           header("Location:../webPages/removeCustomer.php?remove=non_exist");
       }
       
    }
    else{
        header("Location:../webPages/removeCustomer.php?remove=mysql_error");
    }   
}



mysqli_close($conn);

    }
}
?>