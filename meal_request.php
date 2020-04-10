<?php   include_once('inc/header.php'); ?>

<?php
    include './inc/connection.php';

    function username($con, $id)
    {
        $query = "SELECT username FROM users WHERE id = '$id'";
        $result = $con->query($query)->fetch_assoc();
        return ucwords($result['username']);
    }
?>

<div class="container-fluid px-xl-5">
    <section class="py-5">		
        <div class="row">
        
            <div class="col-md-10 offset-md-1 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Meal Request</h3>
                    </div>
                    <div class="card-body">

                    <?php
                        if (isset($_POST['approve_btn'])) {
                            $id = $_POST['id'];
                            $query = "UPDATE meals SET is_approved = '1' WHERE id = '$id'";
                            $result = $conn->query($query);
                            if ($result == true) {
                                echo '<div class="alert alert-success">Meal request approved.</div>';
                            } else {
                                echo '<div class="alert alert-danger">Meal request approve failed.</div>';
                            }
                        }

                        if (isset($_POST['reject_btn'])) {
                            $id = $_POST['id'];
                            $query = "UPDATE meals SET is_approved = '2' WHERE id = '$id'";
                            $result = $conn->query($query);
                            if ($result == true) {
                                echo '<div class="alert alert-success">Meal request reject.</div>';
                            } else {
                                echo '<div class="alert alert-danger">Meal request reject failed.</div>';
                            }
                        }
                    ?>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>#</th>
                                    <th>Member</th>
                                    <th>Meal Quantity</th>
                                    <th>Approve Status</th>
                                </tr>
                                <?php
                                    $query = "SELECT * FROM meals ORDER BY id DESC";
                                    $result = $conn->query($query);
                                    if ($result->num_rows > 0) {
                                        foreach ($result as $key => $item) {
                                ?>
                                <tr>
                                    <td><?= ++$key ?></td>
                                    <td><?= username($conn, $item['user_id']) ?></td>
                                    <td><?= $item['meal_quantity'] ?></td>
                                    <td>
                                        <?php if ($item['is_approved'] == 0) { ?>
                                        <div class="btn-group">
                                            <form method="post">
                                                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                                <input type="submit" name="approve_btn" value="Approve" class="btn btn-success btn-sm">
                                            </form>
                                            <form method="post">
                                                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                                <input type="submit" name="reject_btn" value="Reject" class="btn btn-danger btn-sm">
                                            </form>
                                        </div>
                                        <?php } else if ($item['is_approved'] == 1) { ?>
                                            <span class="badge badge-success">Approved</span>
                                        <?php } else if ($item['is_approved'] == 2) { ?>
                                            <span class="badge badge-danger">Rejected</span>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php } } ?>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        
        </div>
    </section>	
</div>

<?php   include_once('inc/footer.php'); ?>