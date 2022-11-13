<?php require_once('includes/sidebar-menu.php');
if(isset($_POST['add-submit']))
{
	$fname=$_POST['fname'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$password=$_POST['password'];
	$username=$_POST['username'];
	$address=$_POST['address'];
	$city=$_POST['city'];
	$state=$_POST['state'];
	$pin=$_POST['pin'];	
			$q="Insert Into users set fname='".$fname."', email='".$email."', phone='".$phone."', password='".$password."', username='".$username."', address='".$address."', city='".$city."', state='".$state."', pin='".$pin."', img='".$img."',img1='".$img1."',img2='".$img2."',user_level=2,status=1";
			 
			if(mysqli_query($connect,$q))
			{
				$_SESSION['success_msg']="Sub Admin added successfully";
				unset($_POST);
			}
			else
			{
				$_SESSION['error_msg']="Error occured. Try Later.";
			}

}


?>





					<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Sub-Admin</h5></div>
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo $admin_url;?>">Dashboard</a></li>
                        <li><a href="<?php echo $admin_url;?>subadmin">Sub-Admin</a></li>
						<li class="active"><span>Add Sub-Admin</span></li>
                       </ol>
					</div>
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
<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i>Add Data</h6>
												<hr class="light-grey-hr"/>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Name*</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="fname" class="form-control" id="inputEmail3" required  placeholder="Name">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Username*</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="username" class="form-control" id="inputEmail3" required  placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password*</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="password" class="form-control" id="inputPass word3" required placeholder=" Password">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Email*</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="email" class="form-control" id="inputPass word3" required placeholder="Email">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="phone" class="form-control" id="inputEmail3"  placeholder="phone">
                                        </div>
                                    </div>
									
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
                                        
                                           <div class="col-sm-10">
                                            <textarea name="address" class="form-control" id="inputEmail3"  placeholder="Full Address"></textarea>
                                        
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">City</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="city" class="form-control" id="inputEmail3"   placeholder="City">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">State</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="state" class="form-control" id="inputEmail3" placeholder="state">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Pincode</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="pin" class="form-control" id="inputEmail3"  placeholder="Pin">
                                        </div>
                                    </div>
                                    
									
                                    <div class="form-group row">
                                        <div class="col-sm-10 offset-md-2">
                                            <button class="btn btn-success btn-icon left-icon mr-10 pull-left" name="add-submit" type="submit"> <i class="fa fa-check"></i> <span>save</span></button>
                                        </div>
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