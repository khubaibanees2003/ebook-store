<?php
include('query.php');
include('header.php');
?>
<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Add Category</h6>
                            <form method="post" enctype="multipart/form-data">
                                <div class="Form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="cName" class="form-control" id="">
                                </div>
                                <div class="Form-group">
                                    <label for="">Description</label>
                                    <input type="text"name="cDes" class="form-control" id="">
                                </div>
                               
                                <div class="Form-group">
                                <label for="" class="form-label">Image</label>
                                <input type="file" name="cImage" class="form-control" type="file" id="">
                                </div>
                                <button name="addcategory" type="submit" class="btn btn-primary">Add Category</button>
                            </form>
                        </div>
                    </div>
                </div>
</div>
            

<?php
include('footer.php');
?>