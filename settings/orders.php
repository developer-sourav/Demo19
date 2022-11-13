<?php require_once('includes/sidebar-menu.php'); 

$id=$_REQUEST['order_id'];

if($_REQUEST['action']=='delete')
{
	
	$q1="delete from orders where id=".$id;
	
	if(mysqli_query($connect,$q1))
	{
		$_SESSION['success_msg']="Order removed successfully";
	}
	else
	{
		$_SESSION['error_msg']="Error occured. Try Later.";
	}
}

if($_REQUEST['action']=='payment_status')
{
	$qd="update orders set payment_status=1 where id=".$id;
	
	if(mysqli_query($connect,$qd))
	{
		$_SESSION['success_msg']="Payment status update successfully";
	}
	else
	{
		$_SESSION['error_msg']="Error occured. Try Later.";
	}
}
if($_REQUEST['action']=='order_status')
{
	$qd="update orders set order_status=1 where id=".$id;
	
	if(mysqli_query($connect,$qd))
	{
		$_SESSION['success_msg']="Order status update successfully";
	}
	else
	{
		$_SESSION['error_msg']="Error occured. Try Later.";
	}
}

?>

<div class="main-container">

				<!-- Title bar starts -->
				<div class="title-bar">
					<ol class="breadcrumb">
						<li><a href="<?php echo $admin_url ?>">Home</a></li>
						<li class="active">Product Orders</li>
					</ol>
				</div>
				<!-- Title bar ends -->

				<!-- Top Bar Starts -->
				<div class="top-bar clearfix">
					<div class="page-title">
						<h4>Product Orders</h4>
                    </div>
						
					
				</div>
				<!-- Top Bar Ends -->

				<hr class="stylish">

				<!-- Container fluid Starts -->
				<div class="container-fluid">

					<!-- Spacer Starts -->
					<div class="spacer">

						<!-- Row starts -->
						<div class="row">
                            
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
								$q="SELECT * FROM `orders` order by id desc ";
								
								$res=mysqli_query($connect,$q);
								?>
                                
                                
                                
                                    <table class="dataTable table table-bordered table-striped table-hover" id="myTable">
                                        <thead>
                                            <tr >

                                                <th>Order Id</th>
                                                <th>Ammount(Rs.)</th>
                                                <th>From Wallet(Rs.)</th>
                                                <th>Remaining(Rs.)</th>
                                                <th>Customer</th>
                                                <th>Order Date</th>
                                                <!--<th>Payment Type</th>
                                                <th>Payment Status</th>-->
                                                <th >Order Status</th>
                                                <th>Action</th>

                                </tr>
                            </thead>

                            <tbody>
                            	<?php
								
									while($row=mysqli_fetch_array($res))
									{
										$cust=mysqli_fetch_array(mysqli_query($connect,"select * from users where id=".$row['user']));
									?>
									
										<tr>
                                        	
											<td><?php echo $row['order_id']; ?></td>
                                            <td><?php echo $row['ammount']; ?></td>
                                            <td><?php echo $row['wallet']; ?></td>
                                            <td><?php echo $row['remaining']; ?></td>
                                            <td><a title="Details" href="<?php echo $admin_url; ?>/edit-users.php?profile_id=<?php echo $row['id'] ?>"><b><?php echo $cust['fname'].' '.$cust['lname']; ?></b></a></td>
                                            <td><?php echo $row['order_date']; ?></td>
                                            <?php /*?><td><?php echo $row['payment_type']; ?></td>
                                            <td>
												 <?php if($row['payment_status']==1) { ?>Complete<?php } else { ?>
                                       				<a class="btn btn-danger btn-xs" title="Incomplete" href="<?php echo $admin_url; ?>/orders.php?action=payment_status&order_id=<?php echo $row['id'] ?>">Incomplete</a><?php } ?>
											</td><?php */?>
                                            <td>
                                            	<?php if($row['return']==1) { ?>Return<?php } else { ?>
                                                    
												 <?php if($row['order_status']==1) { ?>Complete<?php } else { ?>
                                       				<a class="btn btn-danger btn-xs" title="Process" href="<?php echo $admin_url; ?>/orders.php?action=order_status&order_id=<?php echo $row['id'] ?>">Process</a><?php } } ?>
											</td>

											<td>
                                                <a class="btn btn-danger btn-xs" title="Delete" href="<?php echo $admin_url; ?>/orders.php?action=delete&order_id=<?php echo $row['id'] ?>">Delete</a>

 												<a class="btn btn-primary btn-xs" title="Details" href="<?php echo $admin_url; ?>/order_details.php?order_id=<?php echo $row['id'] ?>">Details</a>									
											</td>

										 </tr>

                                <?php	
								}
								?>                                
                                            </tbody>

                                    </table>
                                    
                                    
                                    	                                 
                                   

<?php 
	require_once('includes/frontend_block.php');
?>
