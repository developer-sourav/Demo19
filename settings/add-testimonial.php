<?php require_once('includes/sidebar-menu.php'); 
if(isset($_POST['add-submit']))
{
	$title=$_POST['title'];
	$body=$_POST['body'];
	$designation=$_POST['designation'];
	$seo=strtolower(str_replace(' ','-',$_POST['title']));
	$img=$_FILES['img']['name'];
			
			$array = explode('.', $img);
			if(end($array)=='')
			{
				$img_name = '';
			}
			else
			{
				$img_name = time().'.'.end($array);
			}
	
			if($img!='')
			{
				move_uploaded_file($_FILES["img"]["tmp_name"],"media/testimonial/".$img_name);
			}				 
          $q="Insert into testimonials SET seo='".$seo."',title='".$title."',body='".$body."',designation='".$designation."',img='".$img_name."',status=1 ";
			if(mysqli_query($connect,$q))
			{
				$_SESSION['success_msg']="Testimonial added successfully";
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
					  <h5 class="txt-dark">Testimonials</h5></div>
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo $admin_url;?>">Dashboard</a></li>
                        <li><a href="<?php echo $admin_url;?>testimonial">Testimonials</a></li>
						<li class="active"><span>Add Testimonial</span></li>
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
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="title" class="form-control" id="inputEmail3" required  placeholder="Title">
                                        </div>
                                    </div>
                                   <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Designation</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="designation" class="form-control" id="inputEmail3" required  placeholder="Designation">
                                        </div>
                                   </div>
									
									<div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label">Image</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="img" class="form-control" id="inputPass word3" Required placeholder="Chose Image">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label">Speech</label>
                                        <div class="col-sm-9">
                                           <textarea id="summernote" name="body"></textarea>
                                        </div>
                                    </div>
                                    
                               
                                    <div class="form-group row">
                                        <div class="col-sm-9 offset-md-3">
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