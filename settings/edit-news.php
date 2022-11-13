<?php require_once('includes/sidebar-menu.php');


$id=$_REQUEST['news_id'];

if(isset($_POST['add-submit']))
{ 
	$title=$_POST['title'];
	$dt=$_POST['dt'];
	$body=$_POST['body'];
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
				$a="select * from news where id=".$id;
				$b=mysqli_query($connect,$a);
				$q=mysqli_fetch_assoc($b);
				unlink('media/news/'.$q['img']);

				$u="Update `news` SET img='".$img_name."' where id=".$id;
				mysqli_query($connect,$u);
						 
				move_uploaded_file($_FILES["img"]["tmp_name"],"media/news/".$img_name);
			}

		 $q="Update news set  title='".$title."',dt='".$dt."', body='".$body."' where id=".$id;
			if(mysqli_query($connect,$q))
			{
				$_SESSION['success_msg']="News updated successfully";
				unset($_POST);
			}
			else
			{
				$_SESSION['error_msg']="Error occured. Try Later.";
			}
}
if($_REQUEST['action']=='image')
{
	$qds="update news set img='' where id=".$id;
	
	if(mysqli_query($connect,$qds))
	{
		echo "<script> alert('Image Removed Successfully');</script>";
	}
	else
	{
		echo "<script> alert('Error Occured');</script>";
	}
echo '<script language="javascript">location.href="'.$admin_url.'edit-news?news_id='.$id.'"</script>';
}
?>




					<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">News</h5></div>
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo $admin_url;?>">Dashboard</a></li>
                        <li><a href="<?php echo $admin_url;?>news">News</a></li>
						<li class="active"><span>Edit News</span></li>
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
						$r="select * from news where id=".$id;
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
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Date</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="datepicker" name="dt" value="<?php echo $row['dt']; ?>" class="form-control" id="inputEmail3" placeholder="date">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="img" value="<?php echo $row['img']; ?>" class="form-control" id="inputPass word3" placeholder="Chose Image">
                                       <?php if($row['img']!='') { ?>
									   <img src="<?php echo $admin_url.'media/news/'. $row['img']; ?>" height="70"><!--<a href="edit-news?action=image&news_id=<?php echo $id; ?>"><i class="fa remove_cross" style="margin-left:75px">&#xf00d;</i></a>-->
									   <?php } ?>
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