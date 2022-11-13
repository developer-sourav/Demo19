<?php require_once('config/config.php');
if($_SESSION['user_level']<1)
{
	echo '<script language="javascript">location.href="'.$admin_url.'login"</script>';
}

$q=mysqli_fetch_array(mysqli_query($connect,"select * from site_details"));
if($q['logo']=='') { $img=$admin_url.'assets/images/logo.png'; }
else { $img=$admin_url.'media/logo/'.$q['logo']; }

if($q['fav']=='') { $fav=$admin_url.'assets/images/favicon.png'; }
else { $fav=$admin_url.'media/logo/'.$q['fav']; }

$menu_name=$_GET['menu'];

if(isset($_POST['add-submit']))
{
    
    
    
    $aaa=mysqli_query($connect,"select * from menu_management where menu_name='".$menu_name."'");
	while($bbb=mysqli_fetch_array($aaa)) {
		mysqli_query($connect,"delete from menu_management where id='".$bbb['id']."' "); 
	}
	
	/*mysqli_query($connect,"delete from menu_management where menu_name='".$menu_name."' ");
	if($_POST['home']>0) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='Home',orderr='".$_POST['home']."' ");
	}
	if($_POST['news']>0) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='News',orderr='".$_POST['news']."' ");
	}
	if($_POST['testimonial']>0) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='Testimonial',orderr='".$_POST['testimonial']."' ");
	}
	if($_POST['product']>0) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='Product',orderr='".$_POST['product']."' ");
	}
	if($_POST['gallery']>0) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='Gallery',orderr='".$_POST['gallery']."' ");
	}
	if($_POST['contact']>0) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='Contact Us',orderr='".$_POST['contact']."' ");
	}
	if($_POST['trips']>0) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='Trips',orderr='".$_POST['trips']."' ");
	}*/
	
	$pst1=mysqli_query($connect,"Select * from post_type  where status=1");
		while($post1=mysqli_fetch_array($pst1))
		{
			$nm=$post1['seo'];
			if($_POST[$nm]>0) {
				
				mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='".$post1['title']."',orderr='".$_POST[$nm]."' ");
	
			}
	    }
									
									
									
	$aa=mysqli_query($connect,"select * from cms where status=1");
	while($bb=mysqli_fetch_array($aa)) {
		$i=$bb['id'];
		if($_POST['cms_'.$i]>0) {
		    $j='cms_'.$i;
			mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='".$j."',orderr='".$_POST['cms_'.$i]."' ");
		}
	}
	


	if($_POST['a_dashboard']==1) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='a_dashboard',orderr=1 ");
	}
	if($_POST['a_site_details']==1) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='a_site_details',orderr=1 ");
	}
	if($_POST['a_menu']==1) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='a_menu',orderr=1 ");
	}
	if($_POST['a_cms']==1) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='a_cms',orderr=1 ");
	}
	if($_POST['a_faq']==1) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='a_faq',orderr=1 ");
	}
	if($_POST['a_enquiry']==1) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='a_enquiry',orderr=1 ");
	}
	if($_POST['a_media']==1) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='a_media',orderr=1 ");
	}
	if($_POST['a_banner']==1) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='a_banner',orderr=1 ");
	}
	if($_POST['a_gallery']==1) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='a_gallery',orderr=1 ");
	}
	if($_POST['a_news']==1) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='a_news',orderr=1 ");
	}
	if($_POST['a_testimonial']==1) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='a_testimonial',orderr=1 ");
	}	
    if($_POST['a_products']==1) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='a_products',orderr=1 ");
	}	
    if($_POST['a_all_product']==1) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='a_all_product',orderr=1 ");
	}	
    if($_POST['a_category']==1) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='a_category',orderr=1 ");
	}	
    if($_POST['a_trips']==1) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='a_trips',orderr=1 ");
	}	
    if($_POST['a_all_trip']==1) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='a_all_trip',orderr=1 ");
	}	
    if($_POST['a_trip_type']==1) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='a_trip_type',orderr=1 ");
	}	
    if($_POST['a_trip_category']==1) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='a_trip_category',orderr=1 ");
	}	
    if($_POST['a_booking']==1) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='a_booking',orderr=1 ");
	}	
    if($_POST['a_blog']==1) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='a_blog',orderr=1 ");
	}	
    if($_POST['a_all_blog']==1) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='a_all_blog',orderr=1 ");
	}	
    if($_POST['a_blog_category']==1) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='a_blog_category',orderr=1 ");
	}	
    if($_POST['a_members']==1) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='a_members',orderr=1 ");
	}    
    if($_POST['a_sub_admin']==1) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='a_sub_admin',orderr=1 ");
	}    
    if($_POST['a_users']==1) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='a_users',orderr=1 ");
	} 
	if($_POST['a_changepassword']==1) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='a_changepassword',orderr=1 ");
	}    
    if($_POST['a_logout']==1) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='a_logout',orderr=1 ");
	} 
    if($_POST['a_blog_category']==1) {
		mysqli_query($connect,"insert into menu_management set menu_name='".$menu_name."',title='a_blog_category',orderr=1 ");
	}	
					
	$_SESSION['success_msg']="Updated successfully";
			
	
			

}


$a_dashboard=mysqli_fetch_array(mysqli_query($connect,"select * from menu_management where menu_name=7 and title='a_dashboard'"));
$a_site_details=mysqli_fetch_array(mysqli_query($connect,"select * from menu_management where menu_name=7 and title='a_site_details'"));
$a_menu=mysqli_fetch_array(mysqli_query($connect,"select * from menu_management where menu_name=7 and title='a_menu'"));
$a_cms=mysqli_fetch_array(mysqli_query($connect,"select * from menu_management where menu_name=7 and title='a_cms'"));
$a_faq=mysqli_fetch_array(mysqli_query($connect,"select * from menu_management where menu_name=7 and title='a_faq'"));
$a_enquiry=mysqli_fetch_array(mysqli_query($connect,"select * from menu_management where menu_name=7 and title='a_enquiry'"));
$a_media=mysqli_fetch_array(mysqli_query($connect,"select * from menu_management where menu_name=7 and title='a_media'"));
$a_banner=mysqli_fetch_array(mysqli_query($connect,"select * from menu_management where menu_name=7 and title='a_banner'"));
$a_gallery=mysqli_fetch_array(mysqli_query($connect,"select * from menu_management where menu_name=7 and title='a_gallery'"));
$a_news=mysqli_fetch_array(mysqli_query($connect,"select * from menu_management where menu_name=7 and title='a_news'"));
$a_testimonial=mysqli_fetch_array(mysqli_query($connect,"select * from menu_management where menu_name=7 and title='a_testimonial'"));
$a_products=mysqli_fetch_array(mysqli_query($connect,"select * from menu_management where menu_name=7 and title='a_products'"));
$a_all_product=mysqli_fetch_array(mysqli_query($connect,"select * from menu_management where menu_name=7 and title='a_all_product'"));
$a_category=mysqli_fetch_array(mysqli_query($connect,"select * from menu_management where menu_name=7 and title='a_category'"));
$a_trips=mysqli_fetch_array(mysqli_query($connect,"select * from menu_management where menu_name=7 and title='a_trips'"));
$a_all_trip=mysqli_fetch_array(mysqli_query($connect,"select * from menu_management where menu_name=7 and title='a_all_trip'"));
$a_trip_type=mysqli_fetch_array(mysqli_query($connect,"select * from menu_management where menu_name=7 and title='a_trip_type'"));
$a_trip_category=mysqli_fetch_array(mysqli_query($connect,"select * from menu_management where menu_name=7 and title='a_trip_category'"));
$a_booking=mysqli_fetch_array(mysqli_query($connect,"select * from menu_management where menu_name=7 and title='a_booking'"));
$a_blog=mysqli_fetch_array(mysqli_query($connect,"select * from menu_management where menu_name=7 and title='a_blog'"));
$a_members=mysqli_fetch_array(mysqli_query($connect,"select * from menu_management where menu_name=7 and title='a_members'"));
$a_sub_admin=mysqli_fetch_array(mysqli_query($connect,"select * from menu_management where menu_name=7 and title='a_sub_admin'"));
$a_users=mysqli_fetch_array(mysqli_query($connect,"select * from menu_management where menu_name=7 and title='a_users'"));
$a_logout=mysqli_fetch_array(mysqli_query($connect,"select * from menu_management where menu_name=7 and title='a_logout'"));
$a_changepassword=mysqli_fetch_array(mysqli_query($connect,"select * from menu_management where menu_name=7 and title='a_changepassword'"));
$a_blog_category=mysqli_fetch_array(mysqli_query($connect,"select * from menu_management where menu_name=7 and title='a_blog_category'"));
$a_all_blog=mysqli_fetch_array(mysqli_query($connect,"select * from menu_management where menu_name=7 and title='a_all_blog'"));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Demo19 Dashboard</title>

        <link rel="shortcut icon" type="image/png" href="<?php echo $fav; ?>">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.0/morris.css" rel="stylesheet" type="text/css"/>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $admin_url; ?>dist/css/style.css" rel="stylesheet" type="text/css">
    
    <script src="<?php echo $admin_url; ?>dist/js/jquery.min.js"></script>
 		<link rel="stylesheet" href="<?php echo $admin_url; ?>dist/js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
		<script src="<?php echo $admin_url; ?>dist/js/fancybox/jquery.fancybox.pack.js"></script>
         
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
  
   		<link href="<?php echo $admin_url; ?>vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
 
         
		<?php /*?><link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
<?php */?>
  
		<script>
      	$(".fancybox").fancybox({
    		autoPlay:false,
    		showControls:true
    	});
    	
    	$( function() {
             $( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' , minDate: 'Today'});
    	} );
    	</script>
	
    
    <?php /*?><script>
		  $(document).ready(function(){
	

        swal({   
			title: "Banner Deactive!",   
             type: "success", 
			text: "Lorem ipsum dolor sit amet",
			confirmButtonColor: "#469408",   
        });
		return false;


    
});	
	
	</script><?php */?>
</head>

<body>


    <div class="wrapper theme-1-active pimary-color-red">
		<!-- Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="mobile-only-brand pull-left">
				<div class="nav-header pull-left">
					<div class="logo-wrap">
						<a href="<?php echo $admin_url; ?>">
							<img class="brand-img" src="<?php echo $img; ?>" alt="brand"/>
						</a>
					</div>
				</div>	
				<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
				<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>				
			</div>
			<div id="mobile_only_nav" class="mobile-only-nav pull-right">
				<ul class="nav navbar-right top-nav pull-right">

                    <li style="margin-top:25px">Welcome <b style="font-weight:bold"><?php echo $_SESSION['fname'];?></b></li>
					<li class="dropdown auth-drp">
						<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="<?php echo $img; ?>" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
						<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
							<li>
								<a href="<?php echo $admin_url; ?>dashboard"><i class="zmdi zmdi-card"></i><span>Dashboard</span></a>
							</li>
							
							<li>
								<a href="<?php echo $admin_url; ?>site-details"><i class="zmdi zmdi-settings"></i><span>Settings</span></a>
							</li>
							
							<li class="divider"></li>
							<li>
								<a href="<?php echo $admin_url; ?>logout"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
							</li>
						</ul>
					</li>
				</ul>
			</div>	
		</nav>
		<!-- /Top Menu Items -->
		
		<!-- Left Sidebar Menu -->
		<div class="fixed-sidebar-left">
			<ul class="nav navbar-nav side-nav nicescroll-bar">
				<li class="navigation-header">
					<span>Main</span> 
					<i class="zmdi zmdi-more"></i>
				</li>
                
                 
                 <?php if($a_menu['orderr']==1  && $_SESSION['user_level']==1) { ?>
                 <li>
					<a <?php if(strstr($_SERVER['REQUEST_URI'],"/menu-management")) {?>class="active"<?php } ?> href="<?php echo $admin_url; ?>menu-management"><div class="pull-left"><i class="zmdi zmdi-apps mr-20"></i><span class="right-nav-text">Menu</span></div><div class="clearfix"></div></a>
                 </li>
                 <?php } if($a_cms['orderr']==1) { ?>
                 <li>
					<a <?php if(strstr($_SERVER['REQUEST_URI'],"/cms")) {?>class="active"<?php } ?> href="<?php echo $admin_url; ?>cms"><div class="pull-left"><i class="zmdi zmdi-google-pages mr-20"></i><span class="right-nav-text">Pages</span></div><div class="clearfix"></div></a>
                 </li>
                 <?php } if($a_blog['orderr']==1) { ?>  
                <li>
					<a <?php if(strstr($_SERVER['REQUEST_URI'],"/blog") || strstr($_SERVER['REQUEST_URI'],"/blog-category")) {?>class="active"<?php } ?> href="javascript:void(0);" data-toggle="collapse" data-target="#dropdown_dr_lv12"><div class="pull-left"><i class="zmdi zmdi-book mr-20"></i><span class="right-nav-text">Post</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="dropdown_dr_lv12" class="collapse collapse-level-1">
						<?php if($a_all_blog['orderr']==1) { ?><li><a href="<?php echo $admin_url; ?>blog" <?php if(strstr($_SERVER['REQUEST_URI'],"/blog")) { ?>class="active-page"<?php } ?>>All Post</a></li>
                        <?php } if($a_blog_category['orderr']==1) { ?><li><a href="<?php echo $admin_url; ?>blog-category" <?php if(strstr($_SERVER['REQUEST_URI'],"/blog-category")) { ?>class="active-page"<?php } ?>>Post Category</a></li><?php } ?>
					</ul>
				</li>
				<?php } 
				
					$pst=mysqli_query($connect,"Select * from post_type  where id>9 and status=1");
					while($post=mysqli_fetch_array($pst))
					{
				?>
                 <li>
					<a <?php if(strstr($_SERVER['REQUEST_URI'],"/".$post['seo']) || strstr($_SERVER['REQUEST_URI'],"/".$post['seo']."-category")) {?>class="active"<?php } ?> href="javascript:void(0);" data-toggle="collapse" data-target="#dropdown_<?php echo $post['seo'];?>"><div class="pull-left"><i class="zmdi zmdi-edit mr-20"></i><span class="right-nav-text"><?php echo $post['title'];?></span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="dropdown_<?php echo $post['seo'];?>" class="collapse collapse-level-1">
						<li><a href="<?php echo $admin_url.$post['seo']; ?>" <?php if(strstr($_SERVER['REQUEST_URI'],"/".$post['seo'])) { ?>class="active-page"<?php } ?>>All <?php echo $post['title'];?></a></li>
                        <li><a href="<?php echo $admin_url.$post['seo']; ?>-category" <?php if(strstr($_SERVER['REQUEST_URI'],"/".$post['seo']."-category")) { ?>class="active-page"<?php } ?>><?php echo $post['title'];?> Category</a></li>
					</ul>
				</li>

                 <?php } if($a_faq['orderr']==1) { ?>
                 <li>
					<a <?php if(strstr($_SERVER['REQUEST_URI'],"/faq")) {?>class="active"<?php } ?> href="<?php echo $admin_url; ?>faq"><div class="pull-left"><i class="zmdi zmdi-edit mr-20"></i><span class="right-nav-text">FAQs</span></div><div class="clearfix"></div></a>
                 </li>
                 <?php } if($a_media['orderr']==1) { ?> 
                <li>
					<a <?php if(strstr($_SERVER['REQUEST_URI'],"/banner") || strstr($_SERVER['REQUEST_URI'],"/gallery")) {?>class="active"<?php } ?>   href="javascript:void(0);" data-toggle="collapse" data-target="#ui_dr"><div class="pull-left"><i class="zmdi zmdi-smartphone-setup mr-20"></i><span class="right-nav-text">Media</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="ui_dr" class="collapse collapse-level-1 two-col-list">
						<?php if($a_banner['orderr']==1) { ?><li><a href="<?php echo $admin_url; ?>banner"  <?php if(strstr($_SERVER['REQUEST_URI'],"/banner")) { ?>class="active-page"<?php } ?>>Banner</a></li>
                        <?php } if($a_gallery['orderr']==1) { ?><li><a href="<?php echo $admin_url; ?>gallery"  <?php if(strstr($_SERVER['REQUEST_URI'],"/gallery")) { ?>class="active-page"<?php } ?>>Gallery</a></li><?php } ?>
					</ul>
				</li>
                 <?php } if($a_news['orderr']==1) { ?>
                 <li>
					<a <?php if(strstr($_SERVER['REQUEST_URI'],"/news")) {?>class="active"<?php } ?> href="<?php echo $admin_url; ?>news"><div class="pull-left"><i class="zmdi zmdi-map mr-20"></i><span class="right-nav-text">News</span></div><div class="clearfix"></div></a>
                 </li>
                 <?php } if($a_testimonial['orderr']==1) { ?>
                 <li>
					<a <?php if(strstr($_SERVER['REQUEST_URI'],"/testimonial")) {?>class="active"<?php } ?> href="<?php echo $admin_url; ?>testimonial"><div class="pull-left"><i class="zmdi zmdi-edit mr-20"></i><span class="right-nav-text">Testimonials</span></div><div class="clearfix"></div></a>
                 </li>
                 <?php } if($a_products['orderr']==1) { ?>
                
				<li>
				<a <?php if(strstr($_SERVER['REQUEST_URI'],"/product") || strstr($_SERVER['REQUEST_URI'],"/category")) {?>class="active"<?php } ?> href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Products</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="ecom_dr" class="collapse collapse-level-1">
						<?php if($a_all_product['orderr']==1) { ?><li><a href="<?php echo $admin_url; ?>product" <?php if(strstr($_SERVER['REQUEST_URI'],"/product")) { ?>class="active-page"<?php } ?>>All Product</a></li>
                        <?php } if($a_category['orderr']==1) { ?><li><a href="<?php echo $admin_url; ?>category" <?php if(strstr($_SERVER['REQUEST_URI'],"/category")) { ?>class="active-page"<?php } ?>>Category</a></li><?php } ?>
					</ul>
				</li>
                 <?php } if($a_trips['orderr']==1) { ?>
                <li>
					<a <?php if(strstr($_SERVER['REQUEST_URI'],"/trips") || strstr($_SERVER['REQUEST_URI'],"/trip-type") || strstr($_SERVER['REQUEST_URI'],"/trip-category") || strstr($_SERVER['REQUEST_URI'],"/booking")) {?>class="active"<?php } ?> href="javascript:void(0);" data-toggle="collapse" data-target="#dropdown_dr_lv1"><div class="pull-left"><i class="zmdi zmdi-filter-list mr-20"></i><span class="right-nav-text">Trips</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="dropdown_dr_lv1" class="collapse collapse-level-1">
						<?php if($a_all_trip['orderr']==1) { ?><li><a href="<?php echo $admin_url; ?>trips" <?php if(strstr($_SERVER['REQUEST_URI'],"/trips")) { ?>class="active-page"<?php } ?>>All Trip</a></li>
						<?php } if($a_trip_type['orderr']==1) { ?><li><a href="<?php echo $admin_url; ?>trip-type" <?php if(strstr($_SERVER['REQUEST_URI'],"/trip-type")) { ?>class="active-page"<?php } ?>>Trip Type</a></li>
                        <?php } if($a_trip_category['orderr']==1) { ?><li><a href="<?php echo $admin_url; ?>trip-category" <?php if(strstr($_SERVER['REQUEST_URI'],"/trip-category")) { ?>class="active-page"<?php } ?>>Trip Category</a></li>
                        <?php } if($a_booking['orderr']==1) { ?><li><a href="<?php echo $admin_url; ?>booking" <?php if(strstr($_SERVER['REQUEST_URI'],"/booking")) { ?>class="active-page"<?php } ?>>Booking</a></li><?php } ?>
					</ul>
				</li>
                 <?php } if($a_enquiry['orderr']==1) { ?>
                 <li>
					<a <?php if(strstr($_SERVER['REQUEST_URI'],"/enquiry")) {?>class="active"<?php } ?> href="<?php echo $admin_url; ?>enquiry"><div class="pull-left"><i class="zmdi zmdi-iridescent mr-20"></i><span class="right-nav-text">Enquires</span></div><div class="clearfix"></div></a>
                 </li>
                <?php } if($a_members['orderr']==1) { ?>  
                
                <li>
					<a <?php if(strstr($_SERVER['REQUEST_URI'],"/subadmin") || strstr($_SERVER['REQUEST_URI'],"/users") || strstr($_SERVER['REQUEST_URI'],"/change-password")) {?>class="active"<?php } ?> href="javascript:void(0);" data-toggle="collapse" data-target="#dropdown_dr_lv11"><div class="pull-left"><i class="zmdi zmdi-filter-list mr-20"></i><span class="right-nav-text">Members</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="dropdown_dr_lv11" class="collapse collapse-level-1">
						<?php if($a_sub_admin['orderr']==1 && $_SESSION['user_level']==1) { ?><li><a href="<?php echo $admin_url; ?>subadmin" <?php if(strstr($_SERVER['REQUEST_URI'],"/subadmin")) { ?>class="active-page"<?php } ?>>Sub Admin</a></li>
						<?php } if($a_users['orderr']==1) { ?><li><a href="<?php echo $admin_url; ?>users" <?php if(strstr($_SERVER['REQUEST_URI'],"/users")) { ?>class="active-page"<?php } ?>>Users</a></li>
                        <?php } if($a_changepassword['orderr']==1) { ?><li><a href="<?php echo $admin_url; ?>change-password" <?php if(strstr($_SERVER['REQUEST_URI'],"/change-password")) { ?>class="active-page"<?php } ?>>Change Password</a></li><?php } ?>
                        <?php } if($a_logout['orderr']==1) { ?><li><a href="<?php echo $admin_url; ?>logout">Logout</a></li>
					</ul>
				</li>
				<?php } if($_SESSION['user_level']==1) {?>
                 
                 <li>
					<a <?php if(strstr($_SERVER['REQUEST_URI'],"/post-type")) {?>class="active"<?php } ?> href="<?php echo $admin_url; ?>post-type"><div class="pull-left"><i class="zmdi zmdi-google-pages mr-20"></i><span class="right-nav-text">Post Type</span></div><div class="clearfix"></div></a>
                 </li>
                 
                 <?php } if($a_site_details['orderr']==1) { ?>
                 <li>
					<a <?php if(strstr($_SERVER['REQUEST_URI'],"/site-details")) {?>class="active"<?php } ?> href="<?php echo $admin_url; ?>site-details"><div class="pull-left"><i class="zmdi zmdi-chart-donut mr-20"></i><span class="right-nav-text">Site Settings</span></div><div class="clearfix"></div></a>
                 </li>
                 <?php }  ?>
				
                
                
                
                
                
			</ul>
            
            
		</div>
		<!-- /Left Sidebar Menu -->		

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
            
            
            
            
            
	
                    <?php /*?><nav class="navigation closed clearfix">
                        <a href="#" class="menu-toggle-close btn"><i class="fas fa-times"></i></a>
                        <ul class="nav sf-menu">  
                        	<?php if($a_dashboard['orderr']==1) { ?>
                        	<li>
                                <a href="<?php echo $admin_url; ?>dashboard"><i class="fas fa-home mr-2"></i>Dashboard</a>
                                <ul>
                                    <?php if($a_site_details['orderr']==1) { ?><li><a href="<?php echo $admin_url; ?>site-details">Site Details</a></li>
                                    <?php } if($a_menu['orderr']==1  && $_SESSION['user_level']==1) { ?><li><a href="<?php echo $admin_url; ?>menu-management">Menu</a></li>
                                    <?php } if($a_cms['orderr']==1) { ?><li><a href="<?php echo $admin_url; ?>cms">CMS</a></li>
                                    <?php } if($a_faq['orderr']==1) { ?><li><a href="<?php echo $admin_url; ?>faq">FAQ</a></li>
                                    <?php } if($a_enquiry['orderr']==1) { ?><li><a href="<?php echo $admin_url; ?>enquiry">Enquiry</a></li><?PHP } ?>
                                </ul>
                            </li> 
                            <?php } if($a_media['orderr']==1) { ?>                                
                            <li><a href="#"><i class="fas fa-photo-video mr-2"></i>Media</a>
                            	<ul>
                                    <?php if($a_banner['orderr']==1) { ?><li><a href="<?php echo $admin_url; ?>banner">Banner</a></li>
                                    <?php } if($a_gallery['orderr']==1) { ?><li><a href="<?php echo $admin_url; ?>gallery">Gallery</a></li><?php } ?>
                                </ul>
                            </li>
                            <?php } if($a_news['orderr']==1) { ?>
                            <li><a href="<?php echo $admin_url; ?>news"><i class="fas fa-th-list mr-2"></i>News</a></li>
                            <?php } if($a_testimonial['orderr']==1) { ?>
                            <li><a href="<?php echo $admin_url; ?>testimonial"><i class="fas fa-chart-area mr-2"></i>Testimonials</a></li>
                            <?php } if($a_products['orderr']==1) { ?>
                            <li><a href="#"><i class="fas fa-align-left mr-2"></i>Products</a>
                            	<ul>
                                    <?php if($a_all_product['orderr']==1) { ?><li><a href="<?php echo $admin_url; ?>product">All Product</a></li>
                                    <?php } if($a_category['orderr']==1) { ?><li><a href="<?php echo $admin_url; ?>category">Category</a></li><?php } ?>
                            
                                </ul>
                            </li>
                            <?php } if($a_trips['orderr']==1) { ?>
                            <li>
                                <a href="#"><i class="fab fa-wpforms mr-2"></i>Trips</a>
                                <ul>
                                    <?php if($a_all_trip['orderr']==1) { ?><li><a href="<?php echo $admin_url; ?>trips">All Trip</a></li>
                                    <?php } if($a_trip_type['orderr']==1) { ?><li><a href="<?php echo $admin_url; ?>trip-type">Trip Type</a></li>
                                    <?php } if($a_trip_category['orderr']==1) { ?><li><a href="<?php echo $admin_url; ?>trip-category">Trip Category</a></li>
                                    <?php } if($a_booking['orderr']==1) { ?><li><a href="<?php echo $admin_url; ?>booking">Booking</a></li><?php } ?>
                                </ul>
                            </li> 
                            <?php } if($a_blog['orderr']==1) { ?>   
                            <li><a href="<?php echo $admin_url; ?>blog"><i class="fas fa-desktop mr-2"></i>Blog</a></li>
                             <?php } if($a_members['orderr']==1) { ?>
                            <li><a href="#"><i class="fas fa-cogs mr-2"></i>Members</a>
                            	<ul>
                                    <?php if($a_sub_admin['orderr']==1 && $_SESSION['user_level']==1) { ?><li><a href="<?php echo $admin_url; ?>subadmin">Sub Admin</a></li>
                                    <?php } if($a_users['orderr']==1) { ?><li><a href="<?php echo $admin_url; ?>users">Users</a></li>
                                    <?php } if($a_logout['orderr']==1) { ?><li><a href="<?php echo $admin_url; ?>logout">Logout</a></li>
                                    <?php } if($a_changepassword['orderr']==1) { ?><li><a href="<?php echo $admin_url; ?>change-password">Change Password</a></li><?php } ?>
                                </ul>
                            </li>
                             <?php } ?>
                        </ul>
                    </nav><?php */?>
               