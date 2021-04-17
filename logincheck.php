<?php
include("database.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
 $username=mysqli_real_escape_string($mysql,$_POST['username']);
 $password=mysqli_real_escape_string($mysql,$_POST['password']);
 $result = mysqli_query($mysql,"SELECT * FROM signin");
 $c_rows = mysqli_num_rows($result);
 if ($c_rows!=$username) {
  header("location: signin.php?remark_login=failed");
 }
 $sql="SELECT id FROM signin WHERE username='$username' and password='$password'";
 $result=mysqli_query($mysql,$sql);
 $row=mysqli_fetch_array($result);
 $active=$row['active'];
 $count=mysqli_num_rows($result);
 if($count==1) {
  $_SESSION['login_user']=$username;
  header("location: nextindex.html");
 }
}
?>