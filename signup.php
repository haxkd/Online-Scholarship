<?php
include_once 'header.php';
?>
 <script>
        var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('cpassword').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Password is matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Password does not matched';
  }
}
    </script>
<main id="main">
<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h2>SignUp Page</h2>
      <ol>
        <li><a href="index.php">Home</a></li>
        <li>SignUp Page</li>
      </ol>
    </div>
  </div>
</section><!-- End Breadcrumbs Section -->

    <!-- ======= LOGIN Section ======= -->
    <section id="appointment" class="appointment section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>-: SIGN UP :-</h2>
          
        </div>
        <div class="row">
                  <div class="col-md-3"></div>
                  <div class="col-md-6">
        <form action="reg.php" method="post">
          <div class="form-row">
          <div class="col-md-12 form-group">
              Registration Number : <input type="text" name="s_reg" class="form-control" placeholder="Registration no." required title="Enter Your Registration no." autofocus>
              <div class="validate"></div>
            </div>
            <div class="col-md-12 form-group">
              Name : <input type="text" name="name" class="form-control" placeholder="Your Name" required title="Enter Your Name" autofocus>
              <div class="validate"></div>
            </div>
            <div class="col-md-12 form-group">
              Email : <input type="email" class="form-control" name="email" placeholder="Your Email" required>
            </div>
            <div class="col-md-12 form-group">
              Password : <input type="password" class="form-control" id="password" name="password" placeholder="Your Password"  required onkeyup='check();'>
              <div class="validate"></div>
            </div>
            <div class="col-md-12 form-group">
              Confirm Password : <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Your Password" required onkeyup='check();'>
              <br><div class="validate"><span id='message'></span></div>
            </div>
            
          </div>
          
          <div class="text-center">
          <input type="submit" class="appointment-btn scrollto" name="signup" value="SIGNUP">
          </div>
        </form></div>

                  <div class="col-md-3"></div>

              </div>
        

      </div>
    </section><!-- End LOGIN Section -->




</main>
<?php
include_once 'footer.php';
?>