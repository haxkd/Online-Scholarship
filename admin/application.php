<?php
session_start();
require_once "sessionvalid.php";
require_once "conn.php";

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Dashboard</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <?php require_once "css.php"; ?>

    
</head>
<body>
<style>
    .mypt{
        padding-top: 10px;
    }
    .myn{
        color: rgb(32, 17, 232);
    }
</style>
<div class="wrapper">
    <?php require_once "side.php";?>

    <div class="main-panel">
        
    <?php require_once "navtop.php";?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center mypt">Application Form</h4>
                            </div>
                            <div class="content">
                                    <?php 
                                    $q = "SELECT * FROM scholar_form WHERE s_email='$_GET[s_email]'";
                                    $x = mysqli_query($conn,$q);
                                    if(mysqli_num_rows($x)>0)
                                    {
                                        $row = mysqli_fetch_assoc($x);

                                        foreach($row as $key => $value)
                                        {
                                            echo '
                                            <div class="row mypt">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">'.$key.'</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <h6 class="mb-0 myn" style="font-size:18px;">'.$value.'</h6>
                                    </div>
                                </div>';
                                        }
                                      
                                    }
                                    ?>
                                    
                                    
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                    <?php 
                                    $q = "SELECT * FROM scholar_doc WHERE s_email='$_GET[s_email]'";
                                    $x = mysqli_query($conn,$q);
                                    $row2 = mysqli_fetch_assoc($x);
                                    
                                    
                                    
                                    
                                    ?>
                    
                        <div class="card card-user">
                            
                            <div class="image">
                                <img src="../<?php echo $row2["doc_verify"]; ?>" alt="DOC VERIFY"/>
                            </div>
                            <div class="image">
                                <img src="../<?php echo $row2["doc_photo"]; ?>" alt="DOC PHOTO"/>
                            </div>
                            <div class="image">
                                <img src="../<?php echo $row2["doc_marksheet"]; ?>" alt="DOC MARKSHEET"/>
                            </div>
                            <div class="image">
                                <img src="../<?php echo $row2["doc_income"]; ?>" alt="DOC INCOME"/>
                            </div>
                        </div>
                    </div>



                    

                </div>
                


                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <form method="post" action="action.php">
                            <input type="hidden" name="email" value="<?php echo $row['s_email']; ?>">
                            <input type="number" placeholder="Enter Amount" class="form-control" name="amount" required>
                            <br>
                            <input type="submit" name="approve" class="btn btn-success" value="APPROVE">
                        </form>
                    </div>
                    <div class="col-md-2"> <a href="action.php?reject=<?php echo $row['s_email']; ?>"><button class="btn btn-danger"> REJECT</button></a></div>
                    <div class="col-md-2"></div>
                    
                </div>
                    <hr>
                    


            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>
