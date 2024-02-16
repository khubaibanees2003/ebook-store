<?php
session_start();
include('dashmin-1.0.0/dbcon.php');
// signup

if(isset($_POST['register'])){
  $username = $_POST['name'];
  $useremail = $_POST['email'];
  $userpassword = $_POST['password'];
  $query = $pdo->prepare("insert  into users (name, email ,password) values ( :name ,:email , :password) ");
  
  $query->bindParam('name',$username);
  $query->bindParam('email',$useremail);
  $query->bindParam('password',$userpassword);
  $query->execute();
  echo" <script> 
  alert('register succesfully');
  location.assign('index.php');
  </script> ";
  
}


// login
if(isset($_POST['login'])){
    $useremail = $_POST['email'];
    $userpassword = $_POST['password'];
    $query = $pdo->prepare("select * from users where email = :email AND password = :password");
    $query->bindParam('email',$useremail);
    $query->bindParam('password',$userpassword);
    $query->execute();
    $res = $query->fetch(PDO::FETCH_ASSOC);
    if($res){ 
    if($res['role_id'] == 1 ){
      $_SESSION['email'] = $res['email'];
      $_SESSION['name'] = $res['name'];
      $_SESSION['id'] = $res['id'];
      echo" <script> 
      alert('login succesfully');
      location.assign('dashmin-1.0.0/index.php');
      </script> ";
    } 
    else if($res['role_id'] == 2 ){
        $_SESSION['uemail'] = $res['email'];
        $_SESSION['uname'] = $res['name'];
        $_SESSION['uid'] = $res['id'];
        echo" <script> 
        alert('login succesfully');
        location.assign('index.php');
        </script> ";
      } 
}
else {
  echo" <script> 
  alert('Incorrect email or password. Please try again.');
  </script> ";
}
}


?>