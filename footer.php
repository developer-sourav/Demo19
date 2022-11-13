<footer>
    <div class="container" id="nav-footer">
        <div class="row text-left">
            <div class="col-md-5 col-sm-3">
                <h4>About us</h4>
                <p><?php echo $siteDetails['about'] ;?></p>
            </div><!-- End col-md-4 -->
            <div class="col-md-3 col-sm-3">
                <h4>Find us</h4>
                <ul>
                    <li><?php echo $siteDetails['address'] ;?></li>
                    <li><strong class="phone"><?php echo $siteDetails['phone'] ;?></strong></li>
                    <li>Questions? <a href="#"><?php echo $siteDetails['email'] ;?></a></li>
                </ul>
                <ul id="follow_us">
                    <li><a href="<?php echo $siteDetails['fb'] ;?>"><i class="icon-facebook"></i></a></li>
                    <li><a href="<?php echo $siteDetails['tw'] ;?>"><i class="icon-twitter"></i></a></li>
                    <li><a href="<?php echo $siteDetails['insta'] ;?>"><i class=" icon-google"></i></a></li>
                </ul>
            </div><!-- End col-md-4 -->
            <div class="col-md-4 col-sm-3">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="<?php echo $menu_url ;?>">Home</a></li>
                    <!--<li><a href="<?php echo $menu_url ;?>">Placement Clients</a></li>
                    <li><a href="<?php echo $menu_url ;?>">Student Speaks</a></li>-->
                    <li><a href="<?php echo $menu_url ;?>about">About Us</a></li>
                    <!--<li><a href="<?php echo $menu_url ;?>">Milestones</a></li>-->
                    <li><a href="<?php echo $menu_url ;?>contact">Contact Us</a></li>
                </ul>
            </div><!-- End col-md-4 -->
        </div><!-- End row -->
    </div>
    <div id="copy_right">© <?php echo $siteDetails['title'] ;?> | All Rights Reserved.</div>
    </footer>

<div id="toTop">Back to top</div>

<!-- JQUERY -->
<script src="<?php echo $menu_url ;?>js/jquery-2.2.4.min.js"></script>
<!-- jQuery REVOLUTION Slider  -->
<script type="text/javascript" src="<?php echo $menu_url ;?>rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
<script type="text/javascript" src="<?php echo $menu_url ;?>rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript">

		var revapi;

		jQuery(document).ready(function() {

			   revapi = jQuery('.tp-banner').revolution(
				{
					delay:9000,
					startwidth:1700,
					startheight:600,
					hideThumbs:true,
					navigationType:"none",
					fullWidth:"on",
					forceFullWidth:"on"
				});

		});	//ready

	</script>

<!-- OTHER JS --> 
<script src="<?php echo $menu_url ;?>js/superfish.js"></script>
<script src="<?php echo $menu_url ;?>js/bootstrap.min.js"></script>
<script src="<?php echo $menu_url ;?>js/retina.min.js"></script>
<script src="<?php echo $menu_url ;?>assets/validate.js"></script>
<script src="<?php echo $menu_url ;?>js/jquery.placeholder.js"></script>
<script src="<?php echo $menu_url ;?>js/functions.js"></script>
<script src="<?php echo $menu_url ;?>js/classie.js"></script>
<script src="<?php echo $menu_url ;?>js/uisearch.js"></script>
<script>new UISearch( document.getElementById( 'sb-search' ) );</script>

<!-- STYLE SWITCHER  -->
<link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo $menu_url ;?>src/jquery-sticklr-1.4-light-color.css" >
<script type="text/javascript" src="<?php echo $menu_url ;?>src/jquery-sticklr-1.4.min.js"></script>
	<script type="text/javascript">
	    $(document).ready(function(){
	        $('#example-1').sticklr({
                animate         : true,
                showOn		    : 'hover'
			});
	    });
	</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    $(document).ready(function(){
        $('.owl-carousel').owlCarousel({
            margin:10,
            nav:true,
            autoplay:true,
            autoplayTimeout:1000,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        })
    });
    
</script>
  </body>
</html>