<?php require_once('includes/sidebar-menu.php'); 



if(isset($_POST['chang_pw']))
{
	$re_pw=$_POST['re_pw'];
	$new_pw=$_POST['new_pw']; 
	$cur_pw=$_POST['cur_pw']; 
	
    $aaa=mysqli_fetch_array(mysqli_query($connect,"select count(*) as c from users where password='".$cur_pw."' and id='".$_SESSION['user_logged_id']."' "));
	
	if($aaa['c']==1) { 
	
		if($re_pw!=$new_pw)
		{
			$_SESSION['error_msg']="New password and Re-type password are not matched.";
		} else {
		
		
			
				$q="update users SET password='".$new_pw."' where id='".$_SESSION['user_logged_id']."' ";
				 
				if(mysqli_query($connect,$q))
				{
					$_SESSION['success_msg']="Password update successfully";
					unset($_POST);
				}
				else
				{
					$_SESSION['error_msg']="Error occured. Try Later.";
				}
				
			
		}
		
	} else {
					
					$_SESSION['error_msg']="Current password is wrong.";
		
	}
	
}


?>


					<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Change Password</h5></div>
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo $admin_url;?>">Dashboard</a></li>
						<li class="active"><span>Change Password</span></li>
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
                                                                               
<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i>Edit Data</h6>
												<hr class="light-grey-hr"/>
						                               
                                	<form action="" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
										
                                        <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Current Password*</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="password" name="cur_pw" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">New Password*</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="password" name="new_pw" required >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Re-type Password*</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="re_pw" class="form-control" required >
                                        </div>
                                    </div>
                                    
                                        <div class="form-group row">
                                        <div class="col-sm-9 offset-md-3">
                                             <button class="btn btn-success btn-icon left-icon mr-10 pull-left" name="chang_pw" type="submit"> <i class="fa fa-check"></i> <span>save</span></button>
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