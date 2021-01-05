<?php

session_start();
if(isset($_SESSION['admin'])){
           header('Location: dashboard.php');
      }
?>
<?php    
        
        require_once('conn.php');
        if(isset($_POST['adminlogin'])){
                if(empty($_POST['username']) || empty($_POST['password']) ){
                        $msg= "<h4 style='color:red;'> Please Fill All Fields..... </h4>";
                }
         $user = $_POST['username'];
         $password = $_POST['password'];
         $sql_query="SELECT * FROM `admin_login` WHERE `username`='".$user."'";
         $result=mysqli_query($conn,$sql_query);
         $numrow = mysqli_num_rows($result);
	if($numrow!=0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
			$db_username = $row['username'];
			$db_password = $row['password'];
		}
		$enc_password = md5($password);
		if($user==$db_username&&$enc_password==$db_password)
		{
			session_start();
			$_SESSION['admin']=$db_username;
			header("location: dashboard.php");
		}
		else
		{
			$msg= "<h4 style='color:red;'>Wrong Password..... </h4>";
		}
	}
	else
	{
		$msg= "<h4 style='color:red;'>Username Incorrect..............</h4>";
	}
                 }else{
                 $msg= "";
                 }
?>
<!DOCTYPE html>   
<html>
<head>
	<title>Admin Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

	<!--Custom styles-->
</head>
<style>
blink {
  -webkit-animation: 1s linear infinite condemned_blink_effect; /* for Safari 4.0 - 8.0 */
  animation: 1s linear infinite condemned_blink_effect;
}

/* for Safari 4.0 - 8.0 */
@-webkit-keyframes condemned_blink_effect { 
  0% {
    visibility: hidden;
  }
  50% {
    visibility: hidden;
  }
  100% {
    visibility: visible;
  }
}

@keyframes condemned_blink_effect {
  0% {
    visibility: hidden;
  }
  50% {
    visibility: hidden;
  }
  100% {
    visibility: visible;
  }
}
/* Made with love by Mutiullah Samim*/

@import url('https://fonts.googleapis.com/css?family=Numans');

html,body{
background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');
background-size: cover;
background-repeat: no-repeat;
height: 100%;
font-family: 'Numans', sans-serif;
}

.container{
height: 100%;
align-content: center;
}

.card{
height: 370px;
margin-top: auto;
margin-bottom: auto;
width: 400px;
background-color: rgba(0,0,0,0.5) !important;
}

.social_icon span{
font-size: 60px;
margin-left: 10px;
color: #FFC312;
}

.social_icon span:hover{
color: white;
cursor: pointer;
}

.card-header h3{
color: white;
}

.social_icon{
position: absolute;
right: 20px;
top: -45px;
}

.input-group-prepend span{
width: 50px;
background-color: #FFC312;
color: black;
border:0 !important;
}

input:focus{
outline: 0 0 0 0  !important;
box-shadow: 0 0 0 0 !important;

}

.remember{
color: white;
}

.remember input
{
width: 20px;
height: 20px;
margin-left: 15px;
margin-right: 5px;
}

.login_btn{
color: black;
background-color: #FFC312;
width: 100px;
}

.login_btn:hover{
color: black;
background-color: white;
}

.links{
color: white;
}

.links a{
margin-left: 4px;
}
</style>
<body>
    
    
    
    
    
    
    
    
    
    
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3><i class="fa fa-user-plus" aria-hidden="true"></i>      Admin Login</h3>
			</div>
			<div class="card-body">
				<form method="POST" action="">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="username" placeholder="username" required>
						
					</div>
					<br/>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="password" placeholder="password" required>
					</div>
					<br/><blink><?php echo @$msg; ?></blink>
					<div class="form-group">
						<input type="submit" value="Login" name="adminlogin" class="btn float-right login_btn">
					</div>
				</form>
				
			</div>
			<div class="card-footer">
			</div>
			
		</div>
	</div>
</div>
</body>
</html>