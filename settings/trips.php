<?php require_once('includes/sidebar-menu.php'); 

$id=$_REQUEST['trip-id'];

if($_REQUEST['action']=='delete')
{
	
	$q1="delete from trips where id=".$id;
	
	if(mysqli_query($connect,$q1))
	{
		mysqli_query($connect,"delete from trip_gallery where t_id=".$id);
		mysqli_query($connect,"delete from trip_pay_policy where r_id=".$id);
		mysqli_query($connect,"delete from trip_cancel_policy where t_id=".$id);
		
	?>
	<script>
		  $(document).ready(function(){
        swal({   
			title: "Trips Remove Successfully!",   
             type: "success", 
			confirmButtonColor: "#469408",   
        },
  function(){
    window.location.href = '<?php echo $admin_url.'trips';?>';
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
    window.location.href = '<?php echo $admin_url.'trips';?>';
});
		return false;

});	
</script>		
<?php }
}

if($_REQUEST['action']=='active')
{
	$qd="update trips set status=1 where id=".$id;
	
	if(mysqli_query($connect,$qd))
	{
	?>
	<script>
		  $(document).ready(function(){
        swal({   
			title: "Trip Active!",   
             type: "success", 
			confirmButtonColor: "#469408",   
        },
  function(){
    window.location.href = '<?php echo $admin_url.'trips';?>';
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
    window.location.href = '<?php echo $admin_url.'trips';?>';
});
		return false;

});	
</script>		
<?php }
}

if($_REQUEST['action']=='deactive')
{
	$qd="update trips set status=0 where id=".$id;
	
	if(mysqli_query($connect,$qd))
	{
	?>
	<script>
		  $(document).ready(function(){
        swal({   
			title: "Trip Deactive!",   
             type: "success", 
			confirmButtonColor: "#469408",   
        },
  function(){
    window.location.href = '<?php echo $admin_url.'trips';?>';
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
    window.location.href = '<?php echo $admin_url.'trips';?>';
});
		return false;

});	
</script>		
<?php }
}

?>
<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Trips
                      
                       <a href="<?php echo $admin_url;?>add-trip" class="btn btn-success btn-icon text-white mr-2">
                                Add Trips
                            </a>
                          </h5>  
                            
					</div>
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo $admin_url;?>">Dashboard</a></li>
						<li class="active"><span>Trips</span></li>
					  </ol>
					</div>
				</div>
                
                

<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Trips</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">




                                            

                            
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
								$q="SELECT * FROM `trips` ORDER BY id DESC  ";
								
								$res=mysqli_query($connect,$q);
								
								?>
                                
					<div class="table-responsive">
						<table id="example" class="table table-hover display mb-30" >
                                        <thead>
                                            <tr role="row">
                                                <th>Sr.No.</th>
                                                <th>Name</th>
                                                <th>For</th>
                                                <th>Start</th>
                                                <th>Category</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>

                            <tbody>
                            	<?php
								$i=0;
									while($row=mysqli_fetch_array($res))
									{
										$i++;
										$cat=mysqli_fetch_array(mysqli_query($connect,"select * from Trip_category where id=".$row['category']));
										
									?>
									
										<tr>
                                        	
											<td><?php echo $i; ?></td>
                                            <td><?php echo $row['title']; ?></td>
                                            <td><?php echo $row['forr']; ?></td>
                                            <td><?php echo $row['s_dt']; ?></td>
                                            <td><?php echo $cat['title']; ?></td>
                                           
                                            
											<td>
 												<a title="Delete" href="<?php echo $admin_url; ?>/trips?action=delete&trip-id=<?php echo $row['id'] ?>"><i class="fa remove_cross">&#xf00d;</i></a> 
                                                
                                            <?php if($row['status']==0) { ?>
                                            <a title="Active" href="<?php echo $admin_url; ?>trips?action=active&trip-id=<?php echo $row['id'] ?>"><i class="fa fa-ban"></i></a>
                                            <?php } else { ?>
                                            <a title="Deactive" href="<?php echo $admin_url; ?>trips?action=deactive&trip-id=<?php echo $row['id'] ?>"><i class="fa fa-check "></i></a>
                                             <?php } ?>
                                             
                                           	<a title="Edit" href="<?php echo $admin_url; ?>edit-trip?trip-id=<?php echo $row['id'] ?>"><i class="fa fa-edit"></i></a> 
                                            												
                                          
											</td>

										 </tr>
									
									<?php	
									}
									?>                                
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
