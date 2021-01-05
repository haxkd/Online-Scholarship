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
<main id="main">
<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h2>Profile Page</h2>
      <ol>
        <li><a href="index.php">Home</a></li>
        <li>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
          Email It
        </button>
        </li>
        <li><a href="logout.php" class="appointment-btn scrollto">LOGOUT</a></li>
      </ol>
    </div>
  </div>
</section><!-- End Breadcrumbs Section -->

<?php

$q = "SELECT * FROM scholar_user WHERE s_email='$email'";
$x = mysqli_query($conn,$q);
$row = mysqli_fetch_assoc($x);
$name = $row['s_name'];
?>
 <?php
if(isset($_SESSION['msg'])){
echo "<h3 style='color:red;text-align:center;'>$_SESSION[msg] </h3>";
unset($_SESSION['msg']);
}
?>

    <!-- ======= PROFILE Section ======= -->
    <section id="appointment" class="appointment section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>-: STATUS :-</h2>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
               
            <?php

$qs = "SELECT * FROM scholar_user WHERE s_email='$email'";
$xs = mysqli_query($conn,$qs);
$rows = mysqli_fetch_assoc($xs);
$status = $rows['status'];
$progress = $rows['progress'];
?>



<h3 style='color:red;text-align:center;'><?php echo  $status; ?></h3>

<div class="progress">
  <div class="progress-bar progress-bar-striped active" role="progressbar"
  aria-valuenow="<?php echo  $progress; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo  $progress; ?>%">
  <?php echo  $progress; ?>%
  </div>
</div>




            </div>
        </div>
    </div>

    </section><!-- End LOGIN Section -->

<?php
include_once 'footer.php';
?>