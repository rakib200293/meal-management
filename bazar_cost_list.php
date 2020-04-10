<?php 
    include_once('inc/header.php');
    include_once('inc/connection.php');
?>
<?php 
 


?>


<div class="container-fluid px-xl-5">
    <section class="py-5">		
        <div class="row">
        
            <div class="col-md-10 offset-md-1 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Bazar Cost List</h3>
                    </div>

                    <div class="card-body">
                        
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Member</th>
                                        <th>Cost</th>
                                        <th>Remark</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = "SELECT bc.*, (SELECT name FROM users WHERE id = bc.user_id) AS member_name FROM bazar_cost AS bc ORDER BY bc.id DESC";
                                        $bazar_costs = mysqli_query($conn, $query);
                                        $i = 0;
                                        $total_cost = 0;
                                        while($bc = $bazar_costs->fetch_assoc()) {
                                            $total_cost += $bc['cost'];
                                    ?>
                                        <tr>
                                            <td><?= ++$i ?></td>
                                            <td><?= date('D d F, Y', strtotime($bc['date'])) ?></td>
                                            <td><?= $bc['member_name'] ?></td>
                                            <td><?= $bc['cost'] ?></td>
                                            <td><?= $bc['remark'] ? $bc['remark'] : '--------' ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo $bc['id'];?>" class="btn btn-sm btn-info">Edit</a>
                                                    <a href="<?php echo $bc['id'];?>" class="btn btn-sm btn-danger">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <p class="text-center">
                                Total Cost = <?= number_format($total_cost, 2) ?>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>        
</div>




<?php   include_once('inc/footer.php'); ?>