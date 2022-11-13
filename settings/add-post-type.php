<?php require_once('includes/sidebar-menu.php'); 



if(isset($_POST['add-submit']))
{
	$title=$_POST['title'];
	$seo=strtolower(str_replace(' ','',$_POST['title']));

	$aa=mysqli_fetch_array(mysqli_query($connect,"select count(*) as a from post_type where title='".$title."'"));

	if($aa['a']==1) {

				$_SESSION['error_msg']="Already exist.";
		
	} else {
		
         $q="Insert into post_type SET seo='".$seo."',title='".$title."',typ=1, status=1 ";
			
			if(mysqli_query($connect,$q))
			{
				
				$var=$seo;
$mainfile=$var.'.php';
$addfile='add-'.$var.'.php';
$editfile='edit-'.$var.'.php';
$catfile=$var.'-category'.'.php';
$cataddfile='add-'.$var.'-category'.'.php';
$cateditfile='edit-'.$var.'-category'.'.php';

copy("post.php", $mainfile);
copy("add-post.php", $addfile);
copy("edit-post.php", $editfile);
copy("post-category.php", $catfile);
copy("add-post-category.php", $cataddfile);
copy("edit-post-category.php", $cateditfile);

mkdir("media/".$seo);


$sql1 = "CREATE TABLE IF NOT EXISTS `".$seo."` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `seo` varchar(200) NOT NULL,
  `category` int(5) NOT NULL,
  `body` text NOT NULL,
  `img` varchar(200) NOT NULL,
  `dt` varchar(20) NOT NULL,
  `status` int(5) NOT NULL,
  PRIMARY KEY (`id`)
)";

$sql2 = "CREATE TABLE IF NOT EXISTS `".$seo."category` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `seo` varchar(100) NOT NULL,
  `status` int(3) NOT NULL,
  PRIMARY KEY (`id`)
)";

mysqli_query($connect,$sql1);
mysqli_query($connect,$sql2);





				$_SESSION['success_msg']="Create successfully";
				unset($_POST);
			}
			else
			{
				$_SESSION['error_msg']="Error occured. Try Later.";
			}
			
	}
}
?>



 





					<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Custom Post Type</h5></div>
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo $admin_url;?>">Dashboard</a></li>
                        <li><a href="<?php echo $admin_url;?>post-type">Custom Post Type</a></li>
						<li class="active"><span>Add Custom Post Type</span></li>
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
                                            <input type="text" name="title" class="form-control" required  placeholder="Title">
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