<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
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
 *font-size:30px;
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
 width:250px;
 border: transparent;
  outline: none;
   border-bottom: 1px solid black;
   color:black;
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
 font-size:30px;
 font-weight:bold;
 text-align:center;
 color:white;
 
}
#login{
 float:right;
 width:50%;
}
#login-sg{
 margin-top:25%;
}

  </style>
  
  
  
</head>
<body>

<div class="jumbotron text-center">
  <h1>My First Bootstrap Page</h1>
  <p>Resize this responsive page to see the effect!</p> 
</div>
  
<div class="container">
  <div class="row">
    <div class="col-sm-256">
       
	   
	
<?php
$remarks = isset($_GET['remarks']) ? $_GET['remarks'] : '';
if ($remarks==null and $remarks=="") {
echo ' <div id="reg-head" class="headrg">Register Here</div> ';
}
if ($remarks=='success') {
echo ' <div id="reg-head" class="headrg">Registration Success</div> ';
}
if ($remarks=='failed') {
echo ' <div id="reg-head-fail" class="headrg">Registration Failed!, Username exists</div> ';
}
if ($remarks=='error') {
echo ' <div id="reg-head-fail" class="headrg">Registration Failed! <br> Error: '.$_GET['value'].' </div> ';
}
?>
</div>
<form name="reg" action="execute.php" onsubmit="return validateForm()" method="post" id="reg">
<table border="0" align="center" cellpadding="2" cellspacing="0">
<tr>
<td class="t-1">
<div align="left" id="tb-name">First&nbsp;Name:</div>
</td>
<td width="171">
<input type="text" name="firstname" id="tb-box"/>
</td>
</tr>
<tr>
<td class="t-1"><div align="left" id="tb-name">Last&nbsp;Name:</div></td>
<td><input type="text" name="lastname" id="tb-box"/></td>
</tr>
<tr>
<td class="t-1"><div align="left" id="tb-name">Username:</div></td>
<td><input type="text" id="tb-box" name="username" /></td>
</tr>

<tr>
<td class="t-1"><div align="left" id="tb-name">Address:</div></td>
<td><input type="text" id="tb-box" name="address" /></td>
</tr>
<tr>
<td class="t-1"><div align="left" id="tb-name">city:</div></td>
<td><select id="tb-box" type="text" name="city" class="input-field" >
        <option selected> </option>
        <option>chennai</option>
		 <option>vilupuram</option>
		  <option>tiruchy</option>
		   <option>madurai</option>
		    <option>Tirunelveli</option>
			 <option>Tutucorin</option>
			  <option>Kanyakumari</option>
			   <option>Kanchipuram</option>
			    
      </select></td>
</tr>
<tr>
<td class="t-1"><div align="left" id="tb-name">Email:</div></td>
<td><input type="text" id="tb-box" name="email" /></td>
</tr>
<tr>
<td class="t-1"><div align="left" id="tb-name">PhoneNumber:</div></td>
<td><input type="text" id="tb-box" name="phone_number" /></td>
</tr>
<tr>
<td class="t-1"><div align="left" id="tb-name">Password:</div></td>
<td><input id="tb-box" type="password" name="password" /></td>
</tr>
</table>
<div id="st"><input name="submit" type="submit" value="Submit" id="st-btn"/></div>
</form>

    <div class="col-sm-256">
      
	  
	 
<form action="" method="POST" id="signin" id="reg">
<?php
$remarks = isset($_GET['remark_login']) ? $_GET['remark_login'] : '';
if ($remarks==null and $remarks=="") {
echo ' <div id="reg-head" class="headrg">Login Here</div> ';
}
if ($remarks=='failed') {
echo ' <div id="reg-head-fail" class="headrg">Login Failed!, Invalid Credentials</div> ';
}
?>
<table border="0" align="center" cellpadding="2" cellspacing="0">
<tr id="lg-1">
<td class="tl-1"><div align="left" id="tb-name">Username:</div></td>
<td><input type="text" id="tb-box" name="username" /></td>
</tr>
<tr id="lg-1">
<td class="tl-1"><div align="left" id="tb-name">Password:</div></td>
<td><input id="tb-box" type="password" name="password" /></td>
</tr>
</table>
<div id="st"><input name="submit" type="submit" value="Login" id="st-btn"/></div>
</form>

    
  </div>
</div>

</body>
</html>
