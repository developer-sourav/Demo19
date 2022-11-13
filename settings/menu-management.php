<?php require_once('includes/sidebar-menu.php'); 

$url=$admin_url.'menu-management?menu='.$_GET['menu'];
if(strstr($_SERVER['REQUEST_URI'],'&parent=') && strstr($_SERVER['REQUEST_URI'],'&sub='))
{
	$a="update menu_management set sub='".$_GET['sub']."' where id='".$_GET['parent']."' ";
	
	if(mysqli_query($connect,$a))
	{
	?>
	<script>
		  $(document).ready(function(){
        swal({   
			title: "Update Successfully!",   
             type: "success", 
			confirmButtonColor: "#469408",   
        },
  function(){
    window.location.href = '<?php echo $url;?>';
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
    window.location.href = '<?php echo $url;?>';
});
		return false;

});	
</script>		
<?php }
}


?>

<style>
.sub_mnu{
	padding-left:10px;
}
</style>
 
 
 <div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Menu Management</h5>  
                            
					</div>
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo $admin_url;?>">Dashboard</a></li>
						<li class="active"><span>Menu Management</span></li>
					  </ol>
					</div>
				</div>
                
                
                
            

<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							
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
                                

                               
						<?php 
						$aa="Select * from site_details where `id`=1 ";
						$bb=mysqli_query($connect,$aa);
						$row=mysqli_fetch_assoc($bb); ?>                                
                           
                           <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i>Menu Management</h6>
												<hr class="light-grey-hr"/>
                                                
                           <form method="post" enctype="multipart/form-data">
							
                            <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Select menu</label>
                                        <div class="col-sm-10">
                                            
											<select class="form-control col-md-7 col-xs-12 select_location" name="menu_name" required onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                                	<option value="">Select</option>
                                                    <option  value="<?php echo $admin_url.'menu-management?menu=1'; ?>" <?php if($_GET['menu']==1) { ?> selected="selected" <?php } ?>>Main Menu</option>
                                                    <option  value="<?php echo $admin_url.'menu-management?menu=2'; ?>" <?php if($_GET['menu']==2) { ?> selected="selected" <?php } ?>>Top Menu</option>
                                                    <option  value="<?php echo $admin_url.'menu-management?menu=3'; ?>" <?php if($_GET['menu']==3) { ?> selected="selected" <?php } ?>>Footer Menu(Column 1)</option>
                                                    <option  value="<?php echo $admin_url.'menu-management?menu=4'; ?>" <?php if($_GET['menu']==4) { ?> selected="selected" <?php } ?>>Footer Menu(Column 2)</option>
                                                    <option  value="<?php echo $admin_url.'menu-management?menu=5'; ?>" <?php if($_GET['menu']==5) { ?> selected="selected" <?php } ?>>Footer Menu(Column 3)</option>
                                                    <option  value="<?php echo $admin_url.'menu-management?menu=6'; ?>" <?php if($_GET['menu']==6) { ?> selected="selected" <?php } ?>>Footer Menu(Column 4)</option>
                                                     <?php if($_SESSION['user_level']==1) { ?>
                                                     <option  value="<?php echo $admin_url.'menu-management?menu=7'; ?>" <?php if($_GET['menu']==7) { ?> selected="selected" <?php } ?>>Admin Menu</option>
                                                     <?php } ?>
                                                           

                                                </select>
                                        </div></div>  
                                        
                            <div class="row">
                                <div class="col-md-4">
                                
                                <?php if($_GET['menu']==7) { ?>
                                	 <div class="form-group">
                                         <input type="checkbox" name="a_dashboard" value="1"> Dashboard
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" name="a_menu" value="1"> Menu
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="checkbox" name="a_cms" value="1"> Pages
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="checkbox" name="a_blog" value="1"> Post
                                    </div>
                                    <div class="form-group sub_mnu">
                                        -- <input type="checkbox" name="a_all_blog" value="1"> All Post
                                    </div>
                                    <div class="form-group sub_mnu">
                                        -- <input type="checkbox" name="a_blog_category" value="1"> Post Category
                                    </div>
                                    
                                    <div class="form-group">
                                       <input type="checkbox" name="a_faq" value="1"> FAQ
                                    </div>
                                    <div class="form-group">
                                         <input type="checkbox" name="a_media" value="1"> Media
                                    </div>
                                    
                                    <div class="form-group sub_mnu">
                                        -- <input type="checkbox" name="a_banner" value="1"> Banner
                                    </div>
                                    
                                    <div class="form-group sub_mnu">
                                        -- <input type="checkbox" name="a_gallery" value="1"> Gallery
                                    </div>
                                    <div class="form-group">
                                         <input type="checkbox" name="a_news" value="1"> News
                                    </div>
                                    <div class="form-group">
                                         <input type="checkbox" name="a_testimonial" value="1"> Testimonial
                                    </div>
                                    
                                    
                                     <div class="form-group">
                                         <input type="checkbox" name="a_products" value="1"> Products
                                    </div>
                                    
                                    <div class="form-group sub_mnu">
                                        -- <input type="checkbox" name="a_all_product" value="1"> All Product
                                    </div>
                                    
                                    <div class="form-group sub_mnu">
                                        -- <input type="checkbox" name="a_category" value="1"> Category
                                    </div>
                                    
                                    <div class="form-group">
                                         <input type="checkbox" name="a_trips" value="1"> Trips
                                    </div>
                                    
                                    <div class="form-group sub_mnu">
                                        -- <input type="checkbox" name="a_all_trip" value="1"> All Trip
                                    </div>
                                    <div class="form-group sub_mnu">
                                        -- <input type="checkbox" name="a_trip_type" value="1"> Trip Type
                                    </div>
                                    <div class="form-group sub_mnu">
                                        -- <input type="checkbox" name="a_trip_category" value="1"> Trip Category
                                    </div>
                                    <div class="form-group sub_mnu">
                                        -- <input type="checkbox" name="a_booking" value="1"> Booking
                                    </div>
                                    <div class="form-group">
                                       <input type="checkbox" name="a_enquiry" value="1"> Enquiry
                                    </div>
                                     <div class="form-group">
                                         <input type="checkbox" name="a_members" value="1"> Members
                                    </div>
                                    
                                    <div class="form-group sub_mnu">
                                        -- <input type="checkbox" name="a_sub_admin" value="1"> Sub Admin
                                    </div>
                                    
                                    <div class="form-group sub_mnu">
                                        -- <input type="checkbox" name="a_users" value="1"> Users
                                    </div>
                                     <div class="form-group sub_mnu">
                                        -- <input type="checkbox" name="a_changepassword" value="1"> Change Password
                                    </div>
                                    <div class="form-group sub_mnu">
                                        -- <input type="checkbox" name="a_logout" value="1"> Logout
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="checkbox" name="a_site_details" value="1"> Site Details
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                   
                                    
                                    
                                    
                                   
                                    
                                <?php } elseif($_GET['menu']>0) {
								
									$pst=mysqli_query($connect,"Select * from post_type  where status=1");
									while($post=mysqli_fetch_array($pst))
									{
								?>
                                    <div class="form-group">
                                        <?php echo $post['title'];?> <input type="text" name="<?php echo $post['seo'];?>" placeholder="Order" class="order_box">
                                    </div>
                                    
                                    <?php }
									$aa=mysqli_query($connect,"select * from cms where parent=0 and status=1");
									while($bb=mysqli_fetch_array($aa)) {?>
                                    <div class="form-group">
                                        <?php echo $bb['title'];?> <input type="text" name="<?php echo 'cms_'.$bb['id'];?>" placeholder="Order" class="order_box">
                                    </div>
                                    
										<?php $aaa=mysqli_query($connect,"select * from cms where parent='".$bb['id']."' and status=1");
                                        while($bbb=mysqli_fetch_array($aaa)) {?>
                                        <div class="form-group">
                                           --- <?php echo $bbb['title'];?> <input type="text" name="<?php echo 'cms_'.$bbb['id'];?>" placeholder="Order" class="order_box">
                                        </div>
                                        <?php } ?>
                                    
                                    <?php } ?>
                                    
                                  <?php } ?>
                                  </div>
                                <div class="col-md-4">&nbsp;</div>
                                
                                <div class="col-md-4">
                                
                                <?php if($_GET['menu']==7) { ?>
                                
                               		<?php if($a_dashboard['orderr']==1) { ?>
                                	<div class="form-group">
                                         <strong>Dashboard</strong>
                                    </div>
                                     <?php } if($a_menu['orderr']==1) { ?>
                                    
                                    <div class="form-group">
                                        <strong>Menu</strong>
                                    </div>
                                     <?php } if($a_cms['orderr']==1) { ?>
                                   
                                    <div class="form-group">
                                        <strong>Pages</strong>
                                    </div>
                                    <?php } if($a_blog['orderr']==1) { ?>
                                    
                                    <div class="form-group">
                                        <strong>Post</strong>
                                    </div>
                                    <?php } if($a_all_blog['orderr']==1) { ?>
                                   
                                    <div class="form-group sub_mnu">
                                        -- All Post
                                    </div>
                                    <?php } if($a_blog_category['orderr']==1) { ?>
                                    <div class="form-group sub_mnu">
                                        -- Post Category
                                    </div>
                                    <?php } if($a_faq['orderr']==1) { ?>
                                    
                                    <div class="form-group">
                                        <strong>FAQ</strong>
                                    </div>
                                    
                                     <?php } if($a_media['orderr']==1) { ?>
                                   
                                    <div class="form-group">
                                         <strong>Media</strong>
                                    </div>
                                    <?php } if($a_banner['orderr']==1) { ?>
                                    
                                    <div class="form-group sub_mnu">
                                        -- Banner
                                    </div>
                                    <?php } if($a_gallery['orderr']==1) { ?>
                                    
                                    <div class="form-group sub_mnu">
                                        -- Gallery
                                    </div>
                                    <?php } if($a_news['orderr']==1) { ?>
                                    
                                    <div class="form-group">
                                         <strong>News</strong>
                                    </div>
                                     <?php } if($a_testimonial['orderr']==1) { ?>
                                   <div class="form-group">
                                         <strong>Testimonial</strong>
                                    </div>
                                    <?php } if($a_products['orderr']==1) { ?>
                                    <div class="form-group">
                                         <strong>Products</strong>
                                    </div>
                                    <?php } if($a_all_product['orderr']==1) { ?>
                                    
                                    <div class="form-group sub_mnu">
                                        -- All Product
                                    </div>
                                    <?php } if($a_category['orderr']==1) { ?>
                                    
                                    <div class="form-group sub_mnu">
                                        -- Category
                                    </div>
                                     <?php } if($a_trips['orderr']==1) { ?>
                                   
                                    <div class="form-group">
                                         <strong>Trips</strong>
                                    </div>
                                     <?php } if($a_all_trip['orderr']==1) { ?>
                                   
                                    <div class="form-group sub_mnu">
                                        -- All Trip
                                    </div>
                                    <?php } if($a_trip_type['orderr']==1) { ?>
                                    <div class="form-group sub_mnu">
                                        -- Trip Type
                                    </div>
                                     <?php } if($a_trip_category['orderr']==1) { ?>
                                   <div class="form-group sub_mnu">
                                        -- Trip Category
                                    </div>
                                    <?php } if($a_booking['orderr']==1) { ?>
                                    <div class="form-group sub_mnu">
                                        -- Booking
                                    </div>
                                    <?php } if($a_enquiry['orderr']==1) { ?>
                                    
                                    <div class="form-group">
                                        <strong>Enquiry</strong>
                                    </div>
                                    <?php } if($a_members['orderr']==1) { ?>
                                   
                                    <div class="form-group">
                                         <strong>Members</strong>
                                    </div>
                                    <?php } if($a_sub_admin['orderr']==1) { ?>
                                    
                                    <div class="form-group sub_mnu">
                                        -- Sub Admin
                                    </div>
                                     <?php } if($a_users['orderr']==1) { ?>
                                   
                                    <div class="form-group sub_mnu">
                                        -- Users
                                    </div>
                                     <?php } if($a_changepassword['orderr']==1) { ?>
                                   
                                    <div class="form-group sub_mnu">
                                        -- Change Password
                                    </div>
                                    <?php } if($a_logout['orderr']==1) { ?>
                                   
                                    <div class="form-group sub_mnu">
                                        -- Logout
                                    </div>
                                    <?php } if($a_site_details['orderr']==1) { ?>
                                    <div class="form-group">
                                        <strong>Site Details</strong>
                                    </div>
                                   
                                     
                                     <?php } ?>
                                   
                                
                               <?php } else  {
									$cc=mysqli_query($connect,"select * from menu_management where menu_name='".$menu_name."' order by orderr");
									while($dd=mysqli_fetch_array($cc)) {
										if(strstr($dd['title'],'cms_')) {
											$rr=explode('_',$dd['title']);
											$cms=mysqli_fetch_array(mysqli_query($connect,"select * from cms where id='".$rr[1]."' "));
											$title=$cms['title'];
										} else {
											$title=$dd['title'];
										}
									?>
                                    <div class="form-group menum_list">
                                       <div class="col-md-6"> <?php echo $title;?></div>
                                       
                                       <?php 
									   $chk_pp=mysqli_fetch_array(mysqli_query($connect,"select * from post_type where title='".$title."' "));
									   $sub_select=mysqli_fetch_array(mysqli_query($connect,"select * from menu_management where title='".$title."' "));
									   
									   if($chk_pp['id']==4 || $chk_pp['id']>9 ) { ?> 
                                       		<div class="col-md-6"> 
                                            
                                            <select class="form-control col-md-7 col-xs-12 select_location" name="menu_name" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                                	<option value="<?php echo $admin_url.'menu-management?menu='.$_REQUEST['menu'].'&parent='.$dd['id'].'&sub=0'; ?>">Select Sub-Menu</option>
                                                    <option  value="<?php echo $admin_url.'menu-management?menu='.$_REQUEST['menu'].'&parent='.$dd['id'].'&sub=1'; ?>" <?php if($sub_select['sub']==1) { ?>selected<?php } ?>>All Categoy</option>
                                                    <option  value="<?php echo $admin_url.'menu-management?menu='.$_REQUEST['menu'].'&parent='.$dd['id'].'&sub=2'; ?>" <?php if($sub_select['sub']==2) { ?>selected<?php } ?>>All <?php echo $title;?> </option>
                                                </select>
                                           </div>
                                        <?php } else { echo '&nbsp;'; }?>
                                    </div>
										
                                    <?php } } ?>
                                </div>
                                
                                 <?php if($_GET['menu']>0) {?>
                                <div class="col-md-12">
                                    <div class="form-group text-center mt-3 mb-0">
                                         <button class="btn btn-success btn-icon left-icon mr-10 pull-left" name="add-submit" type="submit"> <i class="fa fa-check"></i> <span>save</span></button>
                                    </div>
                                </div>
                                <?php } ?>
                                
                            </div>
                        </form>
                               
                               
                     </div>	
								</div>	
							</div>	
						</div>	
					</div>
				</div>      
    

<?php 
	require_once('includes/frontend_block.php');
?>