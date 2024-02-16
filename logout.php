<?php
 session_start();
unset($_SESSION['email']);
 echo "<script>
 location.assign('../index.php');
 </script>";
?>