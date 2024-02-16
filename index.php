
<?php
  include('query.php');
  include('header.php');
 ?>
 <?php
  if(!isset($_SESSION['email'])){
    echo"<script>
    location.assign('../login.php');
    </script>";
  } 
 ?>


  <!-- Blank Start -->
  <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded  mx-0">
                    <div class="col-md-8 ">
                        <h3 class="p-4">ORDERS</h3>
                        <table class="table mt-5 p-4">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Product Name</th>
                                        <th>Product price</th>
                                        <th>Product Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = $pdo->query("select * from orders");
                                // var_dump($query);
                                $allorders = $query->fetchAll(PDO::FETCH_ASSOC);
                                // print_r($allCategories);
                                foreach($allorders as $singleorders){
                                    ?>
                                    <tr>
                                        <td><?php echo $singleorders['u_name']?></td>
                                        <td><?php echo $singleorders['p_name']?></td>
                                        <td><?php echo $singleorders['p_price']?></td>
                                        <td><?php echo $singleorders['p_qty']?></td>                                        

                                       
                                    </tr>
                                    <?php
                                };
                                    ?>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Blank End -->



        
           

<?php
 include('footer.php');
?>
          