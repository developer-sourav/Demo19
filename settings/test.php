<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Preconet Dashboard</title>

        <link rel="shortcut icon" type="image/png" href="http://conglomerateweb.com/preconetadmin/ptadmin/assets/images/favicon.png">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://conglomerateweb.com/preconetadmin/ptadmin/assets/css/main-style.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
        
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
        <script src="http://conglomerateweb.com/preconetadmin/ptadmin/assets/js/jquery.min.js"></script>
		<link rel="stylesheet" href="http://conglomerateweb.com/preconetadmin/ptadmin/assets/js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
		<script src="http://conglomerateweb.com/preconetadmin/ptadmin/assets/js/fancybox/jquery.fancybox.pack.js"></script>


  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



		
		<script>
      	$(".fancybox").fancybox({
    		autoPlay:false,
    		showControls:true
    	});
    	
    	</script>
	
</head>

<body>

	<header>
            <div id="sticker">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-6">
                            <div class="form-row">
                                <div class="col-3 hidedesktop">
                                    <a href="#" class="menu-toggle btn btn-theme-transparent"><i class="fas fa-bars"></i></a>
                                </div>
                                <div class="col-9">
                                    <div class="logo">
                                        <a href="http://conglomerateweb.com/preconetadmin/ptadmin/">
                                            <img src="http://conglomerateweb.com/preconetadmin/ptadmin/assets/images/logo.png" alt="logo">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-6">
                            <div class="header-info-rightside">
                                <ul class="header-nav">
                                    <li class="dropdown">
                                        <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="far fa-bell"></i><span class="badge badge-danger">2</span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item d-flex pb-2" href="#"> 
                                                <div class="fs-16 text-success mr-2"> 
                                                    <i class="far fa-thumbs-up"></i>
                                                </div> 
                                                <div class="notif-item"> 
                                                    Someone likes our posts. 
                                                </div> 
                                            </a>
                                            <a class="dropdown-item d-flex pb-2" href="#"> 
                                                <div class="fs-16 text-primary mr-2"> 
                                                    <i class="far fa-comment-dots"></i> 
                                                </div> 
                                                <div class="notif-item"> 
                                                    3 New Comments. 
                                                </div> 
                                            </a>
                                            <a class="dropdown-item d-flex pb-2" href="#"> 
                                                <div class="fs-16 text-danger mr-2"> 
                                                    <i class="fas fa-cogs"></i> 
                                                </div> 
                                                <div class="notif-item"> 
                                                    Server Rebooted
                                                </div> 
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item text-center text-sm">View all Notifications</a>
                                        </div>
                                    </li>
                                    <li class="dropdown">
                                        <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="far fa-envelope"></i><span class="badge badge-danger">4</span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item d-flex pb-2" href="#"> 
                                                <span class="avatar avatar-md brround mr-2 align-self-center cover-image" data-image-src="http://conglomerateweb.com/preconetadmin/ptadmin/assets/images/placeholder-img.jpg" style="background: url(&quot;assets/images/placeholder-img.jpg&quot;) center center;"></span> 
                                                <div class="mail-notif"> <strong>Madeleine</strong> Hey! there I' am available.... 
                                                    <div class="small text-muted"> 3 hours ago </div> 
                                                </div> 
                                            </a>
                                            <a class="dropdown-item d-flex pb-2" href="#"> 
                                                <span class="avatar avatar-md brround mr-2 align-self-center cover-image" data-image-src="http://conglomerateweb.com/preconetadmin/ptadmin/assets/images/placeholder-img.jpg" style="background: url(&quot;assets/images/placeholder-img.jpg&quot;) center center;"></span> 
                                                <div class="mail-notif"> <strong>Madeleine</strong> Hey! there I' am available.... 
                                                    <div class="small text-muted"> 3 hours ago </div> 
                                                </div> 
                                            </a>
                                            <a class="dropdown-item d-flex pb-2" href="#"> 
                                                <span class="avatar avatar-md brround mr-2 align-self-center cover-image" data-image-src="http://conglomerateweb.com/preconetadmin/ptadmin/assets/images/placeholder-img.jpg" style="background: url(&quot;assets/images/placeholder-img.jpg&quot;) center center;"></span> 
                                                <div class="mail-notif"> <strong>Madeleine</strong> Hey! there I' am available.... 
                                                    <div class="small text-muted"> 3 hours ago </div> 
                                                </div> 
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item text-center text-sm">See all Messages</a>
                                        </div>
                                    </li>
                                    <li class="dropdown">
                                        <a class="btn profile-li dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <div class="profile-thumb">
                                                <img src="http://conglomerateweb.com/preconetadmin/ptadmin/assets/images/placeholder-img.jpg" alt="profile">
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right account-drop" aria-labelledby="dropdownMenuLink">
                                            <div class="drop-heading"> 
                                                <div class="text-center"> 
                                                    <h5 class="text-dark mb-0">Preconet</h5> 
                                                    <small class="text-muted">Administrator</small> 
                                                </div> 
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="http://conglomerateweb.com/preconetadmin/ptadmin/dashboard"> <i class="fas fa-user mr-2 fa-fw"></i> Dashboard </a>
                                            <a class="dropdown-item" href="http://conglomerateweb.com/preconetadmin/ptadmin/site-details"> <i class="fas fa-cogs mr-2 fa-fw"></i> Settings </a>
                                            <!--<a class="dropdown-item" href="#"> <i class="far fa-comment-alt mr-2 fa-fw"></i> Inbox </a>-->
                                            <div class="dropdown-divider mt-0"></div>
                                            <!--<a class="dropdown-item" href="#"> <i class="far fa-compass mr-2 fa-fw"></i> Need help? </a>-->
                                            <a class="dropdown-item" href="http://conglomerateweb.com/preconetadmin/ptadmin/logout"> <i class="fas fa-sign-out-alt mr-2 fa-fw"></i> Sign out </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main main-nav justify-content-center">
                <div class="container">
                    <nav class="navigation closed clearfix">
                        <a href="#" class="menu-toggle-close btn"><i class="fas fa-times"></i></a>
                        <ul class="nav sf-menu">  
                        	<li>
                                <a href="http://conglomerateweb.com/preconetadmin/ptadmin/dashboard"><i class="fas fa-home mr-2"></i>Dashboard</a>
                                <ul>
                                    <li><a href="http://conglomerateweb.com/preconetadmin/ptadmin/site-details">Site Details</a></li>
                                    <li><a href="http://conglomerateweb.com/preconetadmin/ptadmin/cms">CMS</a></li>
                                    <li><a href="http://conglomerateweb.com/preconetadmin/ptadmin/faq">FAQ</a></li>
                                    <li><a href="http://conglomerateweb.com/preconetadmin/ptadmin/enquiry">Enquiry</a></li>
                                </ul>
                            </li> 
                                                            
                            <li><a href="#"><i class="fas fa-photo-video mr-2"></i>Media</a>
                            	<ul>
                                    <li><a href="http://conglomerateweb.com/preconetadmin/ptadmin/banner">Banner</a></li>
                                    <li><a href="http://conglomerateweb.com/preconetadmin/ptadmin/gallery">Gallery</a></li>
                                </ul>
                            </li>
                            <li><a href="http://conglomerateweb.com/preconetadmin/ptadmin/news"><i class="fas fa-th-list mr-2"></i>News</a></li>
                            <li><a href="http://conglomerateweb.com/preconetadmin/ptadmin/testimonial"><i class="fas fa-chart-area mr-2"></i>Testimonials</a></li>
                            <li><a href="#"><i class="fas fa-align-left mr-2"></i>Products</a>
                            	<ul>
                                    <li><a href="http://conglomerateweb.com/preconetadmin/ptadmin/product">All Product</a></li>
                                    <li><a href="http://conglomerateweb.com/preconetadmin/ptadmin/category">Category</a></li>
                            
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-wpforms mr-2"></i>Trips</a>
                                <ul>
                                    <li><a href="http://conglomerateweb.com/preconetadmin/ptadmin/trips">All Trip</a></li>
                                    <li><a href="http://conglomerateweb.com/preconetadmin/ptadmin/trip-type">Trip Type</a></li>
                                    <li><a href="http://conglomerateweb.com/preconetadmin/ptadmin/trip-category">Trip Category</a></li>
                                </ul>
                            </li>    
                            <li><a href="http://conglomerateweb.com/preconetadmin/ptadmin/booking"><i class="fas fa-desktop mr-2"></i>Booking</a></li>
                            <li><a href="#"><i class="fas fa-cogs mr-2"></i>Members</a>
                            	<ul>
                                    <li><a href="http://conglomerateweb.com/preconetadmin/ptadmin/subadmin">Sub Admin</a></li>
                                    <li><a href="http://conglomerateweb.com/preconetadmin/ptadmin/users">Users</a></li>
                                    <li><a href="http://conglomerateweb.com/preconetadmin/ptadmin/logout">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        
        
        <main>


        
            
            
            
            
             
<div class="container">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-9">
                           <h1 class="page-title">ADD Trip</h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="http://conglomerateweb.com/preconetadmin/ptadmin/">Home</a></li>
                                <li class="breadcrumb-item"><a href="http://conglomerateweb.com/preconetadmin/ptadmin/trips">Trip</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> ADD Trip</li>
                            </ol>
                        </div>
                        <div class="col-md-3 pageheader-btn">
                            
                            
                        </div>
                    </div>
                </div>
            </div>

            <section class="form-section">
                <div class="container">
                    <div class="form-section-container">
                        <div class="form-section-header">
                            <h3>Trip</h3>
                        </div>





           
                            
                	 
                    
                	  

		                               
                <div class="row">
                            <div class="col-md-8 offset-md-2">
                
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
												                                                    		<option  value="1">Winter Tour</option>
                                                            
                                                           
                                                                                                     		<option  value="2">Summer Tour</option>
                                                            
                                                           
                                                                                                     		<option  value="3">Office Tour</option>
                                                            
                                                           
                                                 
                                                </select>
                                        </div></div> 
                                     
                                    
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Featured Image</label>
                                        <div class="col-sm-10">
                                    <input type="file" name="img"> 
                                    </div></div>
                                    
                                    
                                    
                                      
                                      
                                     
                                    
                                     <div class="col-md-3 col-sm-6 col-xs-12 form-row" id="all_tasks_cnt4">
                                    
                                            <div class=" each_task_bx ">
                                                <div class="task_head col-sm-12 col-xs-12">Itinerary </div>
                                                <input type="hidden" name="property_title[]" value="">
                                                
                                                 <div class="col-xs-12" style="margin-top:10px; border-bottom:1px solid #ccc">
                                                      <input type="text" name="property_name[]" class="form-control" placeholder="Name">
                                                 
                                                      <input type="text" name="property_value[]" class="form-control" placeholder="Value">
                                                  </div>
                                                 
                                                 
                                            </div>
                                                                                        
                                        </div>
                                            
                                    
                                    
                                   
                                     <div class="col-md-3 col-sm-6 col-xs-12 form-row" id="all_tasks_cnt5">
                                    
                                            <div class=" each_task_bx ">
                                                <div class="task_head col-sm-12 col-xs-12">Cancellation Policies </div>
                                                <input type="hidden" name="feature_title1[]" value="">
                                                
                                                 <div class="form-row" style="margin-top:10px;">
                                                      <input type="text" name="feature1[]" class="form-control" placeholder="Cancellation Policies">
                                                  </div>
                                                 
                                                 
                                            </div>
                                                                                        
                                        </div>
                                        
                                             
                                            
                                       <div class="col-md-3 col-sm-6 col-xs-12 form-row" id="all_tasks_cnt2">
                                    
                                                <div class=" each_task_bx ">
                                                    <div class="task_head col-sm-12 col-xs-12">Payments Policies </div>
                                                    <input type="hidden" name="feature_title[]" value="">
                                                    
                                                     <div class="form-row" style="margin-top:10px;">
                                                                 <input type="text" name="feature[]" class="form-control" placeholder="Payments Policies">
                                                        </div>
                                                     
                                                     
                                                </div>
                                    		                                            	
											</div>
                                            
                                            
                                            
                                            
                                       
                                  
                                        
                                        
                                            
                                       <div class="col-md-3 col-sm-6 col-xs-12 form-row" id="all_tasks_cnt3">
                                    
                                                <div class="each_task_bx ">
                                                    <div class="task_head col-sm-12 col-xs-12"> Gallery  </div>
                                                    
                                                    <input type="hidden" name="gallery_title[]" value="">
                                                    
                                                     <div class="col-md-12 col-sm-12 col-xs-12 form-row">
                                                        <label style="text-align:left;"  class="control-label col-md-12 col-sm-12 col-xs-12 text-left" >Image</label>
                                                    
                                                        <div class="col-sm-12 col-xs-12 ">
                                                                 <input type="file" name="p_img[]">
                                                         </div>
                                                     </div> 
                                                     
                                                     
                                                </div>
                                    		                                            	
											</div>
                                            
                                         
                                                
                                    	                                            	
                                            
                                        <div class="form-row col-md-12">
                                            <div class="col-md-12 col-sm-12 col-xs-12 ">
                                            	
                                                <button value="Submit" name="add-submit" type="submit" onclick=" $('#txtEditor').val($('.Editor-editor').html());" class="btn btn-success pull-right submit_bttn">Submit</button>
                                                
                                                <a onClick="javascript:void(0)" id="add_task_bttn3"  type="button" class="btn btn-primary pull-right">Add another image</a>
                                                
                                                <a onClick="javascript:void(0)" id="add_task_bttn2"  type="button" class="btn btn-primary pull-right">Add another payments policies</a>
                                                 <a onClick="javascript:void(0)" id="add_task_bttn5"  type="button" class="btn btn-primary pull-right">Add cancellation policies</a>
                                                <a onClick="javascript:void(0)" id="add_task_bttn4"  type="button" class="btn btn-primary pull-right">Add another itinerary</a>
                                               
                                              
 
                                               
                                            </div>
                                        </div>

                                    </form>
                                

                            </div>
                        </div>
                    </div>
                </div>
            </section>    



<div id="task_row_format3" style="display:none;">
    <div class="each_task_bx3 ">
       
       <div class="col-md-11 col-sm-11 col-xs-11" style="margin-top:10px;">
       
                <div class="col-md-12 col-sm-12 col-xs-12 form-row">
                    <label style="text-align:left;"  class="control-label col-md-12 col-sm-12 col-xs-12 text-left" >Image</label>
                	<input type="hidden" name="gallery_title[]" value="">
                    <div class="col-sm-12 col-xs-12">
                             <input type="file" name="p_img[]">
                     </div>
                 </div> 
     
     	</div>
        <div class="col-md-1 col-sm-1 col-xs-1 list_cross" style="margin-top:20px;"><a class="remove_tsk3"><i class="fa fa-times" aria-hidden="true"></i></a></div>
     
         
         
    </div>
</div>  


<div id="task_row_format4" style="display:none;">
    <div class="each_task_bx4">
        
        <div class="col-md-11 col-sm-11 col-xs-11" style="margin-top:10px; border-bottom:1px solid #ccc">
        <input type="hidden" name="property_title[]" value="">
             <div class="col-xs-12">
                  <input type="text" name="property_name[]" class="form-control" placeholder="Name">
             
                  <input type="text" name="property_value[]" class="form-control" placeholder="Value">
              </div>
         </div>
        <div class="col-md-1 col-sm-1 col-xs-1 list_cross" style="margin-top:5px;"><a class="remove_tsk4"><i class="fa fa-times" aria-hidden="true"></i></a></div>
     

         
    </div>
</div>

<div id="task_row_format5" style="display:none;">
    <div class=" each_task_bx5 ">
        
        <div class="col-md-11 col-sm-11 col-xs-11" style="margin-top:10px;">
        <input type="hidden" name="feature_title1[]" value="">
             <div class="col-sm-12 col-xs-12 ">
                     <input type="text" name="feature1[]"  class="form-control" placeholder="Cancellation Policies">
             </div>
         </div>
        <div class="col-md-1 col-sm-1 col-xs-1 list_cross" style="margin-top:5px;"><a class="remove_tsk5"><i class="fa fa-times" aria-hidden="true"></i></a></div>
     

         
    </div>
</div>


<div id="task_row_format2" style="display:none;">
    <div class=" each_task_bx2 ">
        
        <div class="col-md-11 col-sm-11 col-xs-11" style="margin-top:10px;">
        <input type="hidden" name="feature_title[]" value="">
            <div class="col-sm-12 col-xs-12 ">
                     <input type="text" name="feature[]"  class="form-control" placeholder="Payments Policies">
             </div>
         </div>
        <div class="col-md-1 col-sm-1 col-xs-1 list_cross" style="margin-top:5px;"><a class="remove_tsk2"><i class="fa fa-times" aria-hidden="true"></i></a></div>
     

         
    </div>
</div>


                                            
                                            
                                            
                                            

<script type="text/javascript" src="js/tinymce_4.6.4/js/tinymce/tinymce.min.js"></script>
    
<script type="text/javascript" src="js/parsley/parsley.min.js"></script>    

<script src="js/nicescroll/jquery.nicescroll.min.js"></script>

</main>
        <footer>
            <div class="container">
                <p>Copyright &copy; 2019 | <a href="https://preconetindia.com" target="_blank">Preconet Technologies</a>. All Rights Reserved.</p>
            </div>
        </footer>
		<script src="https://cdn.ckeditor.com/4.7.1/full/ckeditor.js"></script>
    <script>      
        CKEDITOR.replace( 'summernote' );
CKEDITOR.replace( 'summernote1' );
CKEDITOR.replace( 'summernote2' );
CKEDITOR.replace( 'summernote3' );
    </script>
       
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" async defer></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" async defer></script>
		<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script src="http://conglomerateweb.com/preconetadmin/ptadmin/assets/js/main.js" async defer></script>

        <script src="http://conglomerateweb.com/preconetadmin/ptadmin/assets/js/customm.js"></script>

	</body>

</html>



        
         <script src="<?php echo $admin_url; ?>/js/customm.js"></script>
