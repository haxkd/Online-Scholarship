<?php
session_start();
include_once 'conn.php';
if(isset($_POST['signup'])){
$name = mysqli_real_escape_string($conn,$_POST['name']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$pass = mysqli_real_escape_string($conn,$_POST['password']);
$cpass = mysqli_real_escape_string($conn,$_POST['cpassword']);
$s_reg = mysqli_real_escape_string($conn,$_POST['s_reg']);
$qemail = "SELECT * FROM scholar_user WHERE s_email='$email'";
$rem = mysqli_query($conn,$qemail);
if(mysqli_num_rows($rem)>0){
    $_SESSION['msg'] = 'Email already exist........!';
    header("location: login.php");
    exit();
}
else if($pass != $cpass){
    $_SESSION['msg'] = 'Password does not matched........!';
    header("location: signup.php");
    exit();
}
else{
    $password = md5($cpass);
    $q = "INSERT INTO scholar_user (s_reg,s_name,s_email,s_pass) VALUES ('$s_reg','$name','$email','$password')";
    $x = mysqli_query($conn,$q);
    if($x){
        $_SESSION['msg'] = 'Registration Successfully........!';
        header("location: login.php");
        exit();
        }
        else{
            $_SESSION['msg'] = 'Something Went Wrong.............!';
        header("location: login.php");
        exit();
            }
    }
}
else if(isset($_POST['login'])){
$s_reg = mysqli_real_escape_string($conn,$_POST['s_reg']);
$pass = mysqli_real_escape_string($conn,$_POST['password']);
$password = md5($pass);
echo $q = "SELECT * FROM scholar_user WHERE s_reg='$s_reg'";
$x = mysqli_query($conn,$q);
if(mysqli_num_rows($x)>0){
    $row = mysqli_fetch_assoc($x);
    if($password==$row['s_pass']){
    $_SESSION['student'] = $row['s_email'];
    $_SESSION['sroll'] = $row['s_id'];
    header('location: profile.php');
    }else{
        $_SESSION['msg']='PASSWORD IS WRONG........!';
        header('location: login.php');
    }
}else
{
    $_SESSION['msg']='REGSITRATION NUMBER NOT FOUND...........!';
    header('location: login.php');
}
}

else{
    echo 'GET OUT.......................!';
}
?>