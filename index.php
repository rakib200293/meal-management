
        <?php 
        include_once('inc/header.php'); 
        include_once('inc/connection.php');
        ?>
        
        <style>
        .card-body {
            padding: 1rem;
        }
        .table td, .table th {
          padding: 5px 20px;
        }
        </style>


        <?php
          $query = "SELECT m.*, SUM(m.meal_quantity) AS qty, 
              (SELECT name FROM users WHERE id = m.user_id) AS user_name,
              (SELECT SUM(`cost`) FROM bazar_cost 
              WHERE DATE_FORMAT(date, '%m') = DATE_FORMAT(m.meal_date, '%m') 
              AND 
              DATE_FORMAT(date, '%Y') = YEAR(CURDATE()) 
              GROUP BY DATE_FORMAT(date, '%m')) AS total_cost 
              FROM meals AS m 
              WHERE is_approved = 1 AND DATE_FORMAT(m.meal_date, '%Y') = YEAR(CURDATE()) 
              GROUP BY DATE_FORMAT(m.meal_date, '%m')
          ";
          $result = mysqli_query($conn, $query);
        ?>
		
		<div class="container-fluid px-xl-5">
		  <section class="py-5">
			 <div class="row">

            <?php
              while ($row = $result->fetch_assoc()) {
            ?>

            <div class="col-lg-4 mb-4">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0"><?= date('F Y', strtotime($row['meal_date'])) ?></h6>
                  </div>
                  <div class="card-body">
                  <table class="table table-borderless">
                    <tr>
                      <td>Meal Quantity</td>
                      <td>:</td>
                      <td><?= $row['qty'] ?></td>
                    </tr>
                    <tr>
                      <td>Bazar Cost</td>
                      <td>:</td>
                      <td><?= number_format($row['total_cost'], 2) ?></td>
                    </tr>
                    <tr>
                      <td>Meal Charge</td>
                      <td>:</td>
                      <td><?= number_format($row['total_cost'] / $row['qty'], 2) ?></td>
                    </tr>
                  </table>
                  </div>
              </div>
          </div>

          <?php } ?>

			  </div>
		  </section>
		</div>
		
		
		
        <?php include_once('inc/footer.php'); ?>
   
				


	  
	  
	  
	  
       
       