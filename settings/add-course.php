<?php require_once('includes/sidebar-menu.php'); 

$a=explode('.',basename($_SERVER['PHP_SELF']));
$tn=ltrim($a[0],"add-");
$ct=$tn.'category';
$fn=ucfirst(str_replace('-',' ',$tn));

if(isset($_POST['add-submit']))
{
	$title=$_POST['title'];
	$link=$_POST['link'];
	$body=$_POST['body'];
	$dt=$_POST['dt'];
	$category=$_POST['category'];
	$seo=strtolower(str_replace(' ','-',$_POST['title']));
	$img=$_FILES['img']['name'];
			
			$array = explode('.', $img);
			if(end($array)=='')
			{
				$img_name = '';
			}
			else
			{
				$img_name = time().'.'.end($array);
			}
	
			if($img!='')
			{
				move_uploaded_file($_FILES["img"]["tmp_name"],"media/".$tn."/".$img_name);
			}				
         $q="Insert into $tn SET seo='".$seo."',title='".$title."',link='".$link."',category='".$category."', body='".$body."',dt='".$dt."',img='".$img_name."',status=1 ";
			
			if(mysqli_query($connect,$q))
			{
				$product_id = mysqli_insert_id($connect);
							
							$rt4=0;
							foreach($_POST['itinerary_title'] as $t4)	
							{
								$qt4='
									INSERT INTO `course_feature` SET					
									`c_id` = "'.$product_id.'",
								';
								
								
								if($_POST['itinerary_name'][$rt4]!='')
								{
									$qt4.='
										`c_name`="'.$_POST['itinerary_name'][$rt4].'",
									';
								}
								if($_POST['itinerary_value'][$rt4]!='')
								{
									$qt4.='
										`c_value`="'.$_POST['itinerary_value'][$rt4].'",
									';
								}
		
								$qt4.='`c_title`="'.$t4.'"';
												
								mysqli_query($connect,$qt4);
								
								$rt4++;
								
							}
				
				$_SESSION['success_msg']="Added successfully";
				unset($_POST);
			}
			else
			{
				$_SESSION['error_msg']="Error occured. Try Later.";
			}
}
?>



 





					<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark"><?php echo $fn;?></h5></div>
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo $admin_url;?>">Dashboard</a></li>
                        <li><a href="<?php echo $admin_url.$tn;?>"><?php echo $fn;?></a></li>
						<li class="active"><span>Add <?php echo $fn;?></span></li>
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
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title" class="form-control" required  placeholder="Title">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Book Now Link</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title" class="form-control" required  placeholder="Link">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
                                        <div class="col-sm-10">
                                            
											<select class="form-control col-md-7 col-xs-12" name="category" >
                                                	<option value="">Select</option>
												<?php
													$re=mysqli_query($connect,"select * from $ct where status=1");
													while($res=mysqli_fetch_array($re))
													{
												?>
                                                    		<option  value="<?php echo $res['id'];?>"><?php echo $res['title'];?></option>
                                                            
                                                           
                                                 <?php } ?>

                                                </select>
                                        </div></div>
                                        
                                        
                                   <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Date</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="dt" class="form-control" id="datepicker"  placeholder="Date">
                                        </div>
                                   </div>
									
									<div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="img" class="form-control" id="inputPass word3" Required placeholder="Chose Image">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Body</label>
                                        <div class="col-sm-10">
                                           <textarea id="summernote" name="body"></textarea>
                                        </div>
                                    </div>
                                    <div class="loop_div">
									<div class="form-group row" id="all_tasks_cnt4">
                                    
                                            <div class=" each_task_bx ">
                                                 <label for="inputEmail3" class="col-sm-2 col-form-label">Faq</label>
 
                                            </div>
                                                                                        
                                        </div>
                                            
                                    <div class="form-group row">
                                           <a onClick="javascript:void(0)" id="add_task_bttn4"  type="button" class="btn btn-primary">Add Faq</a>
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
<div id="task_row_format4" style="display:none;">
    <div class="each_task_bx4">
        
       <div class="div_border"></div>

        <div class="div_col-11" >
		<div class="col-sm-2"></div>
            <input type="hidden" name="itinerary_title[]" value="">
             <div class="col-sm-10">
			 <div class="div_row">
                  <input type="text" name="itinerary_name[]" class="form-control" placeholder="Title">
             </div>
             <div class="div_row">
                  <textarea name="itinerary_value[]" rows="3" class="form-control" placeholder="Body"></textarea>
              </div>
              </div>
         </div>
        <div class="div_col-1 list_cross remove_tsk4"><i class="fa remove_cross">&#xf00d;</i></div>
        

         
    </div>
</div>					
<?php 
	require_once('includes/frontend_block.php');
?>