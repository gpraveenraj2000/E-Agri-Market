<?php
$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "app";
$mysql=new mysqli($servername,$username,$dbpassword,$dbname);
if($mysql->connect_error)
{
die("connection failed".$mysql->connect_error);
}
//echo "connection sucessfull ";
?>