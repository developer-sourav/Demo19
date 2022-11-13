<?php require_once('includes/sidebar-menu.php'); ?>


<?php
if($_REQUEST['action']=='delete')
{
	$id=$_REQUEST['id'];
	$qd="delete from contact where id=".$_REQUEST['id'];
	
	if(mysql_query($connect,$qd))
	{
		$_SESSION['success_msg']="Removed successfully";
	}
	else
	{
		$_SESSION['error_msg']="Error occured. Try Later.";
	}
}
?>




<div class="main-container">

				<!-- Title bar starts -->
				<div class="title-bar">
					<ol class="breadcrumb">
						<li><a href="<?php echo $admin_url ?>">Home</a></li>
						<li class="active">Newsletter</li>
					</ol>
				</div>
				<!-- Title bar ends -->

				<!-- Top Bar Starts -->
				<div class="top-bar clearfix">
					<div class="page-title">
						<h4>Newsletter</h4>
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

                                                <th >Email </th>
                                                <th >Date </th>
                                                <th >Action</th>
                                                
                                </tr>
                            </thead>

                            <tbody>
                            	<?php
								$r="Select * from contact where type=1";
                                $q=mysqli_query($connect,$r);
								while($row=mysqli_fetch_array($q))
								{
								?>
                                
                                    <tr >
                                        <td class=" "><?php echo $row['email']; ?></td>
                                       <td class=" "><?php echo $row['enq_date']; ?></td>
                                        <td>
                                        	<a class="btn btn-danger btn-xs" itle="Delete" href="<?php echo $admin_url; ?>/newsletter.php?action=delete&id=<?php echo $row['id'] ?>">Delete</a>
                                        </td>
                                     </tr>
                                

                                  <?php } ?>                             
                                            </tbody>

                                    </table>
                                

   

<?php 
	require_once('includes/frontend_block.php');
?>
