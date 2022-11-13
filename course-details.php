<?php include 'header.php';
$arr=explode("/course-details/",$_SERVER['REQUEST_URI']);
$seo=$arr[1];	
$det=mysqli_fetch_array(mysqli_query($connect,"select * from course where seo='".$seo."' "));
$prd=$det['id'];
?>

    <section id="sub-header">
        <div class="container">

            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Course details</h1>
                    <p class="lead"> <strong><?php echo $det['title'] ;?></strong> </p>
                </div>
            </div><!-- End row -->
        </div><!-- End container -->
        <div class="divider_top"></div>
    </section>

    <section id="main_content" class="course-details">
        <div class="container">

            <ol class="breadcrumb">
                <li><a href="<?php echo $menu_url ;?>">Home</a></li>
                <li class="active">Course Details</li>
            </ol>

            <div class="row">

                <div class="col-md-8">
                    <h2><?php echo $det['title'] ;?></h2>
                    <div class="pic">
                        <img src="<?php echo $image_url ;?>course/<?php echo $det['img'] ;?>">
                    </div>
                    <?php echo $det['body'] ;?>
                    <div class="row">
                        <div class="col-md-12">
                        <h3>FAQs</h3>
                        <div class="panel-group" id="accordion">
                        <?php 
						$i=1;
						$fq=mysqli_query($connect,"select * from course_feature where c_id='".$det['id']."'") ;
						while($faq=mysqli_fetch_array($fq)) {
						$i++;
						?>
						<div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i ;?>"><?php echo $faq['c_name'] ;?><i class="indicator icon-plus pull-right"></i></a>
                            </h4>
                          </div>
                          <div id="collapse<?php echo $i ;?>" class="panel-collapse collapse">
                            <div class="panel-body">
                              <?php echo $faq['c_value'] ;?>
                            </div>
                          </div>
                        </div>
						<?php } ?>

                      </div>
                        
                      </div><!-- End col-md-12-->
                     </div>

                </div><!-- End col-md-8  -->

                <aside class="col-md-4">
                    <a href="<?php echo $det['link'] ;?>" class=" button_fullwidth-3 btn-success">Book Now</a>
                   <!-- <div class="box_style_1">
                        <h4>Duration :  <span class="pull-right">6 Months</span></h4>
                        <h4>Sessions : <span class="pull-right">550+</span></h4>
                    </div>-->
                    <div class="enquiry">
                        <h4>Enquire Now</h4>
                        <form action="<?php echo $menu_url ;?>contact" method="post">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control" placeholder="Phone">
                            </div>
						<input type="hidden" value="<?php echo $det['title'] ;?>" name="message">
                            <div class="form-group">
                                <input type="submit" name="contact_submit" class="btn btn-success btn-block" value="Submit">
                            </div>
                        </form>
                    </div>
                </aside> <!-- End col-md-4 -->

            </div><!-- End row -->
        </div><!-- End container -->
    </section>

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
                    <a href="<?php echo $menu_url ;?>contact" class="btn btn-default btn-block">Enquiry Now</a>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php';?>