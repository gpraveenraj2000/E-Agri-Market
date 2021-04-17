<?php
 include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
 <meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
 <!--<link rel="stylesheet" type="text/css" href="style.css" />-->
 <title>welcome Demo</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
 
  body,li,ul{
 margin:50px auto;
}
body{
 background-image:url("pictures/sili.jpg");
 background-size: cover;
 background-position: center;

 font-family:times new roman;
}




#center{
 
 margin:100px auto;
 width:95%;
 color: white;
}
#center-set{
 float:left;
 width:100%;
 padding-top:1%;
 padding-bottom:0.5%;
 background-color:;
 *border-top:5px solid #3498DB;
}
#signup{
 float:left;
 width:50%;
}
#signup-st,#login-st{
 background-color:transparent;
 margin:50px;
 border-radius:20px;
 -webkit-box-shadow: 3px 3px 4px 0px rgba(0,0,0,0.85);
}
#reg{
 padding-top:10px;
}
#reg-head,#reg-bottom,#reg-head-fail{
 width:100%;
 text-align:center;
 background-color:white;
 font-weight:bold;
}
.headrg{
 border-top-left-radius:20px;
 border-top-right-radius:20px;
 padding-top:12px;
 padding-bottom:12px;
 font-size:22px;
 color:#6C7A89;
}
.btmrg{
 padding-top:5px;
 padding-bottom:5px;
 border-bottom-left-radius:20px;
 border-bottom-right-radius:20px;
 font-size:18px;
 color:red;
}
#reg-head-fail{
 color:#D35400;
}
#reg-head:hover{
 color:#3498DB;
 transition:1s;
}
#tb-name{
 float:right;
 font-size:20px;
}
#tb-box{
 height:22px;
 width:200px;
 border: none;
  outline: none;
   border-bottom: 1px solid black;
 }
#st{
 width:100%;
 text-align:center;
 padding-top:30px;
 padding-bottom:10px;
}
#st-btn{
 text-align:center;
 padding:10px 21px 10px 21px;
 background-color:#3498DB;
 border:none;
 color:#fff;
 cursor:pointer;
 font-size:20px;
 font-weight:bold;
}
#st-btn:hover{
 color:#3498DB;
 background:green;
 transition:1s;
}
td.t-1{
 float:left;
 width:44%;
 text-align:right;
 color:white;
}
td.t-2{
 float:right;
 width:55%;
}
#lg-1{
 padding:10px;
 float:left;
 width:95%;
}
.tl-1{
 float:left;
 width:40%;
 padding-right:5%;
 text-align:center;
 color:white;
}
.tl-4{
 font-size:20px;
 font-weight:bold;
 text-align:center;
 color:white;
 
}
#login{
 float:right;
 width:50%;
}
#login-sg{
 margin-top:20%;
}

  </style>
  </head>
  
<div id="center">
<div id="center-set"> 
<h1 align='center'>Welcome <?php echo $loggedin_session; ?>,</h1>

<div id="contentbox">
<?php
$sql="SELECT * FROM signin where id=$loggedin_id";
$result=mysqli_query($mysql,$sql);
?>
<?php
while($rows=mysqli_fetch_array($result)){
?>
<div class="container-fluid"> 
<div id="signup">
<div id="signup-st">
<form action="" method="POST" id="signin" id="reg">
<div id="reg-head" class="headrg">Your Profile</div>
<table border="0" align="center" cellpadding="2" cellspacing="0">
<tr id="lg-1">
<td class="tl-1"> <div align="left" id="tb-name">Reg id :</div> </td>
<td class="tl-4"><?php echo $rows['id']; ?></td>
</tr>
<tr id="lg-1">
<td class="tl-1"><div align="left" id="tb-name">Username :</div></td>
<td class="tl-4"><?php echo $rows['username']; ?></td>
</tr>
<tr id="lg-1">
<td class="tl-1"><div align="left" id="tb-name">Name :</div></td>
<td class="tl-4"><?php echo $rows['firstname']; ?> <?php echo $rows['lastname']; ?></td>
</tr>
<tr id="lg-1">
<td class="tl-1"><div align="left" id="tb-name">Email id :</div></td>
<td class="tl-4"><?php echo $rows['email']; ?></td>
</tr>
<tr id="lg-1">
<td class="tl-1"><div align="left" id="tb-name">Address :</div></td>
<td class="tl-4"><?php echo $rows['address']; ?></td>
</tr>
<tr id="lg-1">
<td class="tl-1"><div align="left" id="tb-name">city :</div></td>
<td class="tl-4"><?php echo $rows['city']; ?></td>
</tr>
<tr id="lg-1">
<td class="tl-1"><div align="left" id="tb-name">phoneNumber :</div></td>
<td class="tl-4"><?php echo $rows['phone_number']; ?></td>
</tr>
</table>
</form>
</div>
</div>
<div id="login">
<div id="login-sg">
<div id="st"><a href="nextindex.html" id="st-btn">Home</a></div>

<div id="st"><a href="signin.php" id="st-btn">Sign Out</a></div>
<div id="st"><a href="deleteac.php" id="st-btn">Delete Account</a></div>
</div>
</div>
<?php 
// close while loop 
}
?>
</div>
</div>
</div>
</br>
</div>
</body>
</html>