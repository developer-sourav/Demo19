<?php require_once('includes/sidebar-menu.php'); ?>


<?php
if($_REQUEST['action']=='delete')
{

	$qd="Delete from users where id=".$_REQUEST['id'];
	
	if(mysqli_query($connect,$qd))
	{
		echo"<script>alert('Removed successfully.')</script>";
	}
	else
	{
		echo"<script>alert('Error occured. Try Later.')</script>";
	}
	echo '<script language="javascript">location.href="'.$admin_url.'profile"</script>'; 
}
?>




<div class="main-container">

				<!-- Title bar starts -->
				<div class="title-bar">
					<ol class="breadcrumb">
						<li><a href="<?php echo $admin_url ?>">Home</a></li>
						<li class="active">Profile</li>
					</ol>
				</div>
				<!-- Title bar ends -->

				<!-- Top Bar Starts -->
				<div class="top-bar clearfix">
					<div class="page-title">
						<h4>Profile</h4>
					</div>
					
				</div>
				<!-- Top Bar Ends -->

				<hr class="stylish">

				<!-- Container fluid Starts -->
				<div class="container-fluid">

					<!-- Spacer Starts -->
					<div class="spacer">

						<!-- Row starts -->
						<div class="row">

                            
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
                    
                    
                               
                                
                                    <table class="dataTable table table-bordered table-striped table-hover" id="myTable">
                                        <thead>
                                            <tr>

                                                <th>Name </th>
                                                <th >Email </th>
                                                <th >Phone No.</th>
                                               
                                                <th >Action</th>
                                                
                                </tr>
                            </thead>

                            <tbody>
                            	<?php
								$r="Select * from users where user_level=0";
                                $q=mysqli_query($connect,$r);
								while($row=mysqli_fetch_array($q))
								{
									$fr=mysqli_fetch_array(mysqli_query($connect,"Select * from freight where id='".$row['freight']."' "));
									
									$tags = explode('-' , rtrim(ltrim($row['city'],'-'),'-'));
									$city = '';
									foreach($tags as $key) {
									
										$query = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM city WHERE id='".$key."' "));
										$city .= $query['city'].', ';
									
									}
									
								?>
                                
                                    <tr >
                                        <td class=" "><?php echo $row['fname']; ?></td>
                                        <td class=" "><?php echo $row['email']; ?></td>
                                        <td class=" "><?php echo $row['phone']; ?></td>
                                        <td>
                                        	<a class="btn btn-danger btn-xs" itle="Delete" href="<?php echo $admin_url; ?>/profile.php?action=delete&id=<?php echo $row['id'] ?>">Delete</a>&nbsp; &nbsp; &nbsp; 
                                           <a class="fancybox btn btn-info btn-xs" href="#<?php echo $row['id'] ?>" > Details </a>
                                        </td>
                                     </tr>
                                

<div id="<?php echo $row['id']; ?>" style="display:none; width:500px">

<span class="section">Details</span>

<div class="div_row">
<div class="name_left">Company Name : </div>
<div class="name_right"><?php echo $row['lname'];?></div>
</div>
<div class="div_row">
<div class="name_left">Freight : </div>
<div class="name_right"><?php echo $fr['freight'];?></div>
</div>
<div class="div_row">
<div class="name_left">City : </div>
<div class="name_right"><?php echo substr($city,0,-2);?></div>
</div>
<div class="div_row">
<div class="name_left">Logo : </div>
<div class="name_right"><img src="<?php echo $admin_url.'/media/logo/'.$row['img'];?>" height="50" ></div>
</div>



</div>


                               
                                     
                                  <?php } ?>                             
                                            </tbody>

                                    </table>
                                

   

<?php 
	require_once('includes/frontend_block.php');
?>
