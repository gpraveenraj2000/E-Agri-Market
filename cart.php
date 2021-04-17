<?php
session_start();
$_SESSION['User'] = session_id();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST["code"] == $key){
      unset($_SESSION["shopping_cart"][$key]);
      $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
      }
      if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
      } 
}
}
 
if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}
   
}
?>
<html>
<head>
<title>cart</title>
</head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
body{
	font-family: times new roman;
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
        <li><a href="nextindex.html"><span class="glyphicon glyphicon-home"></span>  Home</a></li>
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
	  	  <li class="active"><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
        <li><a href="welcome.php"><span class="glyphicon glyphicon-user"></span> My Profile</a></li>
		        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> logout</a></li>

      </ul>
    </div>
	</div>
</nav>

<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?> 
<table class="table">
<tbody>
<tr>
<td></td>
<td>ITEM NAME</td>
<td>QUANTITY</td>
<td>UNIT PRICE</td>
<td>ITEMS TOTAL</td>
</tr> 
<?php 
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td>
<img src='<?php echo $product["image"]; ?>' width="100" height="80" />
</td>
<td><?php echo $product["name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onChange="this.form.submit()">
<option <?php if($product["quantity"]==1) echo "selected";?>
value="1">1</option>
<option <?php if($product["quantity"]==2) echo "selected";?>
value="2">2</option>
<option <?php if($product["quantity"]==3) echo "selected";?>
value="3">3</option>
<option <?php if($product["quantity"]==4) echo "selected";?>
value="4">4</option>
<option <?php if($product["quantity"]==5) echo "selected";?>
value="5">5</option>
</select>
</form>
</td>
<td><?php echo "$".$product["price"]; ?></td>
<td><?php echo "$".$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "$".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table> 
  <?php
}else{
 echo "<h3>Your cart is empty!</h3>";
 }
?>
</div>
 
<div style="clear:both;"></div>
 
<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>



</body>
</html>