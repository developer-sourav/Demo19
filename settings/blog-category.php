<?php require_once('includes/sidebar-menu.php'); 

$id=$_REQUEST['blog-category'];

if($_REQUEST['action']=='delete')
{
	$qd="delete from blogcategory where id=".$id;
	
	if(mysqli_query($connect,$qd))
	{
	?>
	<script>
		  $(document).ready(function(){
        swal({   
			title: "category Remove Successfully!",   
             type: "success", 
			confirmButtonColor: "#469408",   
        },
  function(){
    window.location.href = '<?php echo $admin_url.'blog-category';?>';
});
		return false;

	});	
	</script>
    
	<?php
	}
	else
	{ ?>
<script>
	$(document).ready(function(){
        swal({   
			title: "Error Occured.!", 
			text: "Try Again later",   
            type: "error", 
			confirmButtonColor: "#DC143C",   
        },
  function(){
    window.location.href = '<?php echo $admin_url.'blog-category';?>';
});
		return false;

});	
</script>		
<?php }
}

if($_REQUEST['action']=='active')
{
	$qd="update blogcategory set status=1 where id=".$id;
	
	if(mysqli_query($connect,$qd))
	{
	?>
	<script>
		  $(document).ready(function(){
        swal({   
			title: "Category Active!",   
             type: "success", 
			confirmButtonColor: "#469408",   
        },
  function(){
    window.location.href = '<?php echo $admin_url.'blog-category';?>';
});
		return false;

	});	
	</script>
    
	<?php
	}
	else
	{ ?>
<script>
	$(document).ready(function(){
        swal({   
			title: "Error Occured.!", 
			text: "Try Again later",   
            type: "error", 
			confirmButtonColor: "#DC143C",   
        },
  function(){
    window.location.href = '<?php echo $admin_url.'blog-category';?>';
});
		return false;

});	
</script>		
<?php }
}
if($_REQUEST['action']=='deactive')
{
	$qd="update blogcategory set status=0 where id=".$id;
	
	if(mysqli_query($connect,$qd))
	{
	?>
	<script>
		  $(document).ready(function(){
        swal({   
			title: "Category Deactive!",   
             type: "success", 
			confirmButtonColor: "#469408",   
        },
  function(){
    window.location.href = '<?php echo $admin_url.'blog-category';?>';
});
		return false;

	});	
	</script>
    
	<?php
	}
	else
	{ ?>
<script>
	$(document).ready(function(){
        swal({   
			title: "Error Occured.!", 
			text: "Try Again later",   
            type: "error", 
			confirmButtonColor: "#DC143C",   
        },
  function(){
    window.location.href = '<?php echo $admin_url.'blog-category';?>';
});
		return false;

});	
</script>		
<?php }
}

?>

<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Blog Category
                      
                       <a href="<?php echo $admin_url;?>add-blogcategory" class="btn btn-success btn-icon text-white mr-2">
                                Add Blog Category
                            </a>
                          </h5>  
                            
					</div>
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo $admin_url;?>">Dashboard</a></li>
						<li class="active"><span>Blog Category</span></li>
					  </ol>
					</div>
				</div>
                
                

<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Blog Category</h6>
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
                                                <th>Name </th>
                                                <th >Action</th>
                                                
                                </tr>
                            </thead>

                            <tbody>
                            	<?php
								$i=0;
								$r="Select * from blogcategory";
                                $q=mysqli_query($connect,$r);
								while($row=mysqli_fetch_array($q))
								{
									$i++;
								?>
                                
                                    <tr >
                                    	<td><?php echo $i; ?></td>
                                        <td><?php echo $row['title']; ?></td>
                                        <td>
                                        
                                        	<a class="confirmdelete tabledeletebttn" itle="Delete" href="<?php echo $admin_url; ?>blog-category?action=delete&blog-category=<?php echo $row['id'] ?>"><i class="fa remove_cross">&#xf00d;</i></a>
                                            <?php if($row['status']==0) { ?>
                                            <a title="Active" href="<?php echo $admin_url; ?>blog-category?action=active&blog-category=<?php echo $row['id'] ?>"><i class="fa fa-ban"></i></a>
                                            <?php } else { ?>
                                            <a title="Deactive" href="<?php echo $admin_url; ?>blog-category?action=deactive&blog-category=<?php echo $row['id'] ?>"><i class="fa fa-check "></i></a>
                                            <?php } ?>
                                            <a title="Edit" href="<?php echo $admin_url; ?>edit-blogcategory?blog-category-id=<?php echo $row['id'] ?>"><i class="fa fa-edit"></i></a>
                                      
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
