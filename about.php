<?php include 'header.php';
$cms=mysqli_fetch_array(mysqli_query($connect,"select * from cms where id=14"));
$cms1=mysqli_fetch_array(mysqli_query($connect,"select * from cms where id=15"));
?>

	<section id="sub-header">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 text-center">
					<h1>About us</h1>
					<p class="lead boxed ">Ex utamur fierent tacimates duis choro an</p>
				</div>
			</div><!-- End row -->
		</div><!-- End container -->
		<div class="divider_top"></div>
	</section><!-- End sub-header -->

	<section id="main_content" class="about">
		<div class="container">

			<ol class="breadcrumb">
				<li><a href="index.html">Home</a></li>
				<li class="active">About us</li>
			</ol>

			<div class="row">
				<div class="col-md-7">

					<h3><?php echo $cms['title'] ;?></h3>
					<p>
						<?php echo $cms['body'] ;?>
					</p>
				</div>
				<div class="col-md-5">
					<img src="<?php echo $image_url ;?>cms/<?php echo $cms['img'] ;?>" class="img-responsive">
				</div>
				<div class="col-md-5">
					<img src="<?php echo $image_url ;?>cms/<?php echo $cms1['img'] ;?>" class="img-responsive">
				</div>
				<div class="col-md-7">
					<h3><?php echo $cms1['title'] ;?></h3>
					
					<?php echo $cms1['body'] ;?>
				</div>
			</div><!-- End row -->

		</div><!-- End container -->
	</section><!-- End main_content-->

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

	<section class="upperfooter">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="icon">
						<i class="icon-graduation-cap" aria-hidden="true"></i> 
					</div>
					<h3>What are you waiting for ?</h3>
					<p>Let us build your career</p>
				</div>
				<div class="col-md-3">
					<a href="" class="btn btn-default btn-block">Enquire Now</a>
				</div>
			</div>
		</div>
	</section>

	<?php include 'footer.php';?>