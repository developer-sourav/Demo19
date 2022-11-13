<?php require_once('config/config.php'); 

if(isset($_POST['resetsubmit']))
{
	$re_pw=$_POST['re_pw'];
	$new_pw=$_POST['new_pw']; 
	$cur_pw=$_POST['cur_pw']; 
	
    $aaa=mysqli_fetch_array(mysqli_query($connect,"select count(*) as c from users where password='".$cur_pw."' "));
	
	if($aaa['c']==1) { 
	
		if($re_pw!=$new_pw)
		{
			$_SESSION['error_msg']="New password and Re-type password are not matched.";
		} else {
		
		
			
				$q="update users SET password='".$new_pw."' where password='".$cur_pw."' ";
				 
				if(mysqli_query($connect,$q))
				{
					$_SESSION['success_msg']="Password update successfully";
					echo"<script>alert('Password update successfully')</script>";
				}
				else
				{
					$_SESSION['error_msg']="Error occured. Try Later.";
					echo"<script>alert('Error occured. Try Later.')</script>";
				}
				
			
		}
		
	} else {
					
					echo"<script>alert('Current password is wrong.')</script>";
		
	}
				
				
				


}

$q=mysqli_fetch_array(mysqli_query($connect,"select * from site_details"));
if($q['logo']=='') { $img=$admin_url.'assets/images/logo.png'; }
else { $img=$admin_url.'media/logo/'.$q['logo']; }

if($q['fav']=='') { $fav=$admin_url.'assets/images/favicon.png'; }
else { $fav=$admin_url.'media/logo/'.$q['fav']; }

if($q['title']=='') { $title=' Demo19'; }
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


<div class="wrapper pa-0">
			<header class="sp-header">
				<div class="sp-logo-wrap pull-left">
					<a href="<?php echo $admin_url; ?>">
						<img class="brand-img mr-10" src="<?php echo $img; ?>" alt="brand"/>
					</a>
				</div>
				<div class="form-group mb-0 pull-right">
					<span class="inline-block pr-10">Want to login?</span>
					<a class="inline-block btn btn-info btn-rounded btn-outline" href="<?php echo $admin_url; ?>login">Click here</a>
				</div>
				<div class="clearfix"></div>
			</header>
			
			<!-- Main Content -->
			<div class="page-wrapper pa-0 ma-0 auth-page"  style="height:100%;">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle auth-form-wrap">
							<div class="auth-form  ml-auto mr-auto no-float">
								<div class="row">
									<div class="col-sm-12 col-xs-12">
										<div class="mb-30">
											<h3 class="text-center txt-dark mb-10">Change password?</h3>
										</div>	
										<div class="form-wrap">
											<form method="post">
												
                                                <div class="form-group">
                                                    <label class="control-label mb-10">Current Password*</label>
                                                        <input class="form-control" type="password" name="cur_pw" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10">New Password*</label>
                                                        <input class="form-control" type="password" name="new_pw" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10">Re-type Password*</label>
                                                        <input class="form-control" type="password" name="re_pw" required>
                                                </div>
                                                
												
												<div class="form-group text-center">
													<button type="submit" class="btn btn-info btn-rounded" name="resetsubmit">Send</button>
												</div>
											</form>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->	
				</div>
				
			</div>
			<!-- /Main Content -->
		
		</div>
        
        
        
        




		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.6/jquery.slimscroll.min.js"></script>
		<script src="<?php echo $admin_url; ?>dist/js/init.js"></script>

	</body>

</html>