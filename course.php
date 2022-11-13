<?php include 'header.php';
$arr=explode("/course/",$_SERVER['REQUEST_URI']);
$seo=$arr[1];	
$det=mysqli_fetch_array(mysqli_query($connect,"select * from coursecategory where seo='".$seo."' "));
$prd=$det['id'];
?>

    <section id="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <h1>Our Courses</h1>
                    <p class="lead boxed "><?php echo $det['title'] ;?></p>
                </div>
            </div><!-- End row -->
        </div><!-- End container -->
        <div class="divider_top"></div>
    </section><!-- End sub-header -->


    <section id="main_content">
        <div class="container">

            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Courses</li>
            </ol>

            <div class="row">

                <aside class="col-lg-3 col-md-4 col-sm-4">
                    <div class="box_style_1">
                        <h4>Categories</h4>
                        <ul class="submenu-col">
                            <?php $cc5=mysqli_query($connect,"select * from coursecategory where status=1");
								while($ccs5=mysqli_fetch_array($cc5))
								{
							   ?>  
 
							<li><a href="<?php echo $menu_url ;?>course/<?php echo $ccs5['seo'] ;?>"<?php if($ccs5['id']==$det['id']) { ?> id="active" <?php } ?>><i class="icon-book-2"></i><?php echo $ccs5['title'] ;?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </aside>

                <div class="col-lg-9 col-md-8 col-sm-8">
                    <div class="row">
                      <?php 
				
				$co=mysqli_query($connect,"select * from course where category='".$det['id']."' and status=1 ");
				while($cou=mysqli_fetch_array($co))
				{
					
				?>
					   <div class="col-lg-4 col-md-6">
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

                        

                       

                        

                        
                    </div><!-- End row -->
                </div><!-- End col-lg-9-->



            </div><!-- End row -->

        </div><!-- End container -->
    </section><!-- End main_content -->

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