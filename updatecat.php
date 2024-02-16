<?php
include('query.php');
include('header.php');
?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = $pdo->prepare('select * from books_category where id = :id');
    $query->bindParam('id',$id);
    $query->execute();
    $Cat= $query->fetch(PDO::FETCH_ASSOC);
}
?>
<div class="container-fluid pt-4 px-4">
                <div class="row g-4">

                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Update Category</h6>
                            <form method="post" enctype="multipart/form-data">
                                <div class="Form-group">
                                    <input type="hidden" value="<?php echo $Cat['id']?>" name = "cId">
                                    <label for="">Name</label>
                                    <input value="<?php echo $Cat['name']?>" type="text" name="cName" class="form-control" id="">
                                </div>
                                <div class="Form-group">
                                    <label for="">Description</label>
                                    <input value="<?php echo $Cat['description']?>" type="text" name="cDes" class="form-control" id="">
                                </div>
                               
                                <div class="Form-group">
                                <label for="" class="form-label">Image</label>
                                <input type="file" name="cImage" class="form-control" id="">
                                <span><?php echo $Cat['image']?></span>
                            </div>
                                <button name="updatecategory" type="submit" class="btn btn-primary">Update Ctegory</button>
                            </form>
                        </div>
                    </div>
                    </div>
                    </div>
            

<?php
include('footer.php');
?>