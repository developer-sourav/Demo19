<?php 
include 'header.php';
if(isset($_POST['contact_submit']))
{
		$name=$_POST['name'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$subject=$_POST['subject'];
		$message=$_POST['message'];
		
			 $q="insert into contact SET name='".$name."', subject='".$subject."', email='".$email."', message='".$message."', phone='".$phone."', enq_date='".date('d-m-Y')."' ";
			if(mysqli_query($connect,$q))
			{
				
						
			$to=$siteDetails['email'];
			$message = '
			<html>
			<head>
			<title>Contact Us</title>
			</head>
			<body>
			<p>Hi! Admin, a user is trying to contact you. <br><br> User details: </p>
			<table>
			<tr>
			<td>Name:</td>
			<td>'.$name.'</td>
			</tr>
			<tr>
			<td>Phone:</td>
			<td>'.$phone.'</td>
			</tr>
			<tr>
			<td>Email:</td>
			<td>'.$email.'</td>
			</tr>
			<tr>
			<td>Subject:</td>
			<td>'.$subject.'</td>
			</tr>
			<tr>
			<td>Message:</td>
			<td>'.$message.'</td>
			</tr>
			
			</table>
			</body>
			</html>
			';
			
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			
			$headers .= 'From: <'.$email.'>' . "\r\n";
			
			if(mail($to,$subject,$message,$headers))
			{						 
			echo "<script> alert('Thank You . We Will Contact Soon.');</script>";			
			}
			}
		else {
		echo "<script> alert('Error occured . Try Again Later');</script>";
	         }
	echo '<script language="javascript">location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
}
?>

  <section id="map">
	<iframe src="https://maps.google.com/maps?q=<?php echo $siteDetails['address'];?>&amp;output=embed" width="100%" height="350"></iframe>
  </section>
  
<section id="main_content" >
<div class="container">
<div class="row">
	<div class="col-md-4">
		<h3>Address</h3>
		<ul id="contact-info">
			<li><i class="icon-home"></i> <?php echo $siteDetails['address'] ;?></li>
			<li><i class="icon-phone"></i><?php echo $siteDetails['phone'] ;?></li>
			<li><i class=" icon-email"></i> <a href="#"><?php echo $siteDetails['email'] ;?></a></li>
		</ul>
		<hr>
		<h3>Follow us</h3>
		<!--<p>
			Cu affert populo neglegentur has, labore nostrum periculis ius in, singulis electram ad vel labore.
		</p>-->
		<ul id="follow_us_contacts">
			<li><a href="<?php echo $siteDetails['fb'] ;?>"><i class="icon-facebook"></i><?php echo $siteDetails['fb'] ;?></li>
			<li><a href="<?php echo $siteDetails['tw'] ;?>"><i class="icon-twitter"></i><?php echo $siteDetails['tw'] ;?></a></li>
			<li><a href="<?php echo $siteDetails['insta'] ;?>"><i class=" icon-google"></i><?php echo $siteDetails['insta'] ;?></a></li>
		</ul>
	</div>
	<div class="col-md-8">
		<div class=" box_style_2">
			<span class="tape"></span>
			<div class="row">
				<div class="col-md-12">
					<h3 class="text-white">General Enquire</h3>
				</div>
			</div>
			<div id="message-contact"></div>
			<form method="post" action="">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<input type="text" name="name" class="form-control style_2" placeholder="Enter Name">
                            <span class="input-icon"><i class="icon-user"></i></span>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<input type="text" name="subject" class="form-control style_2" placeholder="Subject">
                            <span class="input-icon"><i class="icon-user"></i></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<input type="email" name="email" class="form-control style_2" placeholder="Enter Email">
                            <span class="input-icon"><i class="icon-email"></i></span>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<input type="text" name="phone" class="form-control style_2" placeholder="Enter Phone number">
                            <span class="input-icon"><i class="icon-phone"></i></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<textarea rows="5" class="form-control" name="message" placeholder="Write your message" style="height:200px;"></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<input type="submit" value="Submit"  name="contact_submit" class=" button_medium" />
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
</section>

<section class="upperfooter">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="icon">
					<i class="icon-graduation-cap" aria-hidden="true"></i> 
				</div>
				<h3>What are you waiting for ?</h3>
				<p>Let us build your career</p>
			</div>
			<div class="col-md-3">
				<a href="" class="btn btn-default btn-block">Enquire Now</a>
			</div>
		</div>
	</div>
</section>

<?php include 'footer.php';?>