<?php require_once('includes/sidebar-menu.php');



if(isset($_POST['add-submit']))
{
    $prd_cnt=mysqli_fetch_array(mysqli_query($connect,"select count(*) as cnt from trips where title='".$_POST['title']."' "));
	if($prd_cnt['cnt']>0){
	    $seo=strtolower(str_replace(' ','-',$_POST['title'])).$prd_cnt['cnt'];
	} else {
	    $seo=strtolower(str_replace(' ','-',$_POST['title']));
	}
	
			
			
	$img=$_FILES['img']['name']; 

	$array = explode('.', $img);
	if(end($array)=='')
	{
		$img_name = '';
	}
	else
	{
		$img_name = time().'f.'.end($array);
	}
	
	move_uploaded_file($_FILES["img"]["tmp_name"],"media/trip/".$img_name);
	
                                                        	
	 $q='INSERT INTO `trips` SET
				`title`="'.$_POST['title'].'",
				`seo`="'.$seo.'",
				`descc`="'.$_POST['descc'].'",
				`forr`="'.$_POST['forr'].'",
				`pr`="'.$_POST['pr'].'",
				`pnt`="'.$_POST['pnt'].'",
				`category`="'.$_POST['category'].'",
				`trip_type`="'.$_POST['trip_type'].'",
				`e_dt`="'.$_POST['e_dt'].'",
				`s_dt`="'.$_POST['s_dt'].'",
				`terms`="'.str_replace("'","@@@",$_POST['terms']).'",
				`policy`="'.str_replace("'","@@@",$_POST['policy']).'",
				`dt`="'.date('d-m-Y').'",
				`status`=1, 
				img="'.$img_name.'"
				'; 
				

				
						if (mysqli_query($connect,$q)) {
							$product_id = mysqli_insert_id($connect);
		 
		
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
							
							
							
							
							
							
							
							
							
	
						$_SESSION['success_msg']="Trip added successfully.";
							
							
						} else {
							$_SESSION['error_msg']="Error Occured. Please try again.";
						}
				
	
	
}


?>


					<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Trips</h5></div>
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo $admin_url;?>">Dashboard</a></li>
                        <li><a href="<?php echo $admin_url;?>trips">Trips</a></li>
						<li class="active"><span>Add Trip</span></li>
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

		                               
<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i>Add Data</h6>
												<hr class="light-grey-hr"/>
                
                               <form method="post" enctype="multipart/form-data">
									
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Title*</label>
                                        <div class="col-sm-10">
                                           
                                             <input type="text" name="title" required class="form-control">
                                    </div></div>
                                    
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Price*</label>
                                        <div class="col-sm-10">
                                           
                                             <input type="text" name="pr" class="form-control" required >
                                    </div></div>
                                   
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Start/End Point</label>
                                        <div class="col-sm-10">
                                            
                                             <input type="text" name="pnt" class="form-control">
                                    </div></div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">For(days)</label>
                                        <div class="col-sm-10">
                                            
                                             <input type="text" name="forr" class="form-control">
                                    </div></div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Starting</label>
                                        <div class="col-sm-10">
                                            
                                             <input type="text" name="s_dt" class="form-control">
                                    </div></div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Duration</label>
                                        <div class="col-sm-10">
                                           
                                             <input type="text" name="e_dt" class="form-control">
                                    </div></div>
                                    
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">About this Trip</label>
                                        <div class="col-sm-10">
                                          
                                            <textarea name="descc" id="summernote"></textarea>
                                                
                                    </div></div>
                                    
                                  <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Terms</label>
                                        <div class="col-sm-10">
                                           
                                            <textarea name="terms" class="form-control" rows="4"></textarea>
                                                
                                    </div></div>  
                                        
                                        
                                            
                                   <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-10">
                                           
                                            <textarea name="policy" class="form-control" rows="4" ></textarea>
                                                
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
                                                    		<option  value="<?php echo $res['id'];?>"><?php echo $res['title'];?></option>
                                                            
                                                           
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
                                                    		<option  value="<?php echo $ress['id'];?>"><?php echo $ress['title'];?></option>
                                                            
                                                           
                                                 <?php } ?>

                                                </select>
                                        </div></div> 
                                        
                                    
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Featured Image</label>
                                        <div class="col-sm-10">
                                    <input type="file" name="img"> 
                                    </div></div>
                                    
                                    
                                    
                                      
                                      
                                   <div class="loop_div">  
                                    
                                     <div class="form-group row" id="all_tasks_cnt4">
                                    
                                            <div class=" each_task_bx ">
                                                <div class="task_head col-sm-12 col-xs-12">Itinerary </div>
                                                <input type="hidden" name="itinerary_title[]" value="">
                                                
                                                 <div class="div_row_half">
                                                      <input type="text" name="itinerary_name[]" class="form-control" placeholder="Name">
                                                 </div>
                                                 <div class="div_row_half">
                                                      <input type="text" name="itinerary_value[]" class="form-control" placeholder="Value">
                                                  </div>
                                                 
                                                 
                                            </div>
                                                                                        
                                        </div>
                                            
                                    <div class="form-group row">
                                           <a onClick="javascript:void(0)" id="add_task_bttn4"  type="button" class="btn btn-primary">Add another itinerary</a>
                                    </div> 
                                    
                                   
                                     <div class="form-group row" id="all_tasks_cnt5">
                                    
                                            <div class=" each_task_bx ">
                                                <div class="task_head col-sm-12 col-xs-12">Cancellation Policies </div>
                                                <input type="hidden" name="cancel_title[]" value="">
                                                
                                                 <div class="div_row">
                                                      <input type="text" name="cancel_policy[]" class="form-control" placeholder="Cancellation Policies">
                                                  </div>
                                                 
                                                 
                                            </div>
                                                                                        
                                        </div>
                                        <div class="form-group row">
                                            <a onClick="javascript:void(0)" id="add_task_bttn5"  type="button" class="btn btn-primary">Add cancellation policies</a>
                                    </div>  
                                             
                                            
                                       <div class="form-group row" id="all_tasks_cnt2">
                                    
                                                <div class=" each_task_bx ">
                                                    <div class="task_head col-sm-12 col-xs-12">Payments Policies </div>
                                                    <input type="hidden" name="pay_title[]" value="">
                                                    
                                                     <div class="div_row">
                                                                 <input type="text" name="t_policy[]" class="form-control" placeholder="Payments Policies">
                                                        </div>
                                                     
                                                     
                                                </div>
                                    		                                            	
											</div>
                                            
                                         <div class="form-group row">
                                            <a onClick="javascript:void(0)" id="add_task_bttn2"  type="button" class="btn btn-primary">Add another payments policies</a>
                                    </div>   
                                            
                                            
                                       
                                  
                                        
                                        
                                            
                                       <div class="form-group row" id="all_tasks_cnt3">
                                    
                                                <div class="each_task_bx ">
                                                    <div class="task_head col-sm-12 col-xs-12"> Gallery  </div>
                                                    
                                                    <input type="hidden" name="t_title[]" value="">
                                                    
                                                     <div class="div_row">
                                                                 <input type="file" name="t_img[]">
                                                        
                                                     </div> 
                                                     
                                                     
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

