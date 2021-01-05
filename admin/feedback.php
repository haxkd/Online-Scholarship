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

	<title>Light Bootstrap Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <?php require_once "css.php"; ?>

    
</head>
<body>

<div class="wrapper">
    <?php require_once "side.php";?>

    <div class="main-panel">
        
    <?php require_once "navtop.php";?>

    
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center text-danger">Feedback table</h4>
                                
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped ">
                                    <thead>
                                        <th>ID</th>
                                        <th>Email</th>
                                        <th>Feedback</th>
                                    </thead>
                                    <tbody>

                                        <?php
                                        require_once "conn_mongo.php";
                                        $filter = [];
                                        $option = [];
                                        $read = new MongoDB\Driver\Query($filter, $option);
                                        $all_users = $manager->executeQuery("$database", $read);
                                        foreach ($all_users as $user) {
                                            echo "<tr>
                                            <td>$user->id</td><td> $user->email</td><td> $user->feed  
                                            </td>
                                            </tr>";
                                            
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>


                    


                </div>
            </div>
        </div>

      


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
