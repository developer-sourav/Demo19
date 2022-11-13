<?php require_once('includes/sidebar-menu.php'); 

$id=$_REQUEST['banner_id'];
if($_REQUEST['action']=='delete')
{
	            $a="select * from banner where id=".$id;
				$b=mysqli_query($connect,$a);
				$qq=mysqli_fetch_assoc($b);
				unlink('media/banner/'.$qq['img']);
	$qd="delete from banner where id=".$id;
	
	if(mysqli_query($connect,$qd))
	{
	?>
	<script>
		  $(document).ready(function(){
        swal({   
			title: "Banner Remove Successfully!",   
             type: "success", 
			confirmButtonColor: "#469408",   
        },
  function(){
    window.location.href = '<?php echo $admin_url.'banner';?>';
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
    window.location.href = '<?php echo $admin_url.'banner';?>';
});
		return false;

});	
</script>		
<?php }
}
if($_REQUEST['action']=='active')
{
	$qd="update banner set status=1 where id=".$id;
	
	if(mysqli_query($connect,$qd))
	{  
	?>
	<script>
		  $(document).ready(function(){
        swal({   
			title: "Banner Active!",   
             type: "success", 
			confirmButtonColor: "#469408",   
        },
  function(){
    window.location.href = '<?php echo $admin_url.'banner';?>';
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
    window.location.href = '<?php echo $admin_url.'banner';?>';
});
		return false;

});	
</script>
<?php	}
}
if($_REQUEST['action']=='deactive')
{
	$qd="update banner set status=0 where id=".$id;
	
	if(mysqli_query($connect,$qd))
	{ 
?>
<script>
		  $(document).ready(function(){
        swal({   
			title: "Banner Deactive!",   
             type: "success", 
			confirmButtonColor: "#DC143C",   
        },
  function(){
    window.location.href = '<?php echo $admin_url.'banner';?>';
});
		return false;

	});	
	</script>
<?php	}
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
    window.location.href = '<?php echo $admin_url.'banner';?>';
});
		return false;

});	
</script>		
<?php	}
}
?>


    
<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Banners
                      
                       <a href="<?php echo $admin_url;?>add-banner" class="btn btn-success btn-icon text-white mr-2">
                                Add Banner
                            </a>
                          </h5>  
                            
					</div>
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo $admin_url;?>">Dashboard</a></li>
						<li class="active"><span>Banners</span></li>
					  </ol>
					</div>
				</div>
                
          
                

<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Banners</h6>
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
                                            <th>Banner </th>
                                            <th>Title </th>
                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
								
								$i=0;
								$r="Select * from banner";
                                $q=mysqli_query($connect,$r);
								while($row=mysqli_fetch_array($q))
								{
									$i++;
									
								?>
                                        <tr>
                                        <td class=" "><?php echo $i; ?></td>
										
										<td class=" "><?php if($row['img']!='') { ?><img src="<?php echo $admin_url."media/banner/".$row['img'];?>" height="50"><?php } ?></td>
                                        <td class=" "><?php echo $row['title']; ?></td>
										
                                        <td>
                                        	<a class="confirmdelete tabledeletebttn" title="Delete" href="<?php echo $admin_url; ?>banner?action=delete&banner_id=<?php echo $row['id'] ?>"><i class="fa remove_cross">&#xf00d;</i></a>
											<?php if($row['status']==0) { ?>
                                            <a title="Active" href="<?php echo $admin_url; ?>banner?action=active&banner_id=<?php echo $row['id'] ?>"><i class="fa fa-ban"></i></a>
                                            <?php } else { ?>
                                            <a title="Deactive" href="<?php echo $admin_url; ?>banner?action=deactive&banner_id=<?php echo $row['id'] ?>"><i class="fa fa-check "></i></a>
                                             <?php } ?>
                                            <a title="Edit" href="<?php echo $admin_url; ?>edit-banner?banner_id=<?php echo $row['id'] ?>"><i class="fa fa-edit"></i></a>
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