<?php require_once('includes/sidebar-menu.php'); 

$id=$_REQUEST['gallery-id'];
if($_REQUEST['action']=='delete')
{
	
	$qd="delete from gallery where id=".$id;
	
	if(mysqli_query($connect,$qd))
	{
		echo "<script> alert('Image Removed Successfull');</script>";
		echo '<script language="javascript">location.href="'.$admin_url.'gallery"</script>';
	}
	else
	{
		echo "<script> alert('Error Occured. Try Again later');</script>";
		echo '<script language="javascript">location.href="'.$admin_url.'gallery"</script>';
	}
}

if($_REQUEST['action']!='delete' && $id>0)
{
	
	$qd=mysqli_fetch_array(mysqli_query($connect,"select * from gallery where id='".$id."' "));
	
	if($qd['status']==0) {
		mysqli_query($connect,"update gallery set status=1 where id='".$id."' ");
	} else {
		mysqli_query($connect,"update gallery set status=0 where id='".$id."' ");		
	}
	
	echo "<script> alert('Status Update Successfull');</script>";
	echo '<script language="javascript">location.href="'.$admin_url.'gallery"</script>';
	
}


?>

<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Gallery
                      
                       <a href="<?php echo $admin_url;?>add-gallery" class="btn btn-success btn-icon text-white mr-2">
                                Add Gallery
                            </a>
                          </h5>  
                            
					</div>
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo $admin_url;?>">Dashboard</a></li>
						<li class="active"><span>Gallery</span></li>
					  </ol>
					</div>
				</div>
                
                





  
                
                            <div class="row">
							<?php 
							    $r="Select * from gallery";
                                $q=mysqli_query($connect,$r);
								while($row=mysqli_fetch_array($q))
								{ ?>
                                
                                    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
                                        <div class="panel panel-default card-view pa-0">
                                            <div class="panel-wrapper collapse in">
                                                <div class="panel-body pa-0">
                                                    <article class="col-item">
                                                        <div class="photo">
                                                            <div class="options">
                                                                <a href="<?php echo $admin_url; ?>edit-gallery?gallery-id=<?php echo $row['id']; ?>" class="font-18 txt-grey mr-10 pull-left"><i class="zmdi zmdi-edit"></i></a>
                                                                <a href="<?php echo $admin_url; ?>gallery?action=delete&gallery-id=<?php echo $row['id'] ?>" class="font-18 txt-grey pull-left sa-warning1"><i class="zmdi zmdi-close"></i></a>
                                                            </div>
                                                            
                                                            <a href="javascript:void(0);"> <img src="<?php echo $admin_url."media/gallery/".$row['img']; ?>" class="img-responsive gal_thumb" alt="Product Image" /> </a>
                                                        </div>
                                                        <div class="info">
                                                            <h6><?php echo $row['title']; ?></h6>
                                                            <div class="product-rating inline-block">
                                                                <!--<a href="javascript:void(0);" class="font-12 txt-success zmdi zmdi-star mr-0"></a><a href="javascript:void(0);" class="font-12 txt-success zmdi zmdi-star mr-0"></a>
                                                                <a href="javascript:void(0);" class="font-12 txt-success zmdi zmdi-star mr-0"></a><a href="javascript:void(0);" class="font-12 txt-success zmdi zmdi-star mr-0"></a>
                                                                <a href="javascript:void(0);" class="font-12 txt-success zmdi zmdi-star-outline mr-0"></a>-->
                                                                
                                                                <ul class="active-state-div">
                                                                    <li><span class="label-switch">Hide</span></li>
                                                                    <li>
                                                                    <label class="switch">
                                                                        <input type="checkbox" <?php if($row['status']==1) { ?>checked<?php } ?> onClick="Javascript:window.location.href = '<?php echo $admin_url.'gallery?gallery-id='.$row['id'];?>';">
                                                                        <span class="slider round"></span>
                                                                    </label>
                                                                    </li>
                                                                    <li><span class="label-switch">Show</span></li>
                                                                </ul>
                                                
                                                
                                                            </div>
                                                            <!--<span class="head-font block text-warning font-16">$150</span>-->
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>	
                                        </div>	
                                    </div>	
								
                
                
                
                                
								<?php } ?>
                            </div>
                       
                    
                    
                   

<?php 
	require_once('includes/frontend_block.php');
?>