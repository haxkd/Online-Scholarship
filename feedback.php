<?php
session_start();
include_once 'header.php';
include_once 'conn.php';

if(isset($_SESSION['student'])){
    $email = $_SESSION['student'];
}else{
    header('location: login.php');
    exit();
}
?>

<?php
session_start();
include_once 'conn.php';
if(isset($_POST['scholar_feedback'])){
   require_once "conn_mongo.php";
           try{
    
               if ($manager) {
                  $bulk = new MongoDB\Driver\BulkWrite;
                  $bulk->insert(['id' => $_SESSION['sroll'],'email'=>$_SESSION['student'],'feed'=>$_POST['feedback']]);
                   $manager->executeBulkWrite($database, $bulk);
                                 
                   $filter = ['x' => ['$gt' => 1]];
                  $options = [
                               'projection' => ['_id' => 0],
                                'sort' => ['x' => -1],
                              ];
                            }  
                            $_SESSION['msg'] = 'FEEDBACK SUBMITTED SUCCESSFULLY';
                            header('location: profile.php');
                            exit();  
                 }catch(Exception $e){
                     echo  "<center><h1>Doesn't work</h1></center>";
                     $_SESSION['msg'] = 'SOMETHING WENT WRONG............!';
                     header('location: profile.php');
                         exit;
                 }
}
?>

<?php
/*$q = "SELECT * FROM scholar_feedback WHERE s_email='$email'";
$x = mysqli_query($conn,$q);
if(mysqli_num_rows($x)>0){
    $_SESSION['msg'] = 'FEEDBACK ALREADY SUBMITTED........!';
    header("location: profile.php");
    exit();
}*/
?>



<main id="main">
<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h2>Profile Page</h2>
      <ol>
        <li><a href="index.php">Home</a></li>
        <li>Profile Page</li>
        <li><a href="logout.php" class="appointment-btn scrollto">LOGOUT</a></li>
      </ol>
    </div>
  </div>
</section><!-- End Breadcrumbs Section -->


 <?php
if(isset($_SESSION['msg'])){
echo "<h3 style='color:red;text-align:center;'>$_SESSION[msg] </h3>";
unset($_SESSION['msg']);
}
?>

    <!-- =======Feedback Section ======= -->
    <section id="appointment" class="appointment section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>-: Feedback :-</h2>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
               
                <form action="" method="POST">
                    <textarea name="feedback"  cols="30" rows="10" style="resize:none;"></textarea><hr>
                    <input type="submit" value="SEND" name="scholar_feedback" class="btn appointment-btn">
                </form>
            </div>
        </div>
    </div>

    </section><!-- End Feedback Section -->

<?php
include_once 'footer.php';
?>




