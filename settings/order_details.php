<?php require_once('includes/sidebar-menu.php');

$id=$_REQUEST['order_id'];

?>

<div class="main-container">

				<!-- Title bar starts -->
				<div class="title-bar">
					<ol class="breadcrumb">
						<li><a href="<?php echo $admin_url ?>">Home</a></li>
						<li class="active">Order Details</li>
					</ol>
				</div>
				<!-- Title bar ends -->

				<!-- Top Bar Starts -->
				<div class="top-bar clearfix">
					<div class="page-title">
						<h4>Order Details</h4>
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
							$row=mysqli_fetch_assoc(mysqli_query($connect,"Select * from orders where id=".$id));
							$user=mysqli_fetch_assoc(mysqli_query($connect,"Select * from users where id=".$row['user'])); 
						 ?>       
                         
                                    <div class="col-md-5 col-sm-6 col-xs-12">
                                       <h4><u>Order Details:</u></h4>           
                                	<form class="form-horizontal form-label-left">
										<div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="name">Order ID </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 blank_box"><?php echo $row['order_id']; ?></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="name">Order Date </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 blank_box"><?php echo $row['order_date']; ?></div>
                                        </div>
                                        
                                       <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="name">Ammount(Rs) </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 blank_box"><?php echo $row['ammount']; ?></div>
                                        </div>
                                        <?php if($row['wallet']>0) { ?>
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="name">From Wallet(Rs) </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 blank_box"><?php echo $row['wallet']; ?></div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="name">Remaining(Rs) </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 blank_box"><?php echo $row['remaining']; ?></div>
                                        </div>
                                        <?php } ?>
                                        
                                      <?php /*?> <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="name">Payment Type </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 blank_box"><?php echo $row['payment_type']; ?></div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="name">Payment Status </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 blank_box"><?php if($row['payment_status']==1) { ?>Complete<?php } else { ?>Incomplete<?php } ?></div>
                                        </div><?php */?>
                                       
                                       <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="name">Order Status </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 blank_box"><?php if($row['order_status']==1) { ?>Complete<?php } else { ?>Process<?php } ?></div>
                                        </div>
                                        
                                    </form>
                                    
                                    </div>
                                    
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                    <h4><u>Billing Details:</u></h4>
                                    <form class="form-horizontal form-label-left">
										<div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="name">Name </label>
                                            <div class="col-md-8 col-sm-8 col-xs-12 blank_box"><?php echo $user['fname'].' '.$user['lname']; ?></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="name">Email </label>
                                            <div class="col-md-8 col-sm-8 col-xs-12 blank_box"><?php echo $user['email']; ?></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="name">Phone </label>
                                            <div class="col-md-8 col-sm-8 col-xs-12 blank_box"><?php echo $user['phone']; ?></div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="name">Address </label>
                                            <div class="col-md-8 col-sm-8 col-xs-12 blank_box"><?php echo $user['address']; ?></div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="name">City </label>
                                            <div class="col-md-8 col-sm-8 col-xs-12 blank_box"><?php echo $user['city']; ?></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="name">Pincode </label>
                                            <div class="col-md-8 col-sm-8 col-xs-12 blank_box"><?php echo $user['pin']; ?></div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="name">State </label>
                                            <div class="col-md-8 col-sm-8 col-xs-12 blank_box"><?php echo $user['state']; ?></div>
                                        </div>
                                        
                                        
                                    </form>
                                    
                               		</div>
                                    
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                    <h4><u>Shipping Details:</u></h4>
                                    <form class="form-horizontal form-label-left">
										<?php if($row['shipping_address']!='') {  ?>
                                       <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="name">Address </label>
                                            <div class="col-md-8 col-sm-8 col-xs-12 blank_box"><?php echo $row['shipping_address']; ?></div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="name">City </label>
                                            <div class="col-md-8 col-sm-8 col-xs-12 blank_box"><?php echo $row['shipping_city']; ?></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="name">Pincode </label>
                                            <div class="col-md-8 col-sm-8 col-xs-12 blank_box"><?php echo $row['shipping_pin']; ?></div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="name">State </label>
                                            <div class="col-md-8 col-sm-8 col-xs-12 blank_box"><?php echo $row['shipping_state']; ?></div>
                                        </div>
                                        
                                        <?php if($row['notes']!='') { ?>
                                         <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="name">Customer Notes </label>
                                            <div class="col-md-8 col-sm-8 col-xs-12 blank_box"><?php echo $row['notes']; ?> </div>
                                        </div>
                                        <?php } } else { ?>
                                        <div class="form-group"><b style="text-align:center; width:100%; float:left">Same as billing address</b></div>
                                        
                                        <?php } ?>
                                        
                                    </form>
                                    
                               		</div>
                                    
                                    
                        </div>
                        <div class="row">            
    
                                    <h4><u>Product Details:</u></h4>
									<?php
									$p=mysqli_query($connect,"select * from order_details where order_id='".$id."' group by prd_id");
									while($pp=mysqli_fetch_array($p))
									{
										$prd_id=$pp['prd_id'];
									?>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <form class="form-horizontal form-label-left">
                                    
										<?php	
                                            $at=mysqli_query($connect,"select * from order_details where order_id='".$id."' and prd_id='".$prd_id."' ");
                                            while($att=mysqli_fetch_array($at))
                                            {
												if($att['attribute']=='mrp')
												{
													$attribute='MRP(Rs)';
													$value=$att['value'];
													
												} elseif($att['attribute']=='affiliate_cost')
												{
													$attribute='Affiliate Cost(Rs)';
													$value=$att['value'];
													
												} elseif($att['attribute']=='discount')
												{
													$attribute='Discount(Rs)';
													$value=$att['value'];
													
												} elseif($att['attribute']=='quantity')
												{
													$attribute='Quantity';
													$value=$att['value'];
													
												} elseif($att['attribute']=='ammount')
												{
													$attribute='Ammount(Rs)';
													$value=$att['value'];
													
												} elseif($att['attribute']=='shipping_cost')
												{
													$attribute='Shipping Cost(Rs)';
													$value=$att['value'];
													
												} else
												{
													$attribute=$att['attribute'];
													
													$attr_val=mysqli_fetch_array(mysqli_query($connect,"select * from attribute where id='".$att['value']."' "));
													$value=$attr_val['title'];
												}
                                        ?>
                                        
                                        <?php if($attribute!='affiliate') { ?>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><?php echo $attribute;?></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12 blank_box"><?php echo $value;?></div>
                                            </div>
                                         <?php } ?>  
                                           
                                            
                                            
                                        <?php } ?>
                                        
                                        	
                                        
                                    </form>
                                    
                               		</div>
                                    
                                    <?php } ?>
                       </div>
<?php 
	require_once('includes/frontend_block.php');
?>