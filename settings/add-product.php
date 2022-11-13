<?php require_once('includes/sidebar-menu.php'); 
if(isset($_POST['add-submit']))
{
	$title=$_POST['title'];
	$body=$_POST['body'];
	$metakey=$_POST['metakey'];
	$metatag=$_POST['metatag'];
	
	$prd_cnt=mysqli_fetch_array(mysqli_query($connect,"select count(*) as cnt from products where title='".$_POST['title']."' "));
	if($prd_cnt['cnt']>0){
	    $seo=strtolower(str_replace(' ','-',$_POST['title'])).$prd_cnt['cnt'];
	} else {
	    $seo=strtolower(str_replace(' ','-',$_POST['title']));
	}
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
						
 	$q="Insert into products SET seo='".$seo."',metakey='".$metakey."',metatag='".$metatag."', title='".$title."', body='".$body."', img='".$img_name."', dt='".date('d-m-y h:i:sA')."',status=1,category='".$category."' "; 
			 
			if(mysqli_query($connect,$q))
			{
				$_SESSION['success_msg']="Product added successfully";
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
					  <h5 class="txt-dark">Products</h5></div>
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo $admin_url;?>">Dashboard</a></li>
                        <li><a href="<?php echo $admin_url;?>product">Products</a></li>
						<li class="active"><span>Add Product</span></li>
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
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Meta Key</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="metakey" class="form-control"  placeholder="Meta Key">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Meta Tag</label>
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
                                        <label for="inputPassword3"  class="col-sm-2 col-form-label">Category</label>
                                        <div class="col-sm-10">
										
										<?php $cts=mysqli_query($connect,"SELECT * from category where parent='0' AND status=1");
												while($cats=mysqli_fetch_array($cts))
                                                { ?>
                                                <input type="checkbox" name="cat<?php echo $cats['id'];?>" value="<?php echo $cats['id']; ?>"> <?php echo $cats['title'];?> <br>
                                                
                                                 <?php
													$cat_c=mysqli_query($connect,"select * from category where status=1 and parent=".$cats['id']);
													while($cat_cc=mysqli_fetch_array($cat_c))
													{
												?>
													 &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;<input type="checkbox" value="<?php echo $cat_cc['id'];?>" name="cat<?php echo $cat_cc['id'];?>" /> <?php echo $cat_cc['title'];?> <br>
												<?php } ?>
                                                
                                                
												<?php } ?>
											
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