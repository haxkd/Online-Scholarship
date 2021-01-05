<?php
session_start();
include_once 'conn.php';
if(isset($_POST['scholar_form'])){
    $email = $_SESSION['student'];

    $scholar_category = $_POST['scholar_category'];   
    $scholar_scholarship = $_POST['scholar_scholarship'];


    $name = $_POST['fullname'];
    $regno = $_POST['regno'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    
    $address_house = $_POST['address_house'];
    $address_city = $_POST['address_city'];
    $address_state = $_POST['address_state'];
    $address_pin = $_POST['address_pin'];

    $cemail = $_POST['cemail'];
    $bank_name = $_POST['bank_name'];
    $bank_acno = $_POST['bank_acno'];
    $bank_ifsc = $_POST['bank_ifsc'];
    $cgpa = $_POST['cgpa'];
    $phone = $_POST['phone'];
    $parent = $_POST['parent'];
    $income = $_POST['income'];
    $s_code = $_POST['s_code'];

    $q = "INSERT INTO scholar_form (scholar_category,scholar_scholarship,s_email,s_name, s_reg, s_age, s_gender, address_house,address_city,address_state,address_pin,s_cemail,bank_name,bank_ac_no,bank_ifsc, s_cgpa,s_mob, s_parent, s_income,s_code) VALUES 
                                    ('$scholar_category','$scholar_scholarship','$email','$name','$regno','$age','$gender','$address_house','$address_city','$address_state','$address_pin','$cemail','$bank_name','$bank_acno','$bank_ifsc','$cgpa','$phone','$parent','$income','$s_code')";
    mysqli_query($conn,"UPDATE `scholar_user` SET `status`='Applied', `progress`='50' WHERE `s_email` = '$email'");
    $x = mysqli_query($conn,$q);
    if($x){
        $_SESSION['msg'] = 'SCHOLARSHIP FORM FILLED SUCCESSFULLY';
        header('location: profile.php');
        exit();
    }else{
        $_SESSION['msg'] = 'SOMETHING WENT WRONG............!';
        header('location: profile.php');
        exit();
    }
}else{
    echo 'GET OUT................';
}
?>