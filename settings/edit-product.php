<?php require_once('includes/sidebar-menu.php');


$id=$_REQUEST['product-id'];

if(isset($_POST['add-submit']))
{ 
	$title=$_POST['title'];
	$subtitle=$_POST['subtitle'];
	$parent=$_POST['parent'];
	$body=$_POST['body'];
	$metakey=$_POST['metakey'];
	$metatag=$_POST['metatag'];
	
			$img=$_FILES['img']['name'];

			$array = explode('.', $img);
			if(end($array)!='')
			{
				$img_name = time().'.'.end($array);

				$q=mysqli_fetch_assoc(mysqli_query($connect,"select * from products where id='".$id."' "));
				unlink('media/product/'.$q['img']);

				$u="Update `products` SET img='".$img_name."' where id=".$id;
				mysqli_query($connect,$u);
						 
				move_uploaded_file($_FILES["img"]["tmp_name"],"media/product/".$img_name);
			}
			
			
	$cat='-';
	$ct=mysqli_query($connect,"select * from category where status=1");
	while($ctt=mysqli_fetch_array($ct))
	{
	
		if(isset($_POST['cat'.$ctt['id']]))
		{
			$cat .= $ctt['id'].'-';
		}
		
	} 
	
	if($cat=='-') { $category='';} else { $category=$cat;}
	
		 	$q="Update products set title='".$title."',metakey='".$metakey."',metatag='".$metatag."', body='".$body."', category='".$category."' where id=".$id;
			if(mysqli_query($connect,$q))
			{
				$_SESSION['success_msg']="Product updated successfully";
				unset($_POST);
			}
			else
			{
				$_SESSION['error_msg']="Error occured. Try Later.";
			}
}




$row=mysqli_fetch_assoc(mysqli_query($connect,"select * from products where id='".$id."' "));
?>


					<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Products</h5></div>
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo $admin_url;?>">Dashboard</a></li>
                        <li><a href="<?php echo $admin_url;?>product">Products</a></li>
						<li class="active"><span>Edit Product</span></li>
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
					
<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i>Edit Data</h6>
												<hr class="light-grey-hr"/>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title" value="<?php echo $row['title']; ?>" required class="form-control" id="inputEmail3">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Meta Key</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="metakey" value="<?php echo $row['metakey']; ?>" class="form-control"  placeholder="Meta Key">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Meta Tag</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="metatag" value="<?php echo $row['metatag']; ?>" class="form-control"  placeholder="Meta Tag">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="img"  class="form-control" id="inputPass word3" placeholder="Chose Image">
                                       <?php if($row['img']!='') { ?>
									   <br><a href="<?php echo $admin_url.'media/product/'. $row['img']; ?>" target="_blank"><img src="<?php echo $admin_url.'media/product/'. $row['img']; ?>" height="70"></a>
									   <?php } ?>
										</div>
                                    </div>
									<div class="form-group row">
                                        <label for="inputPassword3"  class="col-sm-2 col-form-label">Category</label>
                                        <div class="col-sm-10">
										
										
                                                
                                           <?php
												$cat_p=mysqli_query($connect,"select * from category where status=1 and parent=0");
												while($cat_pp=mysqli_fetch_array($cat_p))
												{
											?>
												&nbsp; &nbsp; &nbsp; &nbsp;<input type="checkbox" value="<?php echo $cat_pp['id'];?>" name="cat<?php echo $cat_pp['id'];?>" <?php if(strstr($row['category'],"-".$cat_pp['id']."-")) { ?>checked="checked"<?php } ?> /> <?php echo $cat_pp['title'];?> <br>
                                                
                                                <?php
													$cat_c=mysqli_query($connect,"select * from category where status=1 and parent=".$cat_pp['id']);
													while($cat_cc=mysqli_fetch_array($cat_c))
													{
												?>
													 &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;<input type="checkbox" value="<?php echo $cat_cc['id'];?>" name="cat<?php echo $cat_cc['id'];?>" <?php if(strstr($row['category'],"-".$cat_cc['id']."-")) { ?>checked="checked"<?php } ?> /> <?php echo $cat_cc['title'];?> <br>
												<?php } ?>
                                            
                                            
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