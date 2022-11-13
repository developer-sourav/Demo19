<?php require_once('includes/sidebar-menu.php');


$id=$_REQUEST['cms_id'];

if(isset($_POST['add-submit']))
{ 
	$title=$_POST['title'];
	$subtitle=$_POST['subtitle'];
	$parent=$_POST['parent'];
	$body=$_POST['body'];
	$metakey=$_POST['metakey'];
	$metatag=$_POST['metatag'];
	
           $banner=$_FILES['banner']['name'];
		   
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
				$a="select * from cms where id=".$id;
				$b=mysqli_query($connect,$a);
				$q=mysqli_fetch_assoc($b);
				unlink('media/cms/'.$q['img']);

				$u="Update `cms` SET img='".$img_name."' where id=".$id;
				mysqli_query($connect,$u);
						 
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
				$aa="select * from cms where id=".$id;
				$bb=mysqli_query($connect,$aa);
				$qu=mysqli_fetch_assoc($bb);
				unlink('media/cms/'.$qu['banner']);

				$u="Update `cms` SET banner='".$banner_name."' where id=".$id;
				mysqli_query($connect,$u);
						 
				move_uploaded_file($_FILES["banner"]["tmp_name"],"media/cms/".$banner_name);
			}
		
		 $q="Update cms set  title='".$title."',metakey='".$metakey."',metatag='".$metatag."',subtitle='".$subtitle."',parent='".$parent."', body='".$body."' where id=".$id;
			if(mysqli_query($connect,$q))
			{
				$_SESSION['success_msg']="Page updated successfully";
				unset($_POST);
			}
			else
			{
				$_SESSION['error_msg']="Error occured. Try Later.";
			}
}
if($_REQUEST['action']=='banner')
{
	$qds="update cms set banner='' where id=".$id;
	
	if(mysqli_query($connect,$qds))
	{
		echo "<script> alert('CMS Removed Successfully');</script>";
	}
	else
	{
		echo "<script> alert('Error Occured');</script>";
	}
	echo '<script language="javascript">location.href="'.$admin_url.'edit-cms?cms_id='.$id.'"</script>';
}
if($_REQUEST['action']=='image')
{
	$qds="update cms set img='' where id=".$id;
	
	if(mysqli_query($connect,$qds))
	{
		echo "<script> alert('Image Removed Successfully');</script>";
	}
	else
	{
		echo "<script> alert('Error Occured');</script>";
	}
echo '<script language="javascript">location.href="'.$admin_url.'edit-cms?cms_id='.$id.'"</script>';
}
?>




<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">CMS Page</h5></div>
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo $admin_url;?>">Dashboard</a></li>
                        <li><a href="<?php echo $admin_url;?>cms">CMS</a></li>
						<li class="active"><span>Edit CMS</span></li>
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
					if(isset($_SESSION['remove']))
					{
					?>
                        <div role="alert" class="alert alert-danger">
                            <?php echo $_SESSION['remove']; ?>
                        </div>                
                    <?php
						unset($_SESSION['remove']);
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
						$r="select * from cms where id=".$id;
						$qr=mysqli_query($connect,$r);
						$row=mysqli_fetch_assoc($qr);
				      ?>
<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i>Edit Data</h6>
												<hr class="light-grey-hr"/>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title" value="<?php echo $row['title']; ?>" required class="form-control" id="inputEmail3" placeholder="Title">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Subtitle</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="subtitle" value="<?php echo $row['subtitle']; ?>" class="form-control" id="inputPass word3" placeholder=" IF Needed">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Meta Key for Seo</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="metakey" value="<?php echo $row['metakey']; ?>" class="form-control"  placeholder="Meta Key">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Meta Tag for Seo</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="metatag" value="<?php echo $row['metatag']; ?>" class="form-control"  placeholder="Meta Tag">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="img" value="<?php echo $row['img']; ?>" class="form-control" id="inputPass word3" placeholder="Chose Image">
                                       <?php if($row['img']!='') { ?>
									   <img src="<?php echo $admin_url.'media/cms/'. $row['img']; ?>" height="70"><a href="edit-cms?action=image&cms_id=<?php echo $id; ?>"><i class="fa remove_cross" style="margin-left:75px">&#xf00d;</i></a>
									   <?php } ?>
										</div>
                                    </div>
									<div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Banner</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="banner" value="<?php echo $row['banner']; ?>" class="form-control" id="inputPass word3" placeholder="Chose Image">
                                        <?php if($row['banner']!='') { ?>
										<img src="<?php echo $admin_url.'media/cms/'. $row['banner']; ?>" height="70"><a href="edit-cms?action=banner&cms_id=<?php echo $id; ?>"><i class="fa remove_cross" style="margin-left:75px">&#xf00d;</i></a>
										<?php } ?>
										</div>
                                    </div>
									<div class="form-group row">
                                        <label for="inputPassword3"  class="col-sm-2 col-form-label">Parent</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="parent" id="inputPass word3" >
											<option value="">--SELECT Parrent Page--</option>
											<?php $cms=mysqli_query($connect,"SELECT * FROM cms where status=1");
											while($c=mysqli_fetch_array($cms))
											{
											?>
											<option value="<?php echo $c['id']; ?>" <?php if($row['parent']==$c['id']) { ?> selected <?php } ?>><?php echo $c['title'];?></option>
											<?php } ?>
											</select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Body</label>
                                        <div class="col-sm-10">
                                           <textarea id="summernote" name="body"><?php echo $row['body']; ?></textarea>
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
	include('includes/frontend_block.php');
?>