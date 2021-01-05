<?php
session_start();
include_once 'conn.php';
if(isset($_POST['scholar_doc'])){
    $s_email = $_SESSION['student'];
    $id = $_SESSION['sroll'];
    $extensions= array("jpeg","jpg","png","pdf");


    /*Adhar Card or Pan Card file details */
    $doc_verify_name =$_FILES['doc_verify']['name'];
    echo $doc_verify_size =$_FILES['doc_verify']['size'];
    $doc_verify_tmp = $_FILES['doc_verify']['tmp_name'];
    $doc_verify_text = pathinfo($_FILES["doc_verify"]["name"], PATHINFO_EXTENSION);
    $doc_verify_ext=strtolower($doc_verify_text);

    
    if(in_array($doc_verify_ext,$extensions)=== false){
        
        $_SESSION['msg'] = "Please choose a JPEG,JPG,PNG or PDF Adhar or Pan card.";
        header('location: document.php');
        exit();
    }
     if($doc_verify_size > 2097152){
        $_SESSION['msg']='Adhar Card or Pan Card file size must be smaller than 2 MB';
        header('location: document.php');
        exit();
     }

    /*Marksheets file details */

    $doc_marksheet_name =$_FILES['doc_marksheet']['name'];
    $doc_marksheet_size =$_FILES['doc_marksheet']['size'];
    $doc_marksheet_tmp = $_FILES['doc_marksheet']['tmp_name'];
    $doc_marksheet_text = pathinfo($_FILES["doc_marksheet"]["name"], PATHINFO_EXTENSION);
    $doc_marksheet_ext=strtolower($doc_marksheet_text);

    if(in_array($doc_marksheet_ext,$extensions)=== false){
        $_SESSION['msg'] = "Please choose a JPEG,JPG,PNG or PDF Marksheet.";
        header('location: document.php');
        exit();
     }
     if($doc_marksheet_size > 2097152){
        $_SESSION['msg']='Marksheet file size must be smaller than 2 MB';
        header('location: document.php');
        exit();
     }


    /*Income Certificate file details */

    $doc_income_name =$_FILES['doc_income']['name'];
    $doc_income_size =$_FILES['doc_income']['size'];
    $doc_income_tmp = $_FILES['doc_income']['tmp_name'];
    $doc_income_text = pathinfo($_FILES["doc_income"]["name"], PATHINFO_EXTENSION);
    $doc_income_ext=strtolower($doc_income_text);

    if(in_array($doc_income_ext,$extensions)=== false){
        $_SESSION['msg'] = "Please choose a JPEG,JPG,PNG or PDF Income Certificate.";
        header('location: document.php');
        exit();
    }
    if($doc_income_size > 2097152){
        $_SESSION['msg']='Income Certificate file size must be smaller than 2 MB';
        header('location: document.php');
        exit();
    }

    /*Photo file details */

    $doc_photo_name =$_FILES['doc_photo']['name'];
    $doc_photo_size =$_FILES['doc_photo']['size'];
    $doc_photo_tmp = $_FILES['doc_photo']['tmp_name'];
    $doc_photo_text = pathinfo($_FILES["doc_photo"]["name"], PATHINFO_EXTENSION);
    $doc_photo_ext=strtolower($doc_photo_text);

    if(in_array($doc_photo_ext,$extensions)=== false){
        $_SESSION['msg'] = "Please choose a JPEG,JPG,PNG or PDF , Photo.";
        header('location: document.php');
        exit();
    }
    if($doc_photo_size > 2097152){
        $_SESSION['msg']='Phone size must be smaller than 2 MB';
        header('location: document.php');
        exit();
    }
    $id = "$id"."_";
    /*UPLOAD ALL files in server*/
    move_uploaded_file($doc_verify_tmp,"images/$id".$doc_verify_name);
    move_uploaded_file($doc_marksheet_tmp,"images/$id".$doc_marksheet_name);
    move_uploaded_file($doc_income_tmp,"images/$id".$doc_income_name);
    move_uploaded_file($doc_photo_tmp,"images/$id".$doc_photo_name);

    
    $q = "INSERT INTO scholar_doc (s_email, doc_verify, doc_marksheet, doc_income, doc_photo) VALUES 
                                    ('$s_email','images/$id$doc_verify_name','images/$id$doc_marksheet_name','images/$id$doc_income_name','images/$id$doc_photo_name')";
    
    mysqli_query($conn,"UPDATE `scholar_user` SET `progress`='75' WHERE `s_email` = '$email'");
    $x = mysqli_query($conn,$q);
    if($x){
        $_SESSION['msg'] = 'DOCUMENTS UPLOADED SUCCESSFULLY';
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