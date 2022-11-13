<?php require_once('config/config.php'); 

function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}


if(isset($_POST['resetsubmit']))
{
	$reset_email=$_POST['email'];
	
		$qu="SELECT * from users where email = '".$reset_email."'";	
		
		$res=mysqli_query($connect,$qu);
		 
		if(mysqli_num_rows($res)>0)
		{
			$row=mysqli_fetch_assoc($res);
			
			$generated_pass=randomPassword();
			
			$to = $reset_email;
			
			$subject = 'Password Reseted';
			
			$headers = "From: Admin-Password-Reset\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			
			$message='New Password for user '.$row['fname'].'( '.$reset_email.' ) <br>';
			$message.='New Password :  <strong>'.$generated_pass.'</strong>';
			if(mail($to, $subject, $message, $headers))
			{
				$q="Update users set password='".$generated_pass."' where id=".$row['id'];
				$res=mysqli_query($connect,$q);
				
				$msg="New Pasword Sent to ".$reset_email;
				echo"<script>alert('".$msg."')</script>";
				
			}
				
		}
		else
		{
			echo"<script>alert('Invalid Email.')</script>";
		}

}

$q=mysqli_fetch_array(mysqli_query($connect,"select * from site_details"));
if($q['logo']=='') { $img=$admin_url.'assets/images/logo.png'; }
else { $img=$admin_url.'media/logo/'.$q['logo']; }

if($q['fav']=='') { $fav=$admin_url.'assets/images/favicon.png'; }
else { $fav=$admin_url.'media/logo/'.$q['fav']; }

if($q['title']=='') { $title=' Demo 19'; }
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
					                <h2>Welcome to <br> Demo19  Admin</h2>
					                <img src="<?php echo $admin_url; ?>dist/img/56y.png" alt="welcome">
					            </div>
					        </div>
					    </div>
					    <div class="col-md-6 equal-height">
					        <div class="md-mid">
                            
                            <form method="post">
					                <h2>Forgot password</h2>
    					            <p>Enter your email idto gets a new password.</p>
    								<div class="form-group">
    									<label class="control-label mb-10" for="exampleInputEmail_2">Email</label>
    									<input type="email" class="form-control" required name="email" placeholder="Email Address">
    								</div>
    								<div class="row">
    								    <div class="col-md-12 col-xs-12 form-group">
    								        <p><a href="<?php echo $admin_url; ?>login">Want to login?</a></p>
    								    </div>
    								</div>
    								<div class="form-group">
    									<button type="submit" class="btn btn-info btn-rounded" name="resetsubmit">Send</button>
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