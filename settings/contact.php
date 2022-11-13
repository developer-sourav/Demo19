<?php require_once('includes/sidebar-menu.php'); ?>


<?php
if($_REQUEST['action']=='delete')
{
	$id=$_REQUEST['id'];
	$qd="delete from contact where id=".$_REQUEST['id'];
	
	if(mysql_query($connect,$qd))
	{
		echo"<script>alert('Contact removed successfully')</script>";
	}
	else
	{
		echo"<script>alert('Error occured. Try Later.')</script>";
	}
	
	echo '<script language="javascript">location.href="'.$admin_url.'contact"</script>'; 
}
?>




<div class="main-container">

				<!-- Title bar starts -->
				<div class="title-bar">
					<ol class="breadcrumb">
						<li><a href="<?php echo $admin_url ?>">Home</a></li>
						<li class="active">Contact</li>
					</ol>
				</div>
				<!-- Title bar ends -->

				<!-- Top Bar Starts -->
				<div class="top-bar clearfix">
					<div class="page-title">
						<h4>Contact</h4>
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
                                                <th >Date </th>
                                                <th >Action</th>
                                                
                                </tr>
                            </thead>

                            <tbody>
                            	<?php
								$r="Select * from contact where type=0";
                                $q=mysqli_query($connect,$r);
								while($row=mysqli_fetch_array($q))
								{
								?>
                                
                                    <tr >
                                        <td class=" "><?php echo $row['name']; ?></td>
                                        <td class=" "><?php echo $row['email']; ?></td>
                                        <td class=" "><?php echo $row['phone']; ?></td>
                                       <td class=" "><?php echo $row['enq_date']; ?></td>
                                        <td>
                                        	<a class="btn btn-danger btn-xs" itle="Delete" href="<?php echo $admin_url; ?>/contact.php?action=delete&id=<?php echo $row['id'] ?>">Delete</a>
                                           <a class="fancybox btn btn-info btn-xs" href="#<?php echo $row['id'] ?>" > Details </a>
                                        </td>
                                     </tr>
                                

<div id="<?php echo $row['id']; ?>" style="display:none; width:500px">

<span class="section">Contact Details</span>

<div class="div_row">
<div class="name_left">Name : </div>
<div class="name_right"><?php echo $row['name'];?></div>
</div>
<div class="div_row">
<div class="name_left">Email : </div>
<div class="name_right"><?php echo $row['email'];?></div>
</div>
<div class="div_row">
<div class="name_left">Phone No. : </div>
<div class="name_right"><?php echo $row['phone'];?></div>
</div>
<div class="div_row">
<div class="name_left">Subject : </div>
<div class="name_right"><?php echo $row['subject'];?></div>
</div>

<div class="div_row">
<div class="name_left">Message : </div>
<div class="name_right"><?php echo $row['message'];?></div>
</div>

<div class="div_row">
<div class="name_left">Date : </div>
<div class="name_right"><?php echo $row['enq_date'];?></div>
</div>



</div>


                               
                                     
                                  <?php } ?>                             
                                            </tbody>

                                    </table>
                                

   

<?php 
	require_once('includes/frontend_block.php');
?>
