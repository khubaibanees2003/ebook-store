<?php
include('dbcon.php');
session_start();
//add Category

if(isset($_POST['addcategory'])){
  $cName = $_POST['cName'];
  $cDes = $_POST['cDes'];
  $imageName = $_FILES['cImage']['name'];
  $imageTmpName = $_FILES['cImage']['tmp_name'];
  $extension = pathinfo($imageName,PATHINFO_EXTENSION);
  $destination = 'img/'.$imageName;
  if($extension == "jpg" || $extension == "png" || $extension == "jpeg"){
   if(move_uploaded_file($imageTmpName, $destination)){
   $query = $pdo->prepare("insert into books_category(name , description , image) values (:cName , :cDes , :cImage)");
   $query->bindParam('cName', $cName);
   $query->bindParam('cDes', $cDes);
   $query->bindParam('cImage', $imageName);
   $query->execute();
   echo "<script>alert('category added successfully');
   </script>";
  }
 
 }
 else{
  echo "<script>alert('invalid format of file');
   </script>";
 }
  }

   //update category


   if (isset($_POST['updatecategory'])) {
    $cName = $_POST['cName'];
    $cDes = $_POST['cDes'];
    $cId = $_POST['cId'];
    $query = $pdo->prepare("UPDATE books_category SET name = :cName, description = :cDes where id = :cId");
    if(isset($_FILES['cImage'])){
      $imageName = $_FILES['cImage']['name'];
      $imageTmpName = $_FILES['cImage']['tmp_name'];
      $extension = pathinfo($imageName,PATHINFO_EXTENSION);
      $destination = "img/". $imageName;
    
      if($extension == "jpg" || $extension == "png" || $extension == "jpeg" ){
          if(move_uploaded_file($imageTmpName,$destination)){
              $query = $pdo->prepare("UPDATE books_category SET name = :cName, description = :cDes,image = :cImage where id = :cId");
              $query->bindParam('cImage',$imageName);
          
 
    }
  }
 }
              $query->bindParam('cId',$cId); 
              $query->bindParam('cName',$cName);
              $query->bindParam('cDes',$cDes);
              $query->execute();
              echo "<script>alert('Category updated successfully');
              location.assign('viewcat.php');
              </script>";
          
 }
//Add book

if(isset($_POST['addProduct'])){
  $pName = $_POST['pName'];
  $pDes = $_POST['pDes'];
  $pPrice = $_POST['pPrice'];
  $pQty = $_POST['pQty'];
  $cId = $_POST['cId'];
  $pAuthor = $_POST['pAuthor'];
  $imageName = $_FILES['pImage']['name'];
  $imageTmpName = $_FILES['pImage']['tmp_name'];
  $extension = pathinfo($imageName,PATHINFO_EXTENSION);
  $destination = 'img/'.$imageName;
  if($extension == "jpg" || $extension == "png" || $extension == "jpeg") {
   if(move_uploaded_file($imageTmpName, $destination)){
   $query = $pdo->prepare("insert into books(name , description , image , price , quantity , cid , author  ) values (:pName , :pDes , :pImage , :pPrice , :pQty, :cId , :pAuthor )");
   $query->bindParam('pName', $pName);
   $query->bindParam('pDes', $pDes );
   $query->bindParam('pPrice', $pPrice);
   $query->bindParam('pQty',  $pQty);
   $query->bindParam('cId',  $cId);
   $query->bindParam('pImage', $imageName);
   $query->bindParam('pAuthor',  $pAuthor);
   $query->execute();
   echo "<script>alert('Product added successfully');
   </script>";
  }
}

 }
    
   //update book

  if (isset($_POST["updateProduct"])){
    $pId =$_POST['pId'];
    $pName =$_POST["pName"];
    $pPrice =$_POST["pPrice"];
    $pAuthor =$_POST["pAuthor"];
    $pDes =$_POST["pDes"];
    $pQty =$_POST["pQty"];
    $cid =$_POST["cid"];

    $query =$pdo->prepare("UPDATE books SET name = :pName, price = :pPrice, author = :pAuthor, description = :pDes, quantity = :pQty ,cid= :cid where id = :pId");

    if(isset($_FILES['cImage'])){
        $imageName = $_FILES['cImage']['name'];
        $imagetmpName = $_FILES['cImage']['tmp_name'];
        $extension = pathinfo($imageName, PATHINFO_EXTENSION);
        $destination  = 'img/'.$imageName;
        if($extension == "jpg" || $extension == "png" || $extension == "jpeg"){
            if(move_uploaded_file($imagetmpName,$destination)){
               $query = $pdo->prepare("UPDATE books SET name = :pName, price = :pPrice, author = :pAuthor, description = :pDes, quantity = :pQty, image = :cImage , cid = :cid  where id = :pId");
               $query->bindParam("cImage",$imageName);
              
            }
         }
         else{
          echo "<script>alert('erorr');
          location.assign('admin-books.php');
          </script>";
      }
    }
    $query->bindParam("pId",$pId);
    $query->bindParam("cid",$cid);
    $query->bindParam("pName",$pName);
    $query->bindParam("pPrice",$pPrice);
    $query->bindParam("pAuthor",$pAuthor);
    $query->bindParam("pDes",$pDes);
    $query->bindParam("pQty",$pQty);
    $query->execute();
    echo "<script>alert('book updated successfully');
        location.assign('viewbook.php');
    </script>";
}




?> 






