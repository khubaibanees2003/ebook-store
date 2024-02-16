
<?php
include("query.php");
include("header.php");

?>
  <!-- Blank Start -->
  <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded  mx-0">
                    <div class="col-md-8 ">
                        <h3 class="p-4">All categories</h3>
                        <table class="table mt-5 p-4">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>action</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = $pdo->query("select * from books_category");
                                // var_dump($query);
                                $allCategories = $query->fetchAll(PDO::FETCH_ASSOC);
                                // print_r($allCategories);
                                foreach($allCategories as $singleCategory){
                                    ?>
                                    <tr>
                                        <td><?php echo $singleCategory['name']?></td>
                                        <td><?php echo $singleCategory['description']?></td>
                                        <td><img height="70px" src="img/<?php echo $singleCategory['image'] ?>" alt=""></td>
                                        <td><a  class="btn btn-info text-light" href="updatecat.php?id=<?php echo $singleCategory['id']?>" >Edit</a></td>  
                                        <td><a href="?delete_id=<?php echo $singleCategory['id'] ?>" class="btn btn-danger text-light">Delete</a></td> 
                                        <?php
                                        if (isset($_GET['delete_id'])) {
                                            $delete_id = $_GET['delete_id'];
                                            $deleteQuery = $pdo->prepare("DELETE FROM books_category WHERE id = :delete_id");
                                            $deleteQuery->bindParam(':delete_id', $delete_id);
                                            $deleteQuery->execute();
                                            echo "<script>alert('Book deleted successfully');
                                            location.assign('viewbook.php');
                                            </script>";
                                        }
                                        ?>
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
include("footer.php");
