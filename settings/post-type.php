<?php require_once('includes/sidebar-menu.php'); 



$id=$_REQUEST['type_id'];
if($_REQUEST['action']=='delete')
{

	$qr=mysqli_fetch_array(mysqli_query($connect,"select * from post_type where id='".$id."' "));
	$seo=$qr['seo'];
						
	$qd="delete from post_type where id=".$id;
	
	if(mysqli_query($connect,$qd))
	{
		
		unlink($seo.'.php');
		unlink('add-'.$seo.'.php');
		unlink('edit-'.$seo.'.php');
		unlink($seo.'-category'.'.php');
		unlink('add-'.$seo.'-category'.'.php');
		unlink('edit-'.$seo.'-category'.'.php');
		
		rmdir("media/".$seo);
		
		$t1=$seo;
		$t2=$seo.'category';
		mysqli_query($connect,"DROP TABLE $t1 ");
		mysqli_query($connect,"DROP TABLE $t2 ");
	?>
	<script>
		  $(document).ready(function(){
        swal({   
			title: "Remove Successfully!",   
             type: "success", 
			confirmButtonColor: "#469408",   
        },
  function(){
    window.location.href = '<?php echo $admin_url.'post-type';?>';
});
		return false;

	});	
	</script>
    
	<?php
	}
	else
	{ ?>
<script>
	$(document).ready(function(){
        swal({   
			title: "Error Occured.!", 
			text: "Try Again later",   
            type: "error", 
			confirmButtonColor: "#DC143C",   
        },
  function(){
    window.location.href = '<?php echo $admin_url.'post-type';?>';
});
		return false;

});	
</script>		
<?php }
}
if($_REQUEST['action']=='active')
{
	$qd="update post_type set status=1 where id=".$id;
	
	if(mysqli_query($connect,$qd))
	{
	?>
	<script>
		  $(document).ready(function(){
        swal({   
			title: "Type Active!",   
             type: "success", 
			confirmButtonColor: "#469408",   
        },
  function(){
    window.location.href = '<?php echo $admin_url.'post-type';?>';
});
		return false;

	});	
	</script>
    
	<?php
	}
	else
	{ ?>
<script>
	$(document).ready(function(){
        swal({   
			title: "Error Occured.!", 
			text: "Try Again later",   
            type: "error", 
			confirmButtonColor: "#DC143C",   
        },
  function(){
    window.location.href = '<?php echo $admin_url.'post-type';?>';
});
		return false;

});	
</script>		
<?php }
}
if($_REQUEST['action']=='deactive')
{
	$qd="update post_type set status=0 where id=".$id;
	
	if(mysqli_query($connect,$qd))
	{
	?>
	<script>
		  $(document).ready(function(){
        swal({   
			title: "Type Deactive!",   
             type: "success", 
			confirmButtonColor: "#469408",   
        },
  function(){
    window.location.href = '<?php echo $admin_url.'post-type';?>';
});
		return false;

	});	
	</script>
    
	<?php
	}
	else
	{ ?>
<script>
	$(document).ready(function(){
        swal({   
			title: "Error Occured.!", 
			text: "Try Again later",   
            type: "error", 
			confirmButtonColor: "#DC143C",   
        },
  function(){
    window.location.href = '<?php echo $admin_url.'post-type';?>';
});
		return false;

});	
</script>		
<?php }
}
?>


<div class="row heading-bg">
					<div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
					  <h5 class="txt-dark">Custom Post Type
                      
                       <a href="<?php echo $admin_url;?>add-post-type" class="btn btn-success btn-icon text-white mr-2">
                                Create Post Type
                            </a>
                          </h5>  
                            
					</div>
					<div class="col-lg-7 col-sm-6 col-md-6 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo $admin_url;?>">Dashboard</a></li>
						<li class="active"><span>Custom Post Type</span></li>
					  </ol>
					</div>
				</div>
                
                
                
            

<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Custom Post Type</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">






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
					<div class="table-responsive">
						<table id="example" class="table table-hover display mb-30" >
                                    <thead>
                                        <tr role="row">
                                            <th>Serial No. </th>
                                             <th>Title</th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
								
								$i=0;
								$r="Select * from post_type  where id>9";
                                $q=mysqli_query($connect,$r);
								while($row=mysqli_fetch_array($q))
								{
									$i++;
									
								?>
                                        <tr>
                                        <td class=" "><?php echo $i; ?></td>
										
                                        <td class=" "><?php echo $row['title']; ?></td>
                                        
                                        <td>
                                        	<a class="confirmdelete tabledeletebttn" title="Delete" href="<?php echo $admin_url; ?>post-type?action=delete&type_id=<?php echo $row['id'] ?>"><i class="fa remove_cross">&#xf00d;</i></a>
											<?php if($row['status']==0) { ?>
                                            <a title="Active" href="<?php echo $admin_url; ?>post-type?action=active&type_id=<?php echo $row['id'] ?>"><i class="fa fa-ban"></i></a>
                                            <?php } else { ?>
                                            <a title="Deactive" href="<?php echo $admin_url; ?>post-type?action=deactive&type_id=<?php echo $row['id'] ?>"><i class="fa fa-check "></i></a>
                                             <?php } ?>
                                           
                                        </td>
                                     </tr>
								<?php } ?>

								
                                    </tbody>
                                </table>
                           </div>
									</div>	
								</div>	
							</div>	
						</div>	
					</div>
				</div>

<?php 
	require_once('includes/frontend_block.php');
?>