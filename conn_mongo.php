<?php
$host="localhost";
$username=null;
$password=null;
$userdb="scholarship";
$database=$userdb.".feedback";
$manager = new MongoDB\Driver\Manager("mongodb://{$host}/{$userdb}");
if($manager==true)
{
    echo "connected";
}else
{
    echo "not connected";
}
?>