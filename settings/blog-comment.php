<?php require_once('includes/sidebar-menu.php'); 

$id=$_REQUEST['blog_id'];
$comment_id=$_REQUEST['comment_id'];

$prd=mysqli_fetch_array(mysqli_query($connect,"select * from blog where id='".$id."' "));

if($prd['id']<1)
{
		echo '<script language="javascript">location.href="'.$admin_url.'blog"</script>'; 		
}

$url=$admin_url.'blog-comment?blog_id='.$id;

if($_REQUEST['action']=='delete')
{
	
	$q1="delete from blogcomment where id=".$comment_id;
	
	if(mysqli_query($connect,$q1))
	{
		echo"<script>alert('Removed successfully.')</script>";		
	}
	else
	{
		echo"<script>alert('Error occured. Try Later.')</script>";		
	}

	echo '<script language="javascript">location.href="'.$url.'"</script>'; 		

}

if($_REQUEST['action']=='active')
{
	$qd="update blogcomment set status=1 where id=".$comment_id;
	
	if(mysqli_query($connect,$qd))
	{
		echo"<script>alert('Comment active.')</script>";		
	}
	else
	{
		echo"<script>alert('Error occured. Try Later.')</script>";		
	}
	echo '<script language="javascript">location.href="'.$url.'"</script>'; 		
}
if($_REQUEST['action']=='deactive')
{
 	$qd="update blogcomment set status=0 where id=".$comment_id; 
	
	if(mysqli_query($connect,$qd))
	{
		echo"<script>alert('Comment deactive.')</script>";		
	}
	else
	{
		echo"<script>alert('Error occured. Try Later.')</script>";		
	}
	echo '<script language="javascript">location.href="'.$url.'"</script>'; 		
}
?>


<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Blog Comment</h5>  
                            
					</div>
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo $admin_url;?>">Dashboard</a></li>
						<li class="active"><span>Comment</span></li>
					  </ol>
					</div>
				</div>
                
                
                
            

<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Comment</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">






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
					<div class="table-responsive">
						<table id="example" class="table table-hover display mb-30" >
                                    <thead>
                                        <tr role="row">
                                            <th>Serial No. </th>
                                            <th>User</th>
                                            <th>Email</th>
                                             <th>Comment</th>
                                             <th>Date</th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
								
								$i=0;
								$r="Select * from blogcomment where blog='".$id."' ";
                                $q=mysqli_query($connect,$r);
								while($row=mysqli_fetch_array($q))
								{
									$i++;
									
								?>
                                        <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['user']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['comment']; ?></td>
                                        <td><?php echo $row['dt']; ?></td>
                                        <td>
                                        	<a class=" btn btn-info btn-xs btn-success" href="<?php echo $admin_url; ?>blog-comment?blog_id=<?php echo $row['id'] ?>" > Comment </a>
                                        </td>
                                        <td>
                                        	
                                            <a title="Delete" href="<?php echo $admin_url; ?>blog-comment.php?action=delete&blog_id=<?php echo $id;?>&comment_id=<?php echo $row['id'] ?>"><i class="fa remove_cross">&#xf00d;</i></a> 
                                                
                                            <?php if($row['status']==0) { ?>
                                            <a title="Active" href="<?php echo $admin_url; ?>blog-comment.php?action=active&blog_id=<?php echo $id;?>&comment_id=<?php echo $row['id'] ?>"><i class="fa fa-ban"></i></a>
                                            <?php } else { ?>
                                            <a title="Deactive" href="<?php echo $admin_url; ?>blog-comment.php?action=deactive&blog_id=<?php echo $id;?>&comment_id=<?php echo $row['id'] ?>"><i class="fa fa-check "></i></a>
                                             <?php } ?>
                                             
                                           
                                           
                                           
                                           
                                        </td>
                                     </tr>
								<?php } ?>

								
                                    </tbody>
                                </table>
                           </div>
									</div>	
								</div>	
							</div>	
						</div>	
					</div>
				</div>

<?php 
	require_once('includes/frontend_block.php');
?>