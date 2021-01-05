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

$q = "SELECT * FROM scholar_form WHERE s_email='$email'";
$x = mysqli_query($conn,$q);
if(mysqli_num_rows($x)>0){
    $_SESSION['msg'] = 'FORM ALREADY FILLED........!';
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
          <h2>SCHOLARSHIP FORM</h2>
          <p>Dear student, Fill the form completely and correctly.</p>
        </div>
        
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
          <form action="scholarships.php" method="post" role="form" data-aos="fade-up" data-aos-delay="100">
              
              <div class="form-row">
                <div class="col-md-12 form-group">
                  Select Category : 
                  <select name="scholar_category" class="form-control" required>
                    <option value="Academic Scholarships">Academic Scholarships</option>
                    <option value="Scholarships for Minorities">Scholarships for Minorities</option>
                    <option value="Scholarships for Women">Scholarships for Women</option>
                    <option value="SC ST OBC Scholarship">SC ST OBC Scholarship</option>
                  </select>
                </div>
              </div>


              <div class="form-row">
                <div class="col-md-12 form-group">
                  Select Scholarship : 
                  <select name="scholar_scholarship" class="form-control" required>
                    <option value="National Level Scholarships">National Level Scholarships</option>
                    <option value="G. P. Birla Scholarship">G. P. Birla Scholarship</option>
                    <option value="CLP India Scholarship Scheme">CLP India Scholarship Scheme</option>
                    <option value="Sitaram Jindal Foundation Scholarship Scheme">Sitaram Jindal Foundation Scholarship Scheme</option>
                    <option value="NIU Scholarship cum Admission Test (NSAT)">NIU Scholarship cum Admission Test (NSAT)</option>
                    <option value="Raman Kant Munjal Scholarship">Raman Kant Munjal Scholarship</option>
                    <option value="Dr. Reddy’s Foundation Sashakt Scholarship">Dr. Reddy’s Foundation Sashakt Scholarship</option>
                    <option value="The Anant Fellowship">The Anant Fellowship</option>
                  </select>
                </div>
              </div>


              <div class="form-row">
                <div class="col-md-12 form-group">
                  Full Name : <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Enter Your Full Name" required>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-12 form-group">
                  Registration Number : <input type="text" name="regno" class="form-control" id="regno" placeholder="Enter Your Registration Number" required>
                </div>
              </div>

              <div class="form-row">
                <div class="col-md-12 form-group">
                  Age : <select name="age" class="form-control" required>
                    <option value="">Select Your Age</option>
                    <option value="30">30</option>
                    <option value="29">29</option>
                    <option value="28">28</option>
                    <option value="27">27</option>
                    <option value="26">26</option>
                    <option value="25">25</option>
                    <option value="24">24</option>
                    <option value="23">23</option>
                    <option value="22">22</option>
                    <option value="21">21</option>
                    <option value="20">20</option>
                    <option value="19">19</option>
                    <option value="18">18</option>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-12 form-group">
                Gender : <div class="form-control" style="padding-left: 20px;font-size:20px;" title="Choose Your Gender">
                  <input type="radio" name="gender" value="M" required >Male
                  <input type="radio" name="gender" value="FM" required>Female
                  <input type="radio" name="gender" value="O" required>Other
                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col-md-12 form-group">
                  House No. and Locality : <input type="text" name="address_house" class="form-control" placeholder="Enter Your house number and locality" required>
                </div>
              </div>

              <div class="form-row">
                <div class="col-md-12 form-group">
                  City : <input type="text" name="address_city" class="form-control" placeholder="Enter Your City" required>
                </div>
              </div>

              <div class="form-row">
                <div class="col-md-12 form-group">
                  State : <input type="text" name="address_state" class="form-control" placeholder="Enter Your State" required>
                </div>
              </div>

              <div class="form-row">
                <div class="col-md-12 form-group">
                  Pin Code : <input type="text" name="address_pin" class="form-control" placeholder="Enter Your Pin Code" required>
                </div>
              </div>

              <div class="form-row">
                <div class="col-md-12 form-group">
                  College Email ID : <input type="email" class="form-control" name="cemail" id="email" placeholder="Enter Your College Email Id" required>
                </div>
              </div>

              <div class="form-row">
                <div class="col-md-12 form-group">
                  Bank Name : <input type="text" class="form-control" name="bank_name" placeholder="Enter Your Bank Name" required>
                </div>
              </div>

              <div class="form-row">
                <div class="col-md-12 form-group">
                  Bank Account No. : <input type="text" class="form-control" name="bank_acno" placeholder="Enter Your Bank Account Number" required>
                </div>
              </div>

              <div class="form-row">
                <div class="col-md-12 form-group">
                  Bank Ifsc Code : <input type="text" class="form-control" name="bank_ifsc" placeholder="Enter Your Bank IFSC code" required>
                </div>
              </div>








              <div class="form-row">
                <div class="col-md-12 form-group">
                  CGPA : <input type="text" class="form-control" name="cgpa" placeholder="Enter Your CGPA" required>
                </div>
              </div>


              <div class="form-row">
                <div class="col-md-12 form-group">
                  Mobile No. :<input type="tel" class="form-control" name="phone" placeholder="Enter Your 10 digit Mobile Number" pattern="[0-9]{10}" required>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-12 form-group">
                  Parents Name : <input type="text" class="form-control" name="parent" placeholder="Enter Your Parents Name" required>
                </div>
              </div>

              <div class="form-row">
                <div class="col-md-12 form-group">
                  Family Income : <input type="text" class="form-control" name="income" placeholder="Enter Your Family Income" required>
                </div>
              </div>

              <div class="form-row">
                <div class="col-md-12 form-group">
                  Scholarship Code : <input type="text" class="form-control" name="s_code" placeholder="Enter Scholarship Code" required>
                </div>
              </div>

              <div class="form-row">
                <div class="col-md-12 form-group">
                  <p style="color:red;font-size:20px;">Please Re-check all the details which have been filled above before submitting..............!</p>
                </div>
              </div>  
              <div class="text-center"><button type="submit" class="appointment-btn" name="scholar_form">Submit Your Form</button></div>
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