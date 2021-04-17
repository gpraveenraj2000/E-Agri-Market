<?php
session_start();
include('database.php');
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query(
$mysql,
"SELECT * FROM `products` WHERE `code`='$code'"
);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$image = $row['image'];
 
$cartArray = array(
 $code=>array(
 'name'=>$name,
 'code'=>$code,
 'price'=>$price,
 'quantity'=>1,
 'image'=>$image)
);
 
if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($code,$array_keys)) {
 $status = "<div class='box' style='color:red;'>
 Product is already added to your cart!</div>"; 
    } else {
    $_SESSION["shopping_cart"] = array_merge(
    $_SESSION["shopping_cart"],
    $cartArray
    );
    $status = "<div class='box'>Product is added to your cart!</div>";
 }
 
 }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
  <title>vegetables</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  body{
	  font-family: times new roman;
	  
  }
  .container-fluid{
      font-family: times new roman;
  }
  .card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: times new roman;
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
  }
  * {
  box-sizing: border-box;
}

.column {
  float: left;
  width: 33.33%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}


.product_wrapper {
 float:left;
 padding: 10px;
 text-align: center;
 }
.product_wrapper:hover {
 box-shadow: 0 0 0 2px #e5e5e5;
 cursor:pointer;
 }
.product_wrapper .name {
 font-weight:bold;
 }
.product_wrapper .buy {
 text-transform: uppercase;
 background: #F68B1E;
 border: 1px solid #F68B1E;
 cursor: pointer;
 color: #fff;
 padding: 8px 40px;
 margin-top: 10px;
}
.product_wrapper .buy:hover {
 background: #f17e0a;
 border-color: #f17e0a;
}
.message_box .box{
 margin: 10px 0px;
 border: 1px solid #2b772e;
 text-align: center;
 font-weight: bold;
 color: #2b772e;
 }
.table td {
 border-bottom: #F0F0F0 1px solid;
 padding: 10px;
 }
.cart_div {
 float:right;
 font-weight:bold;
 position:relative;
 }
.cart_div a {
 color:#000;
 } 
.cart_div span {
 font-size: 12px;
 line-height: 14px;
 background: #F68B1E;
 padding: 2px;
 border: 2px solid #fff;
 border-radius: 50%;
 position: absolute;
 top: -1px;
 left: 13px;
 color: #fff;
 width: 20px;
 height: 20px;
 text-align: center;
 }
.cart .remove {
 background: none;
 border: none;
 color: #0067ab;
 cursor: pointer;
 padding: 0px;
 }
.cart .remove:hover {
 text-decoration:underline;
 }

</style>

</head>
<body>

  <nav class="navbar navbar-inverse navbar-fixed">
    <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="smart agri.html">E-Agri Market</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span>  Home</a></li>
        <form class="navbar-form navbar-left" action="/action_page.php">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
		<li><a href="about.html"><span class="glyphicon glyphicon-globe"></span>  About</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-tag"></span>  More <span class="caret"></span></a>
          <ul class="dropdown-menu">
             <li><a href="#">24 * 7 Help</a></li>
             <li><a href="agri.html">Our Products</a></li>
		     <li><a href="#">comments</a></li>
          </ul>
        </li>
		<li>
		<div id="google_translate_element"></div>
<script> 
function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'en'
  }, 'google_translate_element');
}
</script>
<script src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> 
		</li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
	  	  <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
        <li><a href="welcome.php"><span class="glyphicon glyphicon-user"></span> My Profile</a></li>
		        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> logout</a></li>

      </ul>
    </div>
	</div>
</nav>
<div class="container-fluid">
<center><b><h1>Fresh Vegetables</h1></b></center>
<br><a href="https://rates.goldenchennai.com/vegetable-price/tirunelveli-vegetable-price-today/" button class="btn btn-default btn-lg"> Today's Market Price </a></button>
<center> <div class="thumbnail">
       
          <img src="pictures\i2.jpg" class="img-circle" alt="Nature" style="width:50%">
          <div class="caption">
            <center><h3><p>Fresh Vegetables</p></h3></center>
          </div>
       
      </div></center>
</div>
<center><h1>What we Have,<h1></center>
<div class="container">

<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart.php"><h1><span class="glyphicon glyphicon-shopping-cart"> Cart<span>
<?php echo $cart_count; ?></span></h1></a>
</div>
<?php
}
?>

<?php

$result = mysqli_query($mysql,"SELECT * FROM `products`");

while($row = mysqli_fetch_assoc($result)){
	
    echo "<div class='product_wrapper'>
	
    <form method='post' action=''>
    <input type='hidden' name='code' value=".$row['code']." />
    <div class='image'><img src='".$row['image']."'width='100' height='80' /></div>
    <div class='name'>".$row['name']."</div>
    <div class='price'>price: ".$row['price']."/kg</div>
    <button type='submit' class='buy'>Buy Now</button>
    </form>
	
    </div>";
	
        }
mysqli_close($mysql);
?>

 
<div style="clear:both;"></div>
 
<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>


</div>
</body>
</html>