<?php require_once('includes/sidebar-menu.php'); ?>


<?php
if($_REQUEST['action']=='delete')
{
	$id=$_REQUEST['bookingid'];
	$qd="delete from booking where id=".$id;
	
	if(mysqli_query($connect,$qd))
	{
	?>
	<script>
		  $(document).ready(function(){
        swal({   
			title: "Booking Remove Successfully!",   
             type: "success", 
			confirmButtonColor: "#469408",   
        },
  function(){
    window.location.href = '<?php echo $admin_url.'booking';?>';
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
    window.location.href = '<?php echo $admin_url.'booking';?>';
});
		return false;

});	
</script>		
<?php }
	
}
?>




<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Booking </h5>  
                            
					</div>
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo $admin_url;?>">Dashboard</a></li>
						<li class="active"><span>Booking</span></li>
					  </ol>
					</div>
				</div>
                
                

<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Booking</h6>
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
                                            <th>Booking ID </th>
                                            <th>Name</th>
                                            <th>Email </th>
                                             <th>Phone </th>
                                             <th>Date </th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
								
								$i=0;
								$r="Select * from booking order by id desc";
                                $q=mysqli_query($connect,$r);
								while($row=mysqli_fetch_array($q))
								{
									$i++;
									
								?>
                                        <tr>
                                        <td class=" "><?php echo $i; ?></td>
                                        <td class=" "><?php echo $row['booking_id']; ?></td>
                                        <td class=" "><?php echo $row['fname']; ?></td>
										<td class=" "><?php echo $row['email']; ?></td>
										<td class=" "><?php echo $row['phone']; ?></td>
										<td class=" "><?php echo $row['dt']; ?></td>
                                        <td>
                                        	<a class="btn btn-danger btn-xs" itle="Delete" href="<?php echo $admin_url; ?>booking?action=delete&bookingid=<?php echo $row['id'] ?>">Delete</a>
                                           <a class="btn btn-info btn-xs btn-success" href="<?php echo $admin_url; ?>booking-details?bookingid=<?php echo $row['id'] ?>" > Details </a>
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
