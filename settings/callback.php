<?php require_once('includes/sidebar-menu.php'); ?>


<?php
if($_REQUEST['action']=='delete')
{
	$id=$_REQUEST['callback-id'];
	$qd="delete from callback where id=".$id;
	
	if(mysqli_query($connect,$qd))
	{
		echo"<script>alert('Removed successfully')</script>";
	}
	else
	{
		echo"<script>alert('Error occured. Try Later.')</script>";
	}
	
	echo '<script language="javascript">location.href="'.$admin_url.'/callback.php"</script>'; 
}
?>




<div class="main-container">

				<!-- Title bar starts -->
				<div class="title-bar">
					<ol class="breadcrumb">
						<li><a href="<?php echo $admin_url ?>">Home</a></li>
						<li class="active">Callback</li>
					</ol>
				</div>
				<!-- Title bar ends -->

				<!-- Top Bar Starts -->
				<div class="top-bar clearfix">
					<div class="page-title">
						<h4>Callback</h4>
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

                            
								
                    
                    
                               
                                
                                    <table class="dataTable table table-bordered table-striped table-hover" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>Company </th>
                                                <th>Name </th>
                                                <th >Phone No.</th>
                                                <th >Date </th>
                                                <th >Action</th>
                                                
                                </tr>
                            </thead>

                            <tbody>
                            	<?php
								$r="Select * from callback";
                                $q=mysqli_query($connect,$r);
								while($row=mysqli_fetch_array($q))
								{
									$com=mysqli_fetch_array(mysqli_query($connect,"select * from users where id='".$row['company']."' "));

								?>
                                
                                    <tr >
                                        <td class=" "><?php echo $com['lname']; ?></td>
                                        <td class=" "><?php echo $row['name']; ?></td>
                                        <td class=" "><?php echo $row['phone']; ?></td>
                                       <td class=" "><?php echo $row['enq_date']; ?></td>
                                        <td>
                                        	<a class="btn btn-danger btn-xs" itle="Delete" href="<?php echo $admin_url; ?>/callback.php?action=delete&callback-id=<?php echo $row['id'] ?>">Delete</a>
                                        </td>
                                     </tr>
                                
                                     
                                  <?php } ?>                             
                                            </tbody>

                                    </table>
                                

   

<?php 
	require_once('includes/frontend_block.php');
?>
