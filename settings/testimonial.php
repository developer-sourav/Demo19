<?php require_once('includes/sidebar-menu.php'); 

$id=$_REQUEST['testimonial_id'];
if($_REQUEST['action']=='delete')
{
	            $a="select * from testimonial where id=".$id;
				$b=mysqli_query($connect,$a);
				$qq=mysqli_fetch_assoc($b);
				unlink('media/testimonial/'.$qq['img']);
	$qd="delete from testimonials where id=".$id;
	
	if(mysqli_query($connect,$qd))
	{
	?>
	<script>
		  $(document).ready(function(){
        swal({   
			title: "Testimonial Remove Successfully!",   
             type: "success", 
			confirmButtonColor: "#469408",   
        },
  function(){
    window.location.href = '<?php echo $admin_url.'testimonial';?>';
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
    window.location.href = '<?php echo $admin_url.'testimonial';?>';
});
		return false;

});	
</script>		
<?php }
}
if($_REQUEST['action']=='active')
{
	$qd="update testimonials set status=1 where id=".$id;
	
	if(mysqli_query($connect,$qd))
	{
	?>
	<script>
		  $(document).ready(function(){
        swal({   
			title: "Testimonial Active!",   
             type: "success", 
			confirmButtonColor: "#469408",   
        },
  function(){
    window.location.href = '<?php echo $admin_url.'testimonial';?>';
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
    window.location.href = '<?php echo $admin_url.'testimonial';?>';
});
		return false;

});	
</script>		
<?php }
}
if($_REQUEST['action']=='deactive')
{
	$qd="update testimonials set status=0 where id=".$id;
	
	if(mysqli_query($connect,$qd))
	{
	?>
	<script>
		  $(document).ready(function(){
        swal({   
			title: "Testimonial Deactive!",   
             type: "success", 
			confirmButtonColor: "#469408",   
        },
  function(){
    window.location.href = '<?php echo $admin_url.'testimonial';?>';
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
    window.location.href = '<?php echo $admin_url.'testimonial';?>';
});
		return false;

});	
</script>		
<?php }
}
?>


<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Testimonials
                      
                       <a href="<?php echo $admin_url;?>add-testimonial" class="btn btn-success btn-icon text-white mr-2">
                                Add Testimonial
                            </a>
                          </h5>  
                            
					</div>
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo $admin_url;?>">Dashboard</a></li>
						<li class="active"><span>Testimonials</span></li>
					  </ol>
					</div>
				</div>
                
                
                
            

<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Testimonials</h6>
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
                                            <th>Image </th>
                                             <th>Name</th>
                                             <th>Designation</th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
								
								$i=0;
								$r="Select * from testimonials";
                                $q=mysqli_query($connect,$r);
								while($row=mysqli_fetch_array($q))
								{
									$i++;
									
								?>
                                        <tr>
                                        <td class=" "><?php echo $i; ?></td>
										<?php if($row['img']!='') { ?>
										<td class=" "><img src="<?php echo $admin_url."media/testimonial/".$row['img'];?>" height="50"></td>
										<?php } else { ?> <td></td> <?php } ?>
                                        <td class=" "><?php echo $row['title']; ?></td>
                                        <td class=" "><?php echo $row['designation']; ?></td>
                                        <td>
                                        	<a class="confirmdelete tabledeletebttn" title="Delete" href="<?php echo $admin_url; ?>testimonial?action=delete&testimonial_id=<?php echo $row['id'] ?>"><i class="fa remove_cross">&#xf00d;</i></a>
											<?php if($row['status']==0) { ?>
                                            <a title="Active" href="<?php echo $admin_url; ?>testimonial?action=active&testimonial_id=<?php echo $row['id'] ?>"><i class="fa fa-ban"></i></a>
                                            <?php } else { ?>
                                            <a title="Deactive" href="<?php echo $admin_url; ?>testimonial?action=deactive&testimonial_id=<?php echo $row['id'] ?>"><i class="fa fa-check "></i></a>
                                             <?php } ?>
                                            <a title="Edit" href="<?php echo $admin_url; ?>edit-testimonial?testimonial_id=<?php echo $row['id'] ?>"><i class="fa fa-edit"></i></a>
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