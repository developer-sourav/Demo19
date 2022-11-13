<?php require_once('includes/sidebar-menu.php'); ?>


<?php
if($_REQUEST['action']=='delete')
{
	$id=$_REQUEST['id'];
	$qd="delete from contact where id=".$_REQUEST['id'];
	
	if(mysqli_query($connect,$qd))
	{
	?>
	<script>
		  $(document).ready(function(){
        swal({   
			title: "Enquiry Remove Successfully!",   
             type: "success", 
			confirmButtonColor: "#469408",   
        },
  function(){
    window.location.href = '<?php echo $admin_url.'enquiry';?>';
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
    window.location.href = '<?php echo $admin_url.'enquiry';?>';
});
		return false;

});	
</script>		
<?php }
	
}
?>


<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Enquiries</h5>  
                            
					</div>
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo $admin_url;?>">Dashboard</a></li>
						<li class="active"><span>Enquiry</span></li>
					  </ol>
					</div>
				</div>


										
                                        
                                        

<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Enquiries</h6>
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
                                            <th>Name</th>
                                            <th>Email </th>
                                             <th>Phone </th>
                                             <th>Date </th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
								
								$i=0;
								$r="Select * from contact";
                                $q=mysqli_query($connect,$r);
								while($row=mysqli_fetch_array($q))
								{
									$i++;
									
								?>
                                        <tr>
                                        <td class=" "><?php echo $i; ?></td>
                                        <td class=" "><?php echo $row['name']; ?></td>
										<td class=" "><?php echo $row['email']; ?></td>
										<td class=" "><?php echo $row['phone']; ?></td>
										<td class=" "><?php echo $row['enq_date']; ?></td>
                                        <td>
                                        	<a class="btn btn-danger btn-xs" itle="Delete" href="<?php echo $admin_url; ?>enquiry?action=delete&id=<?php echo $row['id'] ?>">Delete</a>
                                            
                                           <a class="fancybox btn btn-info btn-xs btn-success" href="#<?php echo $row['id'] ?>" > Details </a>
                                           
                                          <?php /*?><a class="btn btn-info btn-xs btn-success" data-toggle="modal" data-target="#myModal<?php echo $row['id'] ?>"> Details </a><?php */?>
                                        </td>
                                     </tr>


 <?php /*?><div id="myModal<?php echo $row['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myModalLabel">Contact Details</h5>
            </div>
            <div class="modal-body">
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
                <div class="name_left">Message : </div>
                <div class="name_right"><?php echo $row['message'];?></div>
                </div>
                
                <div class="div_row">
                <div class="name_left">Enquiry Date : </div>
                <div class="name_right"><?php echo $row['enq_date'];?></div>
                </div>
                

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>

    </div><?php */?>
                                        
                                        
                                        									 
<div id="<?php echo $row['id']; ?>" style="display:none; width:500px">
<h5 class="txt-dark">Contact Details</h5>
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
<div class="name_left">Message : </div>
<div class="name_right"><?php echo $row['message'];?></div>
</div>

<div class="div_row">
<div class="name_left">Enquiry Date : </div>
<div class="name_right"><?php echo $row['enq_date'];?></div>
</div>
</div>
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
