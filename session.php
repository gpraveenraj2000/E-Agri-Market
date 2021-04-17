<?php
include('database.php');
session_start();

$user_check=$_SESSION['login_user'];
$ses_sql=mysqli_query($mysql,"select username,id from signin where username='$user_check'");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$loggedin_session=$row['username'];
$loggedin_id=$row['id'];
if(!isset($loggedin_session) || $loggedin_session==NULL) {
 echo "Go back";
 header("Location: signin.php");
}
?>