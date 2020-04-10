<?php   include_once('inc/header.php'); ?>
<?php include_once('inc/connection.php');
 

 if(isset($_POST['submit'])){
	 
	 $date = $_POST['date'];
	 $user_id = $_POST['user_id'];
	 $cost = $_POST['cost'];
	 $remark = $_POST['remark'];
	 
	 $sql = "INSERT INTO  bazar_cost VALUES (NULL,'$date','$user_id','$cost','$remark')";
	 
	 
	 if(mysqli_query($conn,$sql)){
		echo '<script>window.location="bazar_cost_list.php"</script>';
	}else{
		echo "Not inserted";
	}
 }


?>


<div class="container-fluid px-xl-5">
    <section class="py-5">		
        <div class="row">
        
            <div class="col-md-10 offset-md-1 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Add Bazar Cost</h3>
                    </div>

                    <div class="card-body">
                          <form  method="POST" enctype="multipart/form-data">
								  <div class="form-group">
									<label for="name">Date :</label>
									<input type="date" class="form-control" id="date" name="date">
								  </div>
								  <div class="form-group ">
                                        <label for="category">Name</label>
										<?php
											$query = "SELECT * FROM users WHERE isDeleted = 0";
											$users = mysqli_query($conn, $query);
										?>
                                        <select name="user_id" id="user_id" class="form-control" required>
                                            <option value="" hidden disabled selected>Choose One</option>
											<?php while ($user = $users->fetch_assoc()) { ?>
												<option value="<?= $user['id'] ?>"><?= $user['name'] ?></option>
											<?php } ?>
                                         </select>
                                   </div>
								  
								  <div class="form-group">
									<label for="cost">Total Cost :</label>
									<input type="number" class="form-control" id="cost" name="cost">
								  </div>
								  
								  <div class="form-group">
									<label for="remark">Remark :</label>
									<input type="text" class="form-control" id="remark" name="remark">
								  </div>
								
								  <button type="submit" class="btn btn-success" name="submit">Submit</button>
							  </form> 
                    </div>
                </div>
            </div>
        </div>
    </section>        
</div>




<?php   include_once('inc/footer.php'); ?>