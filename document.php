<?php
session_start();
include_once 'header.php';
include_once 'conn.php';
if(isset($_SESSION['student'])){
    $email = $_SESSION['student'];
}else{
    header('location: login.php');
}


$q = "SELECT * FROM scholar_doc WHERE s_email='$email'";
$x = mysqli_query($conn,$q);
if(mysqli_num_rows($x)>0){
    $_SESSION['msg'] = 'DOCUMENT ALREADY UPLOADED........!';
    header("location: profile.php");
    exit();
}

?>



<main id="main">
<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h2>Scholarship Form</h2>
      <ol>
        <li><a href="index.php">Home</a></li>
        <li>Fill The Form</li>
      </ol>
    </div>
  </div>
</section><!-- End Breadcrumbs Section -->


    <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg">
   
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>REQUIRED DOCUMENTS</h2>
          <p>Dear student, Please Upload Your Required Documents correctly.</p>
        </div>
        
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
          <form action="documents.php" method="post" role="form" data-aos="fade-up" data-aos-delay="100" enctype="multipart/form-data">
              <div class="form-row">
                <div class="col-md-12 form-group">
                  Adhar or Pan Card : <input type="file" name="doc_verify" class="form-control"  required>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-12 form-group">
                    Marksheet : <input type="file" name="doc_marksheet" class="form-control" required>
                </div>
              </div>

              <div class="form-row">
                <div class="col-md-12 form-group">
                Income Certificate : <input type="file" class="form-control" name="doc_income" required>
                </div>
              </div>

              <div class="form-row">
                <div class="col-md-12 form-group">
                  Passport Size Photo : <input type="file" class="form-control" name="doc_photo" required>
                </div>
              </div>
  
              <div class="form-row">
                <div class="col-md-12 form-group">
                  <p style="color:red;font-size:20px;">Please Re-check all the documents which you have been uploaded above before submitting..............!</p>
                </div>
              </div>  
              <div class="text-center"><button type="submit" class="appointment-btn" name="scholar_doc">Submit Your Documents</button></div>
            </form>
          </div>
          <div class="col-md-3"></div>
        </div>
        

      </div>
    </section><!-- End Appointment Section -->



</main>
<?php
include_once 'footer.php';
?>