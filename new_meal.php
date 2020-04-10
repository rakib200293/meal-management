<?php   include_once('inc/header.php'); ?>

<?php
    include './inc/connection.php';
?>

<div class="container-fluid px-xl-5">
    <section class="py-5">		
        <div class="row">
        
            <div class="col-md-8 offset-md-2 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">New Meal</h3>
                    </div>
                    <div class="card-body">

                    <?php
                        if (isset($_POST['btn'])) {
                            $date = date('Y-m-d', strtotime($_POST['date']));
                            $meal_quantity = $_POST['meal_quantity'];
                            if (!empty($meal_quantity) && is_numeric($meal_quantity)) {
                                $user_id = $_SESSION['user_id'];
                                $query = "INSERT INTO meals(user_id, meal_quantity, meal_date) VALUES('$user_id', '$meal_quantity', '$date')";
                                $result = $conn->query($query);
                                if ($result == true) {
                                    echo '<div class="alert alert-success">Meal request successfully sent.</div>';
                                } else {
                                    echo '<div class="alert alert-danger">Meal request sending failed.</div>';
                                }
                            }
                        }
                    ?>
                        
                        <form method="post">
                            <div class="form-group row">
                                <label for="date" class="col-md-3">Date of Meal</label>
                                <div class="col-md-9">
                                    <input type="text" name="date" id="date" autocomplete="off" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="meal_quantity" class="col-md-3">Meal Quantity</label>
                                <div class="col-md-9">
                                    <input type="number" name="meal_quantity" id="meal_quantity" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-9 offset-md-3">
                                    <input type="submit" name="btn" value="Submit" class="btn btn-primary">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        
        </div>
    </section>	
</div>

<?php   include_once('inc/footer.php'); ?>

<script>
    var today = new Date();
    // var tomorrow = new Date();
    // tomorrow.setDate(tomorrow.getDate() + 1);
    $("#date").datepicker({
        dateFormat: 'dd-mm-yy'
    }).datepicker("setDate", today);
</script>