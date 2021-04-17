<?php 
session_start();
include('database.php');
$username=$_POST['username'];
$result = mysqli_query($mysql,"SELECT * FROM signin WHERE username='$username'");
$num_rows = mysqli_num_rows($result);
if ($num_rows) {
 header("location: signin.php?remarks=failed"); 
}else {
 $firstname=$_POST['firstname'];
 $lastname=$_POST['lastname'];
 $username=$_POST['username'];
 $address=$_POST['address'];
 $city=$_POST['city'];
 $email=$_POST['email'];
 $phone_number=$_POST['phone_number'];
 $password=$_POST['password'];
 if(mysqli_query($mysql,"INSERT INTO signin(firstname, lastname, username, address, city, email, phone_number , password)VALUES('$firstname', '$lastname','$username','$address','$city', '$email','$phone_number', '$password')")){ 
 header("location: signin.php?remarks=success");
 }else{
  $e=mysqli_error($mysql);
 header("location: signin.php?remarks=error&value=$e");  
 }
}
?>