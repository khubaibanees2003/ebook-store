<?php
include('query.php');
include('header.php');
?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = $pdo->prepare("SELECT books.* , books_category.name as 'category_name' FROM books INNER JOIN
    books_category ON books.cid = books_category.id WHERE books.id = :id");
    $query->bindParam(':id', $id);
    $query->execute();
    $product= $query->fetch(PDO::FETCH_ASSOC); 

    
}
?>
  
  <div class="container-fluid pt-4 px-4">
                <div class="row g-4">

                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Update product</h6>
                            <form method="post" enctype="multipart/form-data">
                                <div class="Form-group">
                                    <input type="hidden" value="<?php echo $product['id']?>" name ="pId">
                                    <label for="">Name</label>
                                    <input value="<?php echo $product['name']?>" type="text" name="pName" class="form-control" id="">
                                </div>
                                <div class="Form-group">
                                    <label for="">price</label>
                                    <input value="<?php echo $product['price']?>" type="text" name="pPrice" class="form-control" id="">
                                </div>
                                <div class="Form-group">
                                    <label for="">Author</label>
                                    <input value="<?php echo $product['author']?>" type="text" name="pAuthor" class="form-control" id="">
                                </div>
                                <div class="Form-group">
                                    <label for="">Description</label>
                                    <input value="<?php echo $product['description']?>" type="text" name="pDes" class="form-control" id="">
                                </div>
                                <div class="Form-group">
                                    <label for="">Quantity</label>
                                    <input value="<?php echo $product['quantity']?>" type="text" name="pQty" class="form-control" id="">
                                </div>
                                <div class="Form-group">
                                    <label for="">Category</label>
                                    <input value="<?php echo $product['category_name']?>" type="text" name="cid" class="form-control" id="">
                                    <select class="form-control" name="cid" id="">
                                    <option>Select Category</option>
                                    <?php
                            $categoryQuery = $pdo->query("SELECT * FROM books_category");
                            $categories = $categoryQuery->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($categories as $category){
                            ?>
                            <option value="<?php echo $category['id'] ?>" <?php echo ($product['cid'] == $category['id']) ? 'selected' : ''; ?>><?php echo $category['name'] ?></option>
                                       
                                   
                                    <?php
                                    }
                                    ?>

                                </select>

                                </div>
                                 <div class="Form-group">
                                 <label for="" class="form-label">Image</label>
                                 <input type="file" name="cImage" class="form-control" id="">
                                 <span><?php echo $product['image']?></span>
                               </div>

                                 <button name="updateProduct" type="submit" class="btn btn-primary">Update Product</button>
                     </form>
                             </div>
                    </div>
                    </div>
                    </div>

<?php
include('footer.php');
?>