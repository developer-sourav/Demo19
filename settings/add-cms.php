<?php require_once('includes/sidebar-menu.php'); 
if(isset($_POST['add-submit']))
{
	$title=$_POST['title'];
	$subtitle=$_POST['subtitle'];
	$parent=$_POST['parent'];
	$body=$_POST['body'];
	$seo=strtolower(str_replace(' ','-',$_POST['title']));
	$banner=$_FILES['banner']['name'];
	$img=$_FILES['img']['name'];
	$metakey=$_POST['metakey'];
	$metatag=$_POST['metatag'];
			
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
				move_uploaded_file($_FILES["img"]["tmp_name"],"media/cms/".$img_name);
			}	

			$array = explode('.', $banner);
			if(end($array)=='')
			{
				$banner_name = '';
			}
			else
			{
				$banner_name = time().'b.'.end($array);
			}
	
			if($banner!='')
			{
				move_uploaded_file($_FILES["banner"]["tmp_name"],"media/cms/".$banner_name);
			}
						
			$q="Insert into cms SET seo='".$seo."',metakey='".$metakey."',metatag='".$metatag."', title='".$title."',subtitle='".$subtitle."', body='".$body."',parent='".$parent."', img='".$img_name."', banner='".$banner_name."',status=1 ";
			 
			if(mysqli_query($connect,$q))
			{
				$_SESSION['success_msg']="Page added successfully";
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
					  <h5 class="txt-dark">CMS Page</h5>
                     </div>
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo $admin_url;?>">Dashboard</a></li>
                        <li><a href="<?php echo $admin_url;?>cms">CMS</a></li>
						<li class="active"><span>Add CMS</span></li>
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
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title" class="form-control" id="inputEmail3" required  placeholder="Title">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Subtitle</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="subtitle" class="form-control" placeholder="Subtitle">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Meta Key for Seo</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="metakey" class="form-control"  placeholder="Meta Key">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Meta Tag for Seo</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="metatag" class="form-control"  placeholder="Meta Tag">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="img" class="form-control" id="inputPass word3" placeholder="Chose Image">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Banner Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="banner" class="form-control" id="inputPass word3" placeholder="Chose Image">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="inputPassword3"  class="col-sm-2 col-form-label">Parrnet CMS Page</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="parent" id="inputPass word3" >
											<option value="">--SELECT Parrent Page--</option>
											<?php $cms=mysqli_query($connect,"SELECT * FROM cms where status=1");
											while($c=mysqli_fetch_array($cms))
											{
											?>
											<option value="<?php echo $c['id']; ?>"><?php echo $c['title']; ?></option>
											<?php } ?>
											</select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Body</label>
                                        <div class="col-sm-10">
                                           <textarea id="summernote" name="body"></textarea>
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