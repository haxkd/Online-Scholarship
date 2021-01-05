<?php
session_start();
require_once "sessionvalid.php";
require_once "conn.php";

?>
<?php
    if(isset($_POST['approve']))
    {
        $sql_a="UPDATE scholar_user SET status='APPROVED' ,amount ='$_POST[amount]',progress='100'  WHERE s_email='$_POST[email]'";
                
        $x=mysqli_query($conn,$sql_a);
        if($x==true)
        {
            header("location:appliedstudent.php");
        }
    }
?>
<?php
    if(isset($_GET['reject']))
    {
        
        $sql_r="UPDATE scholar_user SET status='REJECTED',progress='100' WHERE s_email='$_GET[reject]'";

        $x=mysqli_query($conn,$sql_r);
        if($x==true)
        {
            header("location:appliedstudent.php");
        }
    }
   
?>