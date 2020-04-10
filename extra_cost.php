<?php   include_once('inc/header.php'); ?>
<?php include_once('inc/connection.php');
 
 

?>


<div class="container-fluid px-xl-5">
    <section class="py-5">		
        <div class="row">
        
            <div class="col-md-10 offset-md-1 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Add Extra Cost</h3>
                    </div>

                    <div class="card-body">
                          <form  method="POST" enctype="multipart/form-data">
								  <div class="form-group">
									<label for="name">Date :</label>
									<input type="date" class="form-control" id="date" name="date">
								  </div>
								  <div class="form-group ">
                                        <label for="category">Name</label>
                                        <select name="name" id="name" class="form-control" required>
                                            <option value="" hidden disabled selected>Choose One</option>
                                            <option value="21">Rakib Islam</option>
                                         </select>
                                   </div>
								  
								  <div class="form-group">
									<label for="name">Total Cost :</label>
									<input type="number" class="form-control" id="number" name="number">
								  </div>
								  
								  <div class="form-group ">
                                        <label for="category">Cost Type</label>
                                        <select name="name" id="name" class="form-control" required>
                                            <option value="" hidden disabled selected>Choose One</option>
                                            <option value="21">Electricity Bill</option>
                                            <option value="21">Wifi Bill</option>
                                            <option value="21">Bua Bill</option>
                                            <option value="21">Other</option>
                                         </select>
                                   </div>
								  
								  <div class="form-group">
									<label for="name">Remark :</label>
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