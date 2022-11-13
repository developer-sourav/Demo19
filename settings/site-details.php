<?php require_once('includes/sidebar-menu.php');

if(isset($_POST['add-submit']))
{
	$title=$_POST['title'];
	$tagline=$_POST['tagline'];
	$email=$_POST['email'];
	$email_footer=$_POST['email_footer'];
	$phone=$_POST['phone'];
	$app=$_POST['app'];
	$sms_key=$_POST['sms_key'];
	$sms_sender=$_POST['sms_sender'];
	$fb=$_POST['fb'];
	$tw=$_POST['tw'];
	$yt=$_POST['yt'];
	$insta=$_POST['insta'];
	$wa=$_POST['wa'];
	$oth=$_POST['oth'];
	$address=$_POST['address'];
	$about=$_POST['about'];
	$api_key=$_POST['api_key'];
	$secret_key=$_POST['secret_key'];
	$google_analytics=$_POST['google_analytics'];
	$facebook_pixal=$_POST['facebook_pixal'];
	$live_chat=$_POST['live_chat'];
	$other_link=$_POST['other_link'];
   	 
	$logo=$_FILES['logo']['name'];
	$fav=$_FILES['fav']['name'];

	$c=mysqli_fetch_assoc(mysqli_query($connect,"Select * from site_details "));

	
	$array = explode('.', $logo);
	if(end($array)!='')
	{
		$img_name = time().'l.'.end($array);
		
		unlink('media/logo/'.$c['logo']); 
		mysqli_query($connect,"Update `site_details` SET logo='".$img_name."' where `id`=1 ");
		move_uploaded_file($_FILES["logo"]["tmp_name"],"media/logo/".$img_name);
						
	}
	
	$array1 = explode('.', $fav);
	if(end($array1)!='')
	{
		$img_name = time().'f.'.end($array1);
		
		unlink('media/logo/'.$c['fav']); 
		mysqli_query($connect,"Update `site_details` SET fav='".$img_name."' where `id`=1 ");
		move_uploaded_file($_FILES["fav"]["tmp_name"],"media/logo/".$img_name);
						
	}
	

	
	if($c['id']>0) {
			
			$q="Update site_details set title='".$title."', tagline='".$tagline."',address='".$address."',about='".$about."', email='".$email."', email_footer='".$email_footer."',phone='".$phone."',app='".$app."',sms_key='".$sms_key."',sms_sender='".$sms_sender."',fb='".$fb."',tw='".$tw."',yt='".$yt."',insta='".$insta."',wa='".$wa."',oth='".$oth."',api_key='".$api_key."',secret_key='".$secret_key."',google_analytics='".$google_analytics."',facebook_pixal='".$facebook_pixal."',live_chat='".$live_chat."',other_link='".$other_link."' where `id`=1 ";
			mysqli_query($connect,$q);

				
			$_SESSION['success_msg']="Updated successfully";
			unset($_POST);
				
	} else {
			$q1="insert into site_details set title='".$title."', tagline='".$tagline."', address='".$address."',about='".$about."',email='".$email."', email_footer='".$email_footer."',phone='".$phone."',app='".$app."',sms_key='".$sms_key."',sms_sender='".$sms_sender."',fb='".$fb."',tw='".$tw."',yt='".$yt."',insta='".$insta."',wa='".$wa."',oth='".$oth."',api_key='".$api_key."',secret_key='".$secret_key."',google_analytics='".$google_analytics."',facebook_pixal='".$facebook_pixal."',live_chat='".$live_chat."',other_link='".$other_link."' ";
			mysqli_query($connect,$q1);

				
			$_SESSION['success_msg']="Insert successfully";
			unset($_POST);
	}
	
			
}

?>



					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						  <h5 class="txt-dark">Site Details</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						  <ol class="breadcrumb">
							<li><a href="<?php echo $admin_url; ?>">Dashboard</a></li>
							<li class="active"><span>Site Details</span></li>
						  </ol>
						</div>
						<!-- /Breadcrumb -->
					</div>

					

					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
                                        
                    <?php
					if(isset($_SESSION['error_msg']))
					{
					?>
                        <div role="alert" class="alert alert-danger">
                            <?php echo $_SESSION['error_msg']; ?>
                        </div>                
                    <?php
						unset($_SESSION['error_msg']);
					}
					?> 
                    
                	<?php
					if(isset($_SESSION['success_msg']))
					{
					?>
                        <div role="alert" class="alert alert-success">
                            <?php echo $_SESSION['success_msg']; ?>
                        </div>                
                    <?php
						unset($_SESSION['success_msg']);
					}
					?>                                                 
                                

                               
						<?php 
						$aa="Select * from site_details where `id`=1 ";
						$bb=mysqli_query($connect,$aa);
						$row=mysqli_fetch_assoc($bb); ?> 
                        
                        
											<form method="post" enctype="multipart/form-data">
												<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i>about website</h6>
												<hr class="light-grey-hr"/>
                                                
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Site Title</label>
															<input type="text" name="title" value="<?php echo $row['title']; ?>" required class="form-control" >
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Tagline</label>
															<input type="text" name="tagline" value="<?php echo $row['tagline']; ?>" class="form-control">
														</div>
													</div>
													
												</div>
												
                                                <div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Email Id</label>
															<input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control" >
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Email(Other)</label>
															<input type="email" name="email_footer" value="<?php echo $row['email_footer']; ?>" class="form-control">
														</div>
													</div>
													
												</div>
                                                
                                                <div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Phone Number</label>
															<input type="text" name="phone" value="<?php echo $row['phone']; ?>" class="form-control" >
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Phone Number(Other)</label>
															<input type="text" name="oth" value="<?php echo $row['oth']; ?>" class="form-control">
														</div>
													</div>
													
												</div>
                                                
                                                <div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label mb-10">Address</label>
															<input type="text" name="address" value="<?php echo $row['address']; ?>" class="form-control" >
														</div>
													</div>
													
												</div>
                                               
												<div class="seprator-block"></div>
												<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-comment-text mr-10"></i>About</h6>
												<hr class="light-grey-hr"/>
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<textarea class="form-control" rows="4" name="about"><?php echo $row['about']; ?></textarea>
														</div>
													</div>
												</div>
                                                
                                                
												
												
                                                
                                                
												<div class="seprator-block"></div>
												<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-calendar-note mr-10"></i>general info</h6>
												<hr class="light-grey-hr"/>
												
                                                <div class="row">
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">SMS Key</label>
															<input type="text" name="sms_key" value="<?php echo $row['sms_key']; ?>" class="form-control">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">SMS Sender</label>
															<input type="text" name="sms_sender" value="<?php echo $row['sms_sender']; ?>" class="form-control" >
														</div>
													</div>
												</div>
                                                
                                                
                                                <div class="row">
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Payment API Key</label>
															<input type="text" name="api_key" value="<?php echo $row['api_key']; ?>" class="form-control">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Payment Secret Key</label>
															<input type="text" name="secret_key" value="<?php echo $row['secret_key']; ?>" class="form-control" >
														</div>
													</div>
												</div>
                                                
                                                <div class="row">
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">App Link</label>
															<input type="text" name="app" value="<?php echo $row['app']; ?>" class="form-control" >
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">FB Link</label>
															<input type="text" name="fb" value="<?php echo $row['fb']; ?>" class="form-control">
														</div>
													</div>
													
												</div>
                                                
                                                <div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Twitter Link</label>
															<input type="text" name="tw" value="<?php echo $row['tw']; ?>" class="form-control" >
														</div>
													</div>
													
													<!--<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Youtube Link</label>
															<input type="text" name="yt" value="<?php echo $row['yt']; ?>" class="form-control">
														</div>
													</div>-->
													
												</div>
                                                
                                                 <div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Google+ Link</label>
															<input type="text" name="insta" value="<?php echo $row['insta']; ?>" class="form-control" >
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Whatsapp Link</label>
															<input type="text" name="wa" value="<?php echo $row['wa']; ?>" class="form-control">
														</div>
													</div>
													
												</div>
                                                
                                                
                                                 <div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Google Analytics</label>
															<input type="text" name="google_analytics" value="<?php echo $row['google_analytics']; ?>" class="form-control" >
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Facebok Pixal</label>
															<input type="text" name="facebook_pixal" value="<?php echo $row['facebook_pixal']; ?>" class="form-control">
														</div>
													</div>
													
												</div>
                                                
                                                 <div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Live Chat</label>
															<input type="text" name="live_chat" value="<?php echo $row['live_chat']; ?>" class="form-control" >
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Others</label>
															<input type="text" name="other_link" value="<?php echo $row['other_link']; ?>" class="form-control">
														</div>
													</div>
													
												</div>
                                                
												
                                                
                                                <div class="seprator-block"></div>
												<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-collection-image mr-10"></i>upload image</h6>
												<hr class="light-grey-hr"/>
												<div class="row">
													<div class="col-lg-6">
														<div class="img-upload-wrap">
                                                            <?php if($row['logo']!='') { ?><img src="<?php echo  $admin_url.'media/logo/'.$row['logo'];?>" width="130"><?php } ?>
														</div>
														<div class="fileupload btn btn-info btn-anim"><i class="fa fa-upload"></i><span class="btn-text">Upload Logo</span>
															<input type="file" class="upload" name="logo">
														</div>
													</div>
                                                    
                                                    <div class="col-lg-6">
														<div class="img-upload-wrap">
															 <?php if($row['fav']!='') { ?><img src="<?php echo  $admin_url.'media/logo/'.$row['fav'];?>" width="30"><?php } ?>
														</div>
														<div class="fileupload btn btn-info btn-anim"><i class="fa fa-upload"></i><span class="btn-text">Upload Fav Icon</span>
															<input type="file" class="upload" name="fav">
														</div>
													</div>
                                                    
                                                    
												</div>
                                                
                                                
                                                <div class="seprator-block"></div>
												<div class="form-actions">
													<button class="btn btn-success btn-icon left-icon mr-10 pull-left" name="add-submit" type="submit"> <i class="fa fa-check"></i> <span>save</span></button>
													<div class="clearfix"></div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
            
                        

<?php 
	require_once('includes/frontend_block.php');
?>