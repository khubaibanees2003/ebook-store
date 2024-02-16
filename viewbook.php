<?php
include("query.php");
include("header.php");

?>
  <!-- Blank Start -->
  <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded  mx-0">
                    <div class="col-md-8 ">
                        <h3 class="p-4">All Books</h3>
                        <table class="table mt-5 p-4">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Author</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>Category </th>
                                        <th>Image</th>
                                        <th>action</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = $pdo->query("SELECT books.* , books_category.name as 'Category Name' from books inner join books_category on books.cid = books_category.id");
                                // var_dump($query);
                                $allproducts = $query->fetchAll(PDO::FETCH_ASSOC);
                                // print_r($allproducts);
                                foreach($allproducts as $singleproduct){
                                    ?>
                                    <tr>
                                        <td><?php echo $singleproduct['name']?></td>
                                        <td><?php echo $singleproduct['price']?></td>
                                         <td><?php echo $singleproduct['author']?></td>
                                        <td><?php echo $singleproduct['description']?></td>
                                        <td><?php echo $singleproduct['quantity']?></td>
                                        <td><?php echo $singleproduct['Category Name']?></td>
                                        <td><img height="70px" src="img/<?php echo $singleproduct['image'] ?>" alt=""></td>
                                        <td><a  class="btn btn-info text-light" href="updatebook.php?id=<?php echo $singleproduct['id']?>" >Edit</a></td>  
                                        <td><a href="?delete_id=<?php echo $singleproduct['id'] ?>" class="btn btn-danger text-light">Delete</a></td> 
                                        <?php
                                        if (isset($_GET['delete_id'])) {
                                            $delete_id = $_GET['delete_id'];
                                            $deleteQuery = $pdo->prepare("DELETE FROM books WHERE id = :delete_id");
                                            $deleteQuery->bindParam(':delete_id', $delete_id);
                                            $deleteQuery->execute();
                                            echo "<script>alert('Book deleted successfully');
                                            location.assign('viewbook.php');
                                            </script>";

                                        }
                                        ?>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Blank End -->


<?php
include("footer.php");
?>