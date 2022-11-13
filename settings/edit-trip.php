<?php require_once('includes/sidebar-menu.php'); 

$product_id=$_REQUEST['trip-id'];




if($_REQUEST['action']=='image_delete')
{
	$id=$_REQUEST['image_id'];	

	$q=mysqli_fetch_assoc(mysqli_query($connect,"select * from trip_gallery where id=".$id));
	unlink('media/trip/'.$q['t_img']);

	mysqli_query($connect,"delete from trip_gallery where id=".$id);

	echo"<script>alert('Image removed successfully.')</script>";
	echo '<script language="javascript">location.href="'.$admin_url.'edit-trip?trip-id='.$product_id.'"</script>'; 
}


if($_REQUEST['action']=='policy_delete')
{
	
	mysqli_query($connect,"delete from trip_pay_policy where id='".$_REQUEST['policy_id']."' ");

	echo"<script>alert('Payment Policy removed successfully.')</script>";
	echo '<script language="javascript">location.href="'.$admin_url.'edit-trip?trip-id='.$product_id.'"</script>'; 
}

if($_REQUEST['action']=='cancel_delete')
{
	
	mysqli_query($connect,"delete from trip_cancel_policy where id='".$_REQUEST['cancel_id']."' ");

	echo"<script>alert('Cancellation Policy removed successfully.')</script>";
	echo '<script language="javascript">location.href="'.$admin_url.'edit-trip?trip-id='.$product_id.'"</script>'; 
}


if($_REQUEST['action']=='itinerary_delete')
{
	
	mysqli_query($connect,"delete from trip_feature where id='".$_REQUEST['itinerary_id']."' ");

	echo"<script>alert('Itinerary removed successfully.')</script>";
	echo '<script language="javascript">location.href="'.$admin_url.'edit-trip?trip-id='.$product_id.'"</script>'; 
}





if(isset($_POST['add-submit']))
{
	 
				$img=$_FILES['img']['name'];

				$array = explode('.', $img);
				if(end($array)!='')
				{
					$img_name = time().'f.'.end($array);
				
					$q=mysqli_fetch_assoc(mysqli_query($connect,"select * from trips where id='".$product_id."' "));
					unlink('media/trip/'.$q['img']);
	
					$u="Update trips SET img='".$img_name."' where id=".$product_id;
					mysqli_query($connect,$u);
							 
					move_uploaded_file($_FILES["img"]["tmp_name"],"media/trip/".$img_name);
				}
			
			
				$q='UPDATE  `trips` SET
				`title`="'.$_POST['title'].'",
				`descc`="'.$_POST['descc'].'",
				`forr`="'.$_POST['forr'].'",
				`pr`="'.$_POST['pr'].'",
				`pnt`="'.$_POST['pnt'].'",
				`category`="'.$_POST['category'].'",
				`trip_type`="'.$_POST['trip_type'].'",
				`e_dt`="'.$_POST['e_dt'].'",
				`s_dt`="'.$_POST['s_dt'].'",
				`terms`="'.str_replace("'","@@@",$_POST['terms']).'",
				`policy`="'.str_replace("'","@@@",$_POST['policy']).'"
				Where id="'.$product_id.'" 
				'; 
				
				if (mysqli_query($connect,$q)) {
							
							
							
							$rt2=0;
							foreach($_POST['t_title'] as $t2)	
							{
								$qt2="
									INSERT INTO `trip_gallery` SET					
									`t_id` = '".$product_id."',
								";
								
								
								$image = $_FILES['t_img']['name'][$rt2];
								$img_name = time().'_'.$image;
								
								move_uploaded_file($_FILES["t_img"]["tmp_name"][$rt2],"media/trip/". $img_name);
									
								
		
								$qt2.="`t_img`='".$img_name."'";
								
								if($image!='')
								{
									mysqli_query($connect,$qt2);
								}
								$rt2++;
								
							}	
							
							
							
				//	mysqli_query($connect,"delete from trip_feature where t_id='".$product_id."' ");
				//	mysqli_query($connect,"delete from trip_pay_policy where t_id='".$product_id."' ");
				//	mysqli_query($connect,"delete from trip_cancel_policy where t_id='".$product_id."' ");
					
							//Payments Policies
							$rt3=0;
							foreach($_POST['pay_title'] as $t3)	
							{
								$qt3='
									INSERT INTO `trip_pay_policy` SET					
									`t_id` = "'.$product_id.'",
								';
								
								
								if($_POST['t_policy'][$rt3]!='')
								{
									$qt3.='
										`t_policy`="'.$_POST['t_policy'][$rt3].'",
									';
								}
								
		
								$qt3.='`pay_title`="'.$t3.'"';
												
								mysqli_query($connect,$qt3);
								
								$rt3++;
								
							}
					
							//Cancellation Policies
							$rt33=0;
							foreach($_POST['cancel_title'] as $t33)	
							{
								$qt33='
									INSERT INTO `trip_cancel_policy` SET					
									`t_id` = "'.$product_id.'",
								';
								
								
								if($_POST['cancel_policy'][$rt33]!='')
								{
									$qt33.='
										`cancel_policy`="'.$_POST['cancel_policy'][$rt33].'",
									';
								}
								
		
								$qt33.='`cancel_title`="'.$t33.'"';
												
								mysqli_query($connect,$qt33);
								
								$rt33++;
								
							}
							
							
							//Itinerary
							$rt4=0;
							foreach($_POST['itinerary_title'] as $t4)	
							{
								$qt4='
									INSERT INTO `trip_feature` SET					
									`t_id` = "'.$product_id.'",
								';
								
								
								if($_POST['itinerary_name'][$rt4]!='')
								{
									$qt4.='
										`itinerary_name`="'.$_POST['itinerary_name'][$rt4].'",
									';
								}
								if($_POST['itinerary_value'][$rt4]!='')
								{
									$qt4.='
										`itinerary_value`="'.$_POST['itinerary_value'][$rt4].'",
									';
								}
		
								$qt4.='`itinerary_title`="'.$t4.'"';
												
								mysqli_query($connect,$qt4);
								
								$rt4++;
								
							}
		
					
					
							
							
							
							
					$_SESSION['success_msg']="Trip update successfully.";
		
					
				} else {
					$_SESSION['error_msg']="Error Occured. Please try again.";
				}
				
	
	
}
?>


            <div class="right_col" role="main">
                <div class="">
                
<?php
$product_dets=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM trips where id='".$product_id."' "));
?>                
  
 
 					<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Trips</h5></div>
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo $admin_url;?>">Dashboard</a></li>
                        <li><a href="<?php echo $admin_url;?>trips">Trips</a></li>
						<li class="active"><span>Edit Trip</span></li>
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
                    
                    
<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i>Edit Data</h6>
												<hr class="light-grey-hr"/>
						                               
                                	<form method="post" enctype="multipart/form-data">
                                    
                                    
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Title*</label>
                                        <div class="col-sm-10">
                                           
                                             <input type="text" name="title" required class="form-control" value="<?php echo $product_dets['title'];?>">
                                    </div></div>
                                    
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Price*</label>
                                        <div class="col-sm-10">
                                           
                                             <input type="text" name="pr" class="form-control" required value="<?php echo $product_dets['pr'];?>">
                                    </div></div>
                                   
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Start/End Point</label>
                                        <div class="col-sm-10">
                                            
                                             <input type="text" name="pnt" class="form-control" value="<?php echo $product_dets['pnt'];?>">
                                    </div></div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">For(days)</label>
                                        <div class="col-sm-10">
                                            
                                             <input type="text" name="forr" class="form-control" value="<?php echo $product_dets['forr'];?>">
                                    </div></div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Starting</label>
                                        <div class="col-sm-10">
                                            
                                             <input type="text" name="s_dt" class="form-control" value="<?php echo $product_dets['s_dt'];?>">
                                    </div></div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Duration</label>
                                        <div class="col-sm-10">
                                           
                                             <input type="text" name="e_dt" class="form-control" value="<?php echo $product_dets['e_dt'];?>">
                                    </div></div>
                                    
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">About this Trip</label>
                                        <div class="col-sm-10">
                                          
                                            <textarea name="descc" id="summernote"><?php echo $product_dets['descc'];?></textarea>
                                                
                                    </div></div>
                                    
                                  <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Terms</label>
                                        <div class="col-sm-10">
                                           
                                            <textarea name="terms" class="form-control" rows="4"><?php echo str_replace("@@@","'",$product_dets['terms']);?></textarea>
                                                
                                    </div></div>  
                                        
                                        
                                            
                                   <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-10">
                                           
                                            <textarea name="policy" class="form-control" rows="4" ><?php echo str_replace("@@@","'",$product_dets['policy']);?></textarea>
                                                
                                    </div></div> 
                                     
                                        
                                        
                                   
                                    
                                   
                                    
                                    
                                   
                                   <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
                                        <div class="col-sm-10">
                                            
											<select class="form-control col-md-7 col-xs-12" name="category" >
                                                	<option value="">Select</option>
												<?php
													$re=mysqli_query($connect,"select * from trip_category where status=1");
													while($res=mysqli_fetch_array($re))
													{
												?>
                                                    		<option  value="<?php echo $res['id'];?>" <?php if($res['id']==$product_dets['category']) { ?> selected="selected" <?php } ?>><?php echo $res['title'];?></option>
                                                            
                                                           
                                                 <?php } ?>

                                                </select>
                                        </div></div> 
                                     
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Trip Type</label>
                                        <div class="col-sm-10">
                                            
											<select class="form-control col-md-7 col-xs-12" name="trip_type" >
                                                	<option value="">Select</option>
												<?php
													$ree=mysqli_query($connect,"select * from trip_type where status=1");
													while($ress=mysqli_fetch_array($ree))
													{
												?>
                                                    		<option  value="<?php echo $ress['id'];?>" <?php if($ress['id']==$product_dets['trip_type']) { ?> selected="selected" <?php } ?>><?php echo $ress['title'];?></option>
                                                            
                                                           
                                                 <?php } ?>

                                                </select>
                                        </div></div>
                                        
                                        
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Featured Image</label>
                                        <div class="col-sm-10">
                                   
                                       <?php if($product_dets['img']!='') { ?> <a href="<?php echo $admin_url.'/media/trip/'.$product_dets['img']; ?>"><img src="<?php echo $admin_url.'/media/trip/'.$product_dets['img']; ?>" width="50"  /></a> <?php } ?> <input type="file" name="img"> 
                                    </div></div>
                                    
                                    
                                    <div class="loop_div">  
                                    
                                    <div class="form-group row" id="all_tasks_cnt4">
                                    			
                                                <div class="each_task">
                                                    <div class="task_head col-sm-12 col-xs-12">Itinerary</div>
                                                    
                                                    
                                                <?php 
												
                                                $q4="SELECT * from trip_feature where t_id='".$product_id."' order by id";
												
                                                $task_res4=mysqli_query($connect,$q4);
                                                
                                                $wt4=0;
                                                while($trow4=mysqli_fetch_array($task_res4))
                                                {
                                               ?> 
                                                    
                                                    <div class="div_col-11">
                                                    
                                                         <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:10px;">
                                                         
                                                             <div class="div_row_half">
                                                                  <input type="text" readonly class="form-control" value="<?php echo $trow4['itinerary_name']; ?>" >
                                                              </div>
                                                             <div class="div_row_half">
                                                                  <input type="text" readonly class="form-control" value="<?php echo $trow4['itinerary_value']; ?>" >
                                                              </div>
                                                      
                                                             
                                                             
                                                         </div>
                                                     
                                                    </div>
                                                     
                                                    <div class="div_col-1 list_cross" style="margin-top:10px;"><a href="<?php echo $admin_url; ?>/edit-trip.php?trip-id=<?php echo $product_id; ?>&action=itinerary_delete&itinerary_id=<?php echo $trow4['id']; ?>"><i class="fa remove_cross">&#xf00d;</i></a></div>
                                                    
                                                   <?php
											   $wt4++;
												}
											   ?>    
                                                     
                                                </div>
                                    		                                           	
											</div>
                                    
                                    <div class="form-group row">
                                           <a onClick="javascript:void(0)" id="add_task_bttn4"  type="button" class="btn btn-primary">Add another itinerary</a>
                                    </div> 
                                    
                                    
                                    
                                    <div class="form-group row" id="all_tasks_cnt5">
                                    			
                                                <div class="each_task">
                                                    <div class="task_head col-sm-12 col-xs-12">Cancellation Policies</div>
                                                    
                                                    
                                                <?php 
												
                                               $q5="SELECT * from trip_cancel_policy where t_id='".$product_id."' order by id";
												
                                                $task_res5=mysqli_query($connect,$q5);
                                               
                                                $wt5=0;
                                                while($trow5=mysqli_fetch_array($task_res5))
                                                {
                                               ?> 
                                                    
                                                    
                                                    
                                                     <div class="div_row">
                                                     
                                                     <div class="div_col-11">
    
                                                                     <input type="text" readonly class="form-control" value="<?php echo $trow5['cancel_policy']; ?>" >
                                                     
                                                    </div>
                                                    
                                                    
                                                    <div class="div_col-1 list_cross" ><a href="<?php echo $admin_url; ?>/edit-trip.php?trip-id=<?php echo $product_id; ?>&action=cancel_delete&cancel_id=<?php echo $trow5['id']; ?>"><i class="fa remove_cross">&#xf00d;</i></a></div>
                                                    </div>
                                                    
                                                   <?php
											   $wt5++;
												}
											   ?>    
                                                     
                                                </div>
                                    		                                           	
											</div>
                                            
                                         <div class="form-group row">
                                            <a onClick="javascript:void(0)" id="add_task_bttn5"  type="button" class="btn btn-primary">Add cancellation policies</a>
                                    </div>     
                                            
                                    
                                    <div class="form-group row" id="all_tasks_cnt2">
                                    			
                                                <div class="each_task">
                                                    <div class="task_head col-sm-12 col-xs-12">Payments Policies</div>
                                                    
                                                    
                                                <?php 
												$q2="SELECT * from trip_pay_policy where t_id='".$product_id."' order by id";
												
                                                $task_res2=mysqli_query($connect,$q2);
                                                
                                                $wt2=0;
                                                while($trow2=mysqli_fetch_array($task_res2))
                                                {
                                               ?> 
                                                   
                                                     <div class="div_row">
                                                     
                                                     <div class="div_col-11">
    
                                                                     <input type="text" readonly class="form-control" value="<?php echo $trow2['t_policy']; ?>" >
                                                    </div>
                                                     
                                                    <div class="div_col-1 list_cross"><a href="<?php echo $admin_url; ?>/edit-trip.php?trip-id=<?php echo $product_id; ?>&action=policy_delete&policy_id=<?php echo $trow2['id']; ?>"><i class="fa remove_cross">&#xf00d;</i></a></div>
                                                    </div>
                                                   <?php
											   $wt2++;
												}
											   ?>    
                                                     
                                                </div>
                                    		                                           	
											</div>
                                            
                                         <div class="form-group row">
                                            <a onClick="javascript:void(0)" id="add_task_bttn2"  type="button" class="btn btn-primary">Add another payments policies</a>
                                    </div>      
                                            
                                   
                                        
                                    
                                    
                                     <div class="form-group row" id="all_tasks_cnt3">
                                    			
                                                <div class="each_task">
                                                    <div class="task_head col-sm-12 col-xs-12">Gallery</div>
                                                    
                                                    
                                                <?php 
                                                $q3="SELECT * from trip_gallery where t_id='".$product_id."' order by id";
                                                $task_res3=mysqli_query($connect,$q3);
                                                
                                                $wt3=0;
                                                while($trow3=mysqli_fetch_array($task_res3))
                                                {
                                               ?> 
                                                    <input type="hidden" value="<?php echo $trow3['id']; ?>">
                                                    
                                                     <div class="div_col-11">
                                                                 <?php if($trow3['t_img']!='') { ?>
                                                                 <img src="<?php echo $admin_url.'/media/trip/'.$trow3['t_img']; ?>" width="50" />
                                                                 <?php  } ?>
                                                     </div>
                                                     <div class="div_col-1 list_cross"><a href="<?php echo $admin_url; ?>/edit-trip.php?trip-id=<?php echo $product_id; ?>&action=image_delete&image_id=<?php echo $trow3['id']; ?>"><i class="fa remove_cross">&#xf00d;</i></a></div>
                                                    
                                                   <?php
											   $wt3++;
												}
											   ?>    
                                                     
                                                </div>
                                    		                                           	
											</div>  
                                            
                                     <div class="form-group row">
                                            <a onClick="javascript:void(0)" id="add_task_bttn3"  type="button" class="btn btn-primary">Add another image</a>
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




<div id="task_row_format3" style="display:none;">
    <div class="each_task_bx3 ">
       
                	<input type="hidden" name="t_title[]" value="">
                    <div class="div_col-11" >
                             <input type="file" name="t_img[]">
                     </div>
                 <div class="div_col-1 list_cross remove_tsk3"><i class="fa remove_cross">&#xf00d;</i></div>
     
         
         
    </div>
</div>  


<div id="task_row_format4" style="display:none;">
    <div class="each_task_bx4">
        
       <div class="div_border"></div>
        <div class="div_col-11" >
            <input type="hidden" name="itinerary_title[]" value="">
             <div class="div_row_half">
                  <input type="text" name="itinerary_name[]" class="form-control" placeholder="Name">
             </div>
             <div class="div_row_half">
                  <input type="text" name="itinerary_value[]" class="form-control" placeholder="Value">
              </div>
         </div>
        <div class="div_col-1 list_cross remove_tsk4"><i class="fa remove_cross">&#xf00d;</i></div>
        

         
    </div>
</div>

<div id="task_row_format5" style="display:none;">
    <div class=" each_task_bx5 ">
        
        <input type="hidden" name="cancel_title[]" value="">
         <div class="div_col-11" >
                     <input type="text" name="cancel_policy[]"  class="form-control" placeholder="Cancellation Policies">
         </div>
        <div class="div_col-1 list_cross remove_tsk5"><i class="fa remove_cross">&#xf00d;</i></div>
     

         
    </div>
</div>


<div id="task_row_format2" style="display:none;">
    <div class=" each_task_bx2 ">
        
        <input type="hidden" name="pay_title[]" value="">
            <div class="div_col-11" >
                     <input type="text" name="t_policy[]"  class="form-control" placeholder="Payments Policies">
             </div>
        <div class="div_col-1 list_cross remove_tsk2"><i class="fa remove_cross">&#xf00d;</i></div>
     

         
    </div>
</div>
 

<?php 
	require_once('includes/frontend_block.php');
?>
