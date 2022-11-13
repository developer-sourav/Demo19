<?php include 'config.php' ;?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<html lang="en">
<head>
  	<meta charset="utf-8">
    <title><?php echo $siteDetails['title'] ;?></title>
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no">
    
    <!-- Favicons-->
    <link rel="shortcut icon" href="<?php echo $image_url ;?>logo/<?php echo $siteDetails['fav'] ;?>" type="image/x-icon"/>
    
    <!-- REVOLUTION BANNER CSS SETTINGS -->
	<link href="<?php echo $menu_url ;?>rs-plugin/css/settings.css" media="screen" rel="stylesheet">
    
    <!-- CSS -->
    <link href="<?php echo $menu_url ;?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $menu_url ;?>css/superfish.css" rel="stylesheet">
    <link href="<?php echo $menu_url ;?>css/style.css" rel="stylesheet">
    <link href="<?php echo $menu_url ;?>fontello/css/fontello.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!--[if lt IE 9]>
      <script src="http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="http://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

  </head>
  
  <body>
  <header>
  	<div class="container py-2">
	<div class="row">
		<div class="col-md-5 col-sm-3 col-xs-3">
			<a href="<?php echo $menu_url ;?>" id="logo"><img src="<?php echo $image_url ;?>logo/<?php echo $siteDetails['logo'] ;?>"></a>
		</div>
		<div class="col-md-7 col-sm-9 col-xs-9">
            <div class="row">
                <div class="col-md-4 hidden-xs">
                    <div class="icon">
                        <img src="<?php echo $menu_url ;?>img/phone.png">
                        <div>
                            <p><strong>Call us:</strong></p>
                            <p><?php echo $siteDetails['phone'] ;?></p>
                        </div>
                    </div>
                </div>
               <div class="col-md-4">
                    <ul id="top_nav" class="hidden-xs">
                        <li><a href="">Payments </a></li>
                        <li><a href="">Exams</a></li>
                        <li style="border-left: none"><a href="">Register</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <div"><a href="<?php echo $menu_url ;?>contact" class="button_top hidden-xs" id="login_top">Enquiry</a>
                    <!--<a href="" class="button_top hidden-xs" id="apply">Apply now</a></div>-->
                </div>
            </div>
            
            
            
		</div>
    </div>
</div>
<div class="marquee">
    <marquee>
        <ul class="list-inline">
            <li>★ Overseas job opportunities</li>
            <li>★ Upgrade bilingual skills to the next level</li>
            <li>★ Become foreign language proficient</li>
            <li>★ World class training </li>
            <li>★ Lifetime placement support</li>
            <li>★ Add global experience to your profile! </li>
        </ul>
    </marquee>
</div>
</header><!-- End header -->

<nav>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div id="mobnav-btn"></div>
			<ul class="sf-menu">
				<li><a href="<?php echo $menu_url ;?>">Home</a></li>
                <li class="mega_drop_down">
                    <a href="#">Course</a>
                    <div class="mobnav-subarrow"></div>
                    <div class="sf-mega">
                        <div class="col-md-6 col-sm-6">
                            <ul class="mega_submenu">
							<?php $cc=mysqli_query($connect,"select * from coursecategory where status=1 limit 6");
								while($ccs=mysqli_fetch_array($cc))
								{
							   ?>  
							   <li><a href="<?php echo $menu_url ;?>course/<?php echo $ccs['seo'] ;?>"><?php echo $ccs['title'] ;?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <ul class="mega_submenu">
							<?php $cc1=mysqli_query($connect,"select * from coursecategory where status=1 limit 6,6");
								while($ccs1=mysqli_fetch_array($cc1))
								{
							   ?>  
							    <li><a href="<?php echo $menu_url ;?>course/<?php echo $ccs1['seo'] ;?>"><?php echo $ccs1['title'] ;?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </li>
				<!--<li><a href="<?php echo $menu_url ;?>">Student Speaks</a></li>
				<li><a href="<?php echo $menu_url ;?>">Placement</a></li>-->
                
                <li class="normal_drop_down">
                    <a href="#">About us</a>
                    <div class="mobnav-subarrow"></div>
                    <ul>
                        <li><a href="<?php echo $menu_url ;?>about">About us</a></li>
                        <!--<li><a href="<?php echo $menu_url ;?>">Milestones</a></li>-->
                    </ul>
				</li>
				<li><a href="<?php echo $menu_url ;?>contact">Contacts</a></li>
			</ul>
              
		</div>
	</div><!-- End row -->
</div><!-- End container -->
</nav>