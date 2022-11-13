<?php require_once('includes/sidebar-menu.php');

$a=explode('.',basename($_SERVER['PHP_SELF']));
$tn=ltrim($a[0],"edit-");
$ct=$tn.'category';
$fn=ucfirst(str_replace('-',' ',$tn));

$id=$_REQUEST[$tn.'_id'];

if(isset($_POST['add-submit']))
{ 
	$title=$_POST['title'];
	$dt=$_POST['dt'];
	$body=$_POST['body'];
	$category=$_POST['category'];
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
				$a="select * from $tn where id=".$id;
				$b=mysqli_query($connect,$a);
				$q=mysqli_fetch_assoc($b);
				unlink('media/'.$tn.'/'.$q['img']);

				$u="Update $tn SET img='".$img_name."' where id=".$id;
				mysqli_query($connect,$u);
						 
				move_uploaded_file($_FILES["img"]["tmp_name"],"media/".$tn."/".$img_name);
			}

		 $q="Update $tn set  title='".$title."',category='".$category."',dt='".$dt."', body='".$body."' where id=".$id;
			if(mysqli_query($connect,$q))
			{
				$_SESSION['success_msg']="Updated successfully";
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
					  <h5 class="txt-dark"><?php echo $fn;?></h5></div>
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo $admin_url;?>">Dashboard</a></li>
                        <li><a href="<?php echo $admin_url.$tn;?>"><?php echo $fn;?></a></li>
						<li class="active"><span>Edit <?php echo $fn;?></span></li>
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
						$r="select * from $tn where id=".$id;
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
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
                                        <div class="col-sm-10">
                                            
											<select class="form-control col-md-7 col-xs-12" name="category" >
                                                	<option value="">Select</option>
												<?php
													$re=mysqli_query($connect,"select * from $ct where status=1");
													while($res=mysqli_fetch_array($re))
													{
												?>
                                                    		<option  value="<?php echo $res['id'];?>" <?php if($res['id']==$row['category']) { ?> selected="selected" <?php } ?>><?php echo $res['title'];?></option>
                                                            
                                                           
                                                 <?php } ?>

                                                </select>
                                        </div></div> 
                                        
                                   <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Date</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="datepicker" name="dt" value="<?php echo $row['dt']; ?>" class="form-control" placeholder="date">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="img" value="<?php echo $row['img']; ?>" class="form-control" id="inputPass word3" placeholder="Chose Image">
                                       <?php if($row['img']!='') { ?>
									   <a href="<?php echo $admin_url.'media/'.$tn.'/'. $row['img']; ?>" target="_blank"><img src="<?php echo $admin_url.'media/'.$tn.'/'. $row['img']; ?>" height="70"></a>
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