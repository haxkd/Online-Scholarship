<?php
include_once 'header.php';
session_start();
if(isset($_SESSION['student'])){
  header('location: profile.php');
}

?>
<main id="main">
<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h2>Login Page</h2>
      
      <ol>
        <li><a href="index.php">Home</a></li>
        <li>Login Page</li>
      </ol>
    </div>
  </div>
</section><!-- End Breadcrumbs Section -->

    <!-- ======= LOGIN Section ======= -->
    <section id="appointment" class="appointment section-bg">
<?php
if(isset($_SESSION['msg'])){
echo " <h3 style='color:red;text-align:center;'>$_SESSION[msg] </h3>";
unset($_SESSION['msg']);
}
?>
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>-: LOGIN :-</h2>
        </div>
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
          <form action="reg.php" method="post" role="form">
          <div class="form-row">
            <div class="col-md-12">
              <div class="form-group">
              <label for="s_reg">Registration No. :</label> <input type="text" class="form-control" id="s_reg" name="s_reg" placeholder="Your Registration Number" autofocus required>
              </div>              
            </div>
            <div class="col-md-12 form-group">
             Password : <input type="password" class="form-control" name="password" id="password" placeholder="Your Password" data-msg="Please enter at least 4 chars" required>
              
            </div>
          </div>
          <div class="text-center"><button type="submit" class="appointment-btn" name="login">LOGIN</button></div>

          <br><br>  <div class="text-center">Not Have an account? 
            <a href="signup.php" class="appointment-btn scrollto">SIGN UP</a></div>
            
        </form>
        
      </div>
                  <div class="col-md-3"></div>
              </div>
      </div>
    </section><!-- End LOGIN Section -->
</main>
<?php
include_once 'footer.php';
?>