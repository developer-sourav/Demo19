<?php require_once('includes/sidebar-menu.php');


$id=$_REQUEST['banner_id'];

if(isset($_POST['add-submit']))
{ 
    $title=$_POST['title'];
	$subtitle=str_replace("'","'",$_POST['subtitle']);
	$button=$_POST['button'];
	$link=$_POST['link'];
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
				$a="select * from banner where id=".$id;
				$b=mysqli_query($connect,$a);
				$q=mysqli_fetch_assoc($b);
				unlink('media/banner/'.$q['img']);

				$u="Update `banner` SET img='".$img_name."' where id=".$id;
				mysqli_query($connect,$u);
						 
				move_uploaded_file($_FILES["img"]["tmp_name"],"media/banner/".$img_name);
			}
	
		 $q="Update banner set  title='".$title."',subtitle='".$subtitle."',link='".$link."',button='".$button."' where id=".$id;
			if(mysqli_query($connect,$q))
			{
				$_SESSION['success_msg']="Banner updated successfully";
				unset($_POST);
			}
			else
			{
				$_SESSION['error_msg']="Error occured. Try Later.";
			}
}
if($_REQUEST['action']=='banner')
{
	$qds="update banner set banner='' where id=".$id;
	
	if(mysqli_query($connect,$qds))
	{
		echo "<script> alert('Banner Removed Successfully');</script>";
	}
	else
	{
		echo "<script> alert('Error Occured');</script>";
	}
	echo '<script language="javascript">location.href="'.$admin_url.'edit-banner?banner_id='.$id.'"</script>';
}
if($_REQUEST['action']=='image')
{
	$qds="update banner set img='' where id=".$id;
	
	if(mysqli_query($connect,$qds))
	{
		echo "<script> alert('Image Removed Successfully');</script>";
	}
	else
	{
		echo "<script> alert('Error Occured');</script>";
	}
echo '<script language="javascript">location.href="'.$admin_url.'edit-banner?banner_id='.$id.'"</script>';
}
?>



<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Banners</h5></div>
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo $admin_url;?>">Dashboard</a></li>
                        <li><a href="<?php echo $admin_url;?>banner">Banner</a></li>
						<li class="active"><span>Edit Banner</span></li>
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
						$r="select * from banner where id=".$id;
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
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="img" value="<?php echo $row['img']; ?>" class="form-control" id="inputPass word3" placeholder="Chose Image">
                                       <?php if($row['img']!='') { ?>
									   <img src="<?php echo $admin_url.'media/banner/'. $row['img']; ?>" height="70"><!--<a href="edit-banner?action=image&banner_id=<?php echo  $id; ?>"><i class="fa remove_cross" style="margin-left:75px">&#xf00d;</i></a>-->
									   <?php } ?>
										</div>
                                    </div>
									<div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Button</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="button" value="<?php echo $row['button']; ?>" class="form-control" id="inputPass word3" placeholder="Button Name">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Link</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="link" value="<?php echo $row['link']; ?>" class="form-control" id="inputPass word3" placeholder="Button Link">
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