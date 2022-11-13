<?php include 'header.php' ;
$w=mysqli_fetch_array(mysqli_query($connect,"select * from whyjoinus where id=1"));
$w1=mysqli_fetch_array(mysqli_query($connect,"select * from whyjoinus where id=2"));
$w2=mysqli_fetch_array(mysqli_query($connect,"select * from whyjoinus where id=3"));
$w3=mysqli_fetch_array(mysqli_query($connect,"select * from whyjoinus where id=4"));
$cms=mysqli_fetch_array(mysqli_query($connect,"select * from cms where id=13"));

?>

    <section class="tp-banner-container">
		<div class="tp-banner" >
			<ul class="sliderwrapper"><!-- SLIDE  -->
				<?php
					while($banner_qry=mysqli_fetch_array($banner)) {
					?>
				<li data-transition="fade" data-slotamount="4" data-masterspeed="1500" >
					<!-- MAIN IMAGE -->
					<img src="<?php echo $image_url.'banner/'.$banner_qry['img'];?>" alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
				</li>
				<?php } ?>
                <!-- SLIDE  -->
				
				
			</ul>
			<div class="tp-bannertimer"></div>
		</div>
	</section><!-- End slider -->
    
    <section id="main-features">
    <div class="divider_top_black"></div>
    <div class="container">
        <div class="row">
            <div class=" col-md-10 col-md-offset-1 text-center">
                <h2>Why Join Us</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="feature">
                    <i class="icon-trophy"></i>
                    <h3><?php echo $w['title'] ;?></h3>
                    <p><?php echo $w['body'] ;?></p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature">
                    <i class=" icon-ok-4"></i>
                    <h3><?php echo $w1['title'] ;?></h3>
                    <p><?php echo $w1['body'] ;?></p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature">
                    <i class="icon-mic"></i>
                    <h3><?php echo $w2['title'] ;?></h3>
                    <p><?php echo $w2['body'] ;?></p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature">
                    <i class="icon-video"></i>
                    <h3><?php echo $w3['title'] ;?></h3>
                    <p><?php echo $w3['body'] ;?></p>
                </div>
            </div>
        </div><!-- End row -->
        </div><!-- End container-->
    </section><!-- End main-features -->
    
    <section class="bg-icon" style="background-image:url(img/bg.jpeg);">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <img src="<?php echo $image_url ;?>cms/<?php echo $cms['img'] ;?>" class="img-responsive">
                </div>
                <div class="col-md-7">
                    <div class="info">
                        <div>
                            <h3><?php echo $cms['title'] ;?></h3>
                            <?php echo $cms['body'] ;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="main_content_gray">
    	<div class="container">
        	<div class="row">
                <div class="col-md-12 text-center">
                    <h2>Top categories courses</h2>
                    <!--<p class="lead">Lorem ipsum dolor sit amet, ius minim gubergren ad.</p>-->
                </div>
            </div><!-- End row -->
            <ul class="nav nav-tabs nav-pills nav-justified" role="tablist">
                <?php 
				$i=0;
				$cc2=mysqli_query($connect,"select * from coursecategory where status=1");
				while($ccs2=mysqli_fetch_array($cc2))
				{
					$i++;
				?> 
				<li role="presentation" <?php if($i==1) {?> class="active" <?php } ?>><a href="#crs<?php echo $i ;?>" aria-controls="crs<?php echo $i ;?>" role="tab" data-toggle="tab"><?php echo $ccs2['title'] ;?></a></li>				
				
                 <?php } ?>
				
                <!--<li role="presentation"><a href="#crs2" aria-controls="crs2" role="tab" data-toggle="tab">Electrical Engineering</a></li>
                <li role="presentation"><a href="#crs3" aria-controls="crs3" role="tab" data-toggle="tab">Mechanical Engineering</a></li>
                <li role="presentation"><a href="#crs4" aria-controls="crs4" role="tab" data-toggle="tab">Civil Engineering</a></li>
                <li role="presentation"><a href="#crs5" aria-controls="crs4" role="tab" data-toggle="tab">Clinical Research</a></li>-->
            </ul>
            
              <!-- Tab panes -->
              <div class="tab-content">
                 <?php 
				$j=0;
				$cc3=mysqli_query($connect,"select * from coursecategory where status=1");
				while($ccs3=mysqli_fetch_array($cc3))
				{
					$j++;
				?> 
								
				
				<div role="tabpanel" class="tab-pane <?php if($j==1) {?>active<?php } ?>" id="crs<?php  echo $j ;?>">
                    <div class="owl-carousel owl-theme">
                       <?php 
				
				$co=mysqli_query($connect,"select * from course where category='".$ccs3['id']."' and status=1 ");
				while($cou=mysqli_fetch_array($co))
				{
					
				?> 
					   <div class="item">
                            <div class="col-item">
                                <span class="ribbon_course"></span>
                                <div class="photo">
                                    <a href="#"><img src="<?php echo $image_url; ?>course/<?php echo $cou['img'] ;?>" alt="" /></a>
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="course_info col-md-12 col-sm-12">
                                            <h4><?php echo $cou['title'];?></h4>
                                            <p ><?php echo substr($cou['body'],0,100);?></p>
                                            <!--<div class="rating">
                                            <i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class=" icon-star-empty"></i>
                                            </div>
                                            <div class="price pull-right">20 Hrs</div>-->
                                        </div>
                                    </div>
                                    <div class="separator clearfix">
                                        <a href="<?php echo $menu_url; ?>course-details/<?php echo $cou['seo'] ;?>" class="btn btn-primary btn-block">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<?php } ?>
                    </div>    
                </div>
				<?php } ?>
                
              </div>
            
         </div>   <!-- End container -->
    </section><!-- End section gray -->
     
    <section class="counter-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="count">
                        <span class="fa fa-clock-o"></span>
						<p class="timer count-number"><span class="count-title">200.4</span>k</p>
                        <h4>TRAINING HOURS</h4> 
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="count">
                        <span class="fa fa-handshake-o"></span>
						<p class="timer count-number"><span class="count-title">500</span>+</p>
                        <h4>RECRUITERS</h4> 
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="count">
                        <span class="fa fa-graduation-cap"></span>
						<p class="timer count-number"><span class="count-title">300</span>+</p>
                        <h4>CAMPUS DRIVES</h4> 
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="count">
                        <span class="fa fa-globe"></span>
						<p class="timer count-number"><span class="count-title">10,000</span>+</p>
                        <h4>TOTAL NETWORK</h4> 
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="count">
                        <span class="fa fa-users"></span>
						<p class="timer count-number"><span class="count-title">784</span>+</p>
                        <h4>GUEST LECTURES</h4> 
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="count">
                        <span class="fa fa-trophy"></span>
						<p class="timer count-number"><span class="count-title">90.3</span>k</p>
                        <h4>COUNSELLING</h4> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="testimonials">
        <div class="container">
            <div class="row">
                <div class='col-md-offset-2 col-md-8 text-center'>
                    <h2>What they say</h2>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-offset-2 col-md-8'>
                    <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                        <!-- Bottom Carousel Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#quote-carousel" data-slide-to="1"></li>
                            <li data-target="#quote-carousel" data-slide-to="2"></li>
                        </ol>
                        <!-- Carousel Slides / Quotes -->
                        <div class="carousel-inner">
                            <!-- Quote 1 -->
                            <?php
								$j=0;
							while($test=mysqli_fetch_array($testimonial1)) { 
							$j++;
							?>
							<div class="item <?php if($j==1) { ?> active<?php } ?>">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-3 text-center">
                                            <img class="img-circle" src="<?php echo $image_url; ?>testimonial/<?php echo $test['img'] ;?>" alt="">
                                        </div>
                                        <div class="col-sm-9">
                                            <p>
                                                <?php echo $test['body'] ;?>
                                            </p>
                                            <small><?php echo $test['title'] ;?></small>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
							<?php } ?>
                            <!-- Quote 2 -->
                           
                            <!-- Quote 3 -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
       </section><!-- End testimonials -->

    

    <?php include 'footer.php' ;?>