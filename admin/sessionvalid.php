<?php
if(empty($_SESSION['admin']))
{
    header("location:index.php");
    exit();
}
?>