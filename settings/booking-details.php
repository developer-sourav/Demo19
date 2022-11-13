<?php require_once('includes/sidebar-menu.php');
$id=$_REQUEST['bookingid'];
$q=mysqli_fetch_array(mysqli_query($connect,"select * from booking where id='".$id."' "));
?>


					<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Booking Details</h5></div>
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo $admin_url;?>">Dashboard</a></li>
                        <li><a href="<?php echo $admin_url;?>booking">Booking</a></li>
						<li class="active"><span>Booking Details</span></li>
                       </ol>
					</div>
				</div>

					

					<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Booking Details</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">



                               		
                               		
                               		
                            <div class="col-md-4 blk_div">
                                
                                <div class="ttl">Booking Details</div>
                                <div class="blk">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Booking ID</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="<?php echo $q['booking_id'];?>" readonly>
                                        </div>
                                    </div>
                                   <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Date From</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="<?php echo $q['dt_from'];?>" readonly>
                                        </div>
                                   </div>
									
									<div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Date To</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="<?php echo $q['dt_to'];?>" readonly>
                                        </div>
                                   </div>
                                   <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Booking Date</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="<?php echo $q['dt'];?>" readonly>
                                        </div>
                                   </div>
									
                               </div>
                                    
                                
                            </div>
                            
                            <div class="col-md-4 blk_div">
                                
                                <div class="ttl">Customer Details</div>
                                <div class="blk">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="<?php echo $q['fname'];?>" readonly>
                                        </div>
                                    </div>
                                   <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Phone No</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="<?php echo $q['phone'];?>" readonly>
                                        </div>
                                   </div>
									
									<div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Email Id</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="<?php echo $q['email'];?>" readonly>
                                        </div>
                                   </div>
                                   <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Message</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" readonly><?php echo $q['msg'];?></textarea>
                                        </div>
                                   </div>
									
                               </div>

                            </div>
                            
                            <div class="col-md-4 blk_div">
                                
                                <div class="ttl">Payment Details</div>
                                <div class="blk">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Ammount(Rs)</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="<?php echo $q['price'];?>" readonly>
                                        </div>
                                    </div>
                                   <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Tax(Rs)</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="<?php echo $q['tax'];?>" readonly>
                                        </div>
                                   </div>
									
									<div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Total(Rs)</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="<?php echo $q['total'];?>" readonly>
                                        </div>
                                   </div>
                                   <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Payment Status</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="<?php if($q['payment_status']==1)
											 { echo 'Complete'; } else { echo 'Incomplete'; }?>" readonly>
                                        </div>
                                   </div>
									
                               </div>
                            </div>
                            
                            
                        
                            
                            
                            <div class="ttl">Room Details</div>
                            
                            
						<table id="edit_datable_2" class="table table-hover display mb-30" >
                        <thead>
                            <tr>
                                <th># </th>
                                <th>Room </th>
                                <th>Adult</th>
                                <th>Child </th>
                                 <th>Baby</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
								
								$i=0;
                                $q=mysqli_query($connect,"Select * from booking_details where b_id='".$id."'");
								while($row=mysqli_fetch_array($q))
								{
									$i++;
								$pkg=mysqli_fetch_array(mysqli_query($connect,"select * from trips where id='".$row['package']."' "));
	
								?>
								
								<tr>
                                        <td><?php echo $i; ?></td>
                                        <td><a href="<?php echo $admin_url.'edit-trip?trip-id='.$pkg['id'];?>"><?php echo $pkg['title']; ?></a></td>
                                        <td><?php echo $row['adult']; ?></td>
										<td><?php echo $row['child']; ?></td>
										<td><?php echo $row['baby']; ?></td>
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

   

<?php 
	require_once('includes/frontend_block.php');
?>
