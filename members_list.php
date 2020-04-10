<?php   include_once('inc/header.php'); ?>
<?php include_once('inc/connection.php');
 
 $sql = "SELECT * FROM users WHERE isDeleted = 0 ORDER BY id DESC";
 $_result = mysqli_query($conn,$sql);

?>


<div class="container-fluid px-xl-5">
    <section class="py-5">		
        <div class="row">
        
            <div class="col-md-10 offset-md-1 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">All Members</h3>
                    </div>

                    <div class="card-body">
                          <table class="table table-striped">
								  <thead>
									<tr>
									  <th scope="col">SL</th>
									  <th scope="col">Name</th>
									  <th scope="col">Username</th>
									  <th scope="col">Email</th>
									  <th scope="col">Actions</th>
									</tr>
								  </thead>
								  <tbody>
								  <?php 
									$i=0; 
									while($row = $_result->fetch_assoc()) { 
									?>
									<tr>
									  <th scope="row"><?php echo ++$i; ?></th>
									  <td><?php echo $row['name'];?></td>
									  <td><?php echo $row['username'];?></td>
									  <td><?php echo $row['email'];?></td>
									  <td>
										<div class="btn-group">
											<a href="<?php echo $row['id'];?>" class="btn btn-sm btn-info">Edit</a>
											<a href="<?php echo $row['id'];?>" class="btn btn-sm btn-danger">Delete</a>
										</div>
									  </td>
									</tr>
								  <?php } ?>
								  </tbody>
								</table>
                    </div>
                </div>
            </div>
        </div>
    </section>        
</div>




<?php   include_once('inc/footer.php'); ?>