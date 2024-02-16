<?php
include('query.php');
include('header.php');
?>
<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Add Book</h6>
                            <form method="post" enctype="multipart/form-data">
                                <div class="Form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="pName" class="form-control" id="">
                                </div>
                                <div class="Form-group">
                                    <label for="">Price</label>
                                    <input type="text" name="pPrice" class="form-control" id="">
                                </div>
                                <div class="Form-group">
                                    <label for="">Author name</label>
                                    <input type="text" name="pAuthor" class="form-control" id="">
                                </div>
                                <div class="Form-group">
                                <label for="" class="form-label">Description</label>
                                <input type="text" name="pDes" class="form-control" id="">
                                </div>
                                <div class="Form-group">
                                <label for="" class="form-label">Quantity</label>
                                <input type="text" name="pQty" class="form-control"  id="">
                                </div>
                                <div class="Form-group">
                                <label for="" class="form-label">Image</label>
                                <input type="file" name="pImage" class="form-control"  id="">
                                </div>
                                <div class="Form-group">
                                 <label for="" class="form-label">Category</label>
                                 <select class="form-control" name="cId" id="">
                                    <option>Select Category</option>
                                    <?php
                                    $query = $pdo->query("Select * from books_category");
                                    $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($res as $cat){
                                        ?>
                                       <option value="<?php echo $cat ['id'] ?>" ><?php echo $cat ['name'] ?></option>
                                   
                                    <?php
                                    }
                                    ?>
                                 </select>
                                </div>
                                <!-- <div class="Form-group">
                                <label for="" class="custom-file">PDF</label>
                                <input type="file" name="up_pdf" class="form-control"  id="">
                                </div> -->
                                <button name="addProduct" type="submit" class="btn btn-primary">Add Product</button>
                            </form>
                        </div>
                    </div>
                </div>
</div>
            

<?php
include('footer.php');
?>