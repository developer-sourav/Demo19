<?php require_once('config/config.php'); 

if(isset($_POST['loginsubmit']))
{
	if($_POST['username']!='' && $_POST['password']!='')
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		
		$qu="SELECT * from users where username = '".$username."' and password = '".$password."' and user_level>0 and status=1 ";
		
		$res=mysqli_query($connect,$qu);
			
		if(mysqli_num_rows($res)>0)
		{
			$_SESSION['user_logged']="yes";
			
			
			$row=mysqli_fetch_assoc($res);
			
			$_SESSION['fname']=$row['fname'];
			$_SESSION['user_level']=$row['user_level'];
			$_SESSION['user_logged_id']=$row['id'];
			
			if($_SESSION['user_level']==1)
			{
				header("LOCATION:".$admin_url."site-details");
			} else {
				header("LOCATION:".$admin_url."site-details");
			}
		}
		else
		{
			
			echo"<script>alert('Invalid Login.')</script>";
		}
	}
	else
	{
		echo"<script>alert('Invalid Login.')</script>";
	}
}



$q=mysqli_fetch_array(mysqli_query($connect,"select * from site_details"));
if($q['logo']=='') { $img=$admin_url.'assets/images/logo.png'; }
else { $img=$admin_url.'media/logo/'.$q['logo']; }

if($q['fav']=='') { $fav=$admin_url.'assets/images/favicon.png'; }
else { $fav=$admin_url.'media/logo/'.$q['fav']; }

if($q['title']=='') { $title=' Demo19 Technologies'; }
else { $title=$q['title']; }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Demo19 Dashboard</title>

        <link rel="shortcut icon" type="image/png" href="<?php echo $fav; ?>">

		<link href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo $admin_url; ?>dist/css/style.css" rel="stylesheet" type="text/css">
        
</head>

        <div class="wrapper pa-0" id="login">
			<!-- Main Content -->
			<div class="page-wrapper pa-0 ma-0 auth-page login-page" style="height:100%;">
				<div class="container">
					<div class="row">
					    <div class="col-md-6 equal-height">
					        <div class="bg-part">
					            <div class="inner">
					                <h2>Welcome to <br> Demo19 Admin</h2>
					                <img src="dist/img/56y.png" alt="welcome">
					            </div>
					        </div>
					    </div>
					    <div class="col-md-6 equal-height">
					        <div class="md-mid">
					            
					            <form method="post">
					                <h2>Login</h2>
    					            <p>Welcome to Demo19  Admin</p>
    								<div class="form-group">
    									<label class="control-label mb-10" for="exampleInputEmail_2">Username</label>
    									<input type="text" class="form-control" required name="username" placeholder="Username">
    								</div>
    								<div class="form-group">
    									<label class="pull-left control-label mb-10" for="exampleInputpwd_2">Password</label>
    									<input type="password" class="form-control" required name="password" placeholder="Enter pwd">
    								</div>
    								<div class="row">
    								    <div class="col-md-6 col-xs-6 form-group">
    								        <div class="checkbox checkbox-primary pr-10 pull-left">
        										<input id="checkbox_2"  type="checkbox">
        										<label for="checkbox_2"> Keep me logged in</label>
        									</div>
    								    </div>
    								    <div class="col-md-6 col-xs-6 form-group">
    								        <p><a href="<?php echo $admin_url; ?>forgot-password">Forgot password?</a></p>
    								    </div>
    								</div>
    								<div class="form-group">
    									<button type="submit" class="btn btn-info btn-rounded" name="loginsubmit">Log in</button>
    								</div>
							    </form>
					        </div>
					    </div>
					</div>	
				</div>
			</div>
		</div>



		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.6/jquery.slimscroll.min.js"></script>
		<script src="<?php echo $admin_url; ?>dist/js/init.js"></script>

	</body>

</html>