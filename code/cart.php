<?php
session_start ();
require 'connect.php';
require 'item.php';
if (isset ( $_GET ['id'] ) && !isset($_POST['update'])) {

	$result = mysqli_query ( $con, 'select * from product where id=' . $_GET ['id'] );
	$product = mysqli_fetch_object ( $result );
	$item = new Item ();
	$item->id = $product->id;
	$item->name = $product->name;
	$item->price = $product->price;
	$item->quantity = 1;
	// Check product is existing in cart
	$index = - 1;
	if (isset ( $_SESSION ['cart'] )) {
		$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
		for($i = 0; $i < count ( $cart ); $i ++)
		if ($cart [$i]->id == $_GET ['id']) {
			$index = $i;
			break;
		}
	}
	if ($index == - 1)
	$_SESSION ['cart'] [] = $item;
	else {
		$cart [$index]->quantity ++;
		$_SESSION ['cart'] = $cart;
	}
}

// Delete product in cart
if (isset ( $_GET ['index'] ) && !isset($_POST['update'])) {
	$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
	unset ( $cart [$_GET ['index']] );
	$cart = array_values ( $cart );
	$_SESSION ['cart'] = $cart;
}

// Update quantity in cart
if(isset($_POST['update'])) {
	$arrQuantity = $_POST['quantity'];

	// Check validate quantity
	$valid = 1;
	for($i=0; $i<count($arrQuantity); $i++)
	if(!is_numeric($arrQuantity[$i]) || $arrQuantity[$i] < 1){
		$valid = 0;
		break;
	}
	if($valid==1){
		$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
		for($i = 0; $i < count ( $cart ); $i ++) {
			$cart[$i]->quantity = $arrQuantity[$i];
		}
		$_SESSION ['cart'] = $cart;
	}
	else
		$error = 'Quantity is InValid';
}

?>
<?php echo isset($error) ? $error : ''; ?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
					<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
					<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
					<script src="https://kit.fontawesome.com/a076d05399.js"></script>
							<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="jquery.tabledit.min.js"></script>

		<title>Ticket Booking System</title>
		<link rel="icon" href="image/logo.jpg" type="image/gif" sizes="16x16">
  </head>
	<style>
	.row {
display: -ms-flexbox; /* IE10 */
display: flex;
-ms-flex-wrap: wrap; /* IE10 */
flex-wrap: wrap;
margin: 0 -16px;
}

.col-25 {
-ms-flex: 25%; /* IE10 */
flex: 25%;
}

.col-50 {
-ms-flex: 50%; /* IE10 */
flex: 50%;
}

.col-75 {
-ms-flex: 75%; /* IE10 */
flex: 75%;
}

.col-25,
.col-50,
.col-75 {
padding: 0 16px;
}

.container {
background-color: white;
padding: 5px 20px 15px 20px;
border-radius: 3px;
	max-width: 850px;
	padding-top: 10px;
}

input[type=text] {
width: 100%;
height: 30px;
margin-bottom: 10px;
padding: 12px;
border: 1px solid #ccc;
border-radius: 3px;
}

label {
margin-bottom: 10px;
display: block;
}

.icon-container {
margin-bottom: 20px;
padding: 7px 0;
font-size: 24px;
}

.btn {
background-color: #4CAF50;
color: white;
padding: 12px;
margin: 10px 0;
border: none;
width: 100%;
border-radius: 3px;
cursor: pointer;
font-size: 15px;

}

.btn:hover {
background-color: #45a049;
}

span.price {
float: right;
color: grey;
}


.parallax{
	background-image: url("image/parallax.jpg");
	background-attachment: fixed;
	background-position: center;
	background-repeat: no-repeat;
	background-size: cover;
	padding-bottom: 100px;

}

.site-footer
{
background-color:#26272b;
padding:45px 0 20px;
font-size:15px;
line-height:24px;
color:#737373;
}
.site-footer hr
{
border-top-color:#bbb;
opacity:0.5
}
.site-footer hr.small
{
margin:20px 0
}
.site-footer h6
{
color:#fff;
font-size:16px;
text-transform:uppercase;
margin-top:5px;
letter-spacing:2px
}
.site-footer a
{
color:#737373;
}
.site-footer a:hover
{
color:#3366cc;
text-decoration:none;
}
.footer-links
{
padding-left:0;
list-style:none
}
.footer-links li
{
display:block
}
.footer-links a
{
color:#737373
}
.footer-links a:active,.footer-links a:focus,.footer-links a:hover
{
color:#3366cc;
text-decoration:none;
}
.footer-links.inline li
{
display:inline-block
}
.site-footer .social-icons
{
text-align:right
}
.site-footer .social-icons a
{
width:40px;
height:40px;
line-height:40px;
margin-left:6px;
margin-right:0;
border-radius:100%;
background-color:#33353d
}
.copyright-text
{
margin:0
}
@media (max-width:991px)
{
.site-footer [class^=col-]
{
margin-bottom:30px
}
}
@media (max-width:767px)
{
.site-footer
{
padding-bottom:0
}
.site-footer .copyright-text,.site-footer .social-icons
{
text-align:center
}
}
.social-icons
{
padding-left:0;
margin-bottom:0;
list-style:none
}
.social-icons li
{
display:inline-block;
margin-bottom:4px
}
.social-icons li.title
{
margin-right:15px;
text-transform:uppercase;
color:#96a2b2;
font-weight:700;
font-size:13px
}
.social-icons a{
background-color:#eceeef;
color:#818a91;
font-size:16px;
display:inline-block;
line-height:44px;
width:44px;
height:44px;
text-align:center;
margin-right:8px;
border-radius:100%;
-webkit-transition:all .2s linear;
-o-transition:all .2s linear;
transition:all .2s linear
}
.social-icons a:active,.social-icons a:focus,.social-icons a:hover
{
color:#fff;
background-color:#29aafe
}
.social-icons.size-sm a
{
line-height:34px;
height:34px;
width:34px;
font-size:14px
}
.social-icons a.facebook:hover
{
background-color:#3b5998
}
.social-icons a.twitter:hover
{
background-color:#00aced
}
.social-icons a.linkedin:hover
{
background-color:#007bb6
}
.social-icons a.dribbble:hover
{
background-color:#ea4c89
}
th{
font-size: 17px;
}
@media (max-width:767px)
{
.social-icons li.title
{
display:block;
margin-right:0;
font-weight:600
}
}


.site-footer
{
background-color:#26272b;
padding:45px 0 20px;
font-size:15px;
line-height:24px;
color:#737373;
}
.site-footer hr
{
border-top-color:#bbb;
opacity:0.5
}
.site-footer hr.small
{
margin:20px 0
}
.site-footer h6
{
color:#fff;
font-size:16px;
text-transform:uppercase;
margin-top:5px;
letter-spacing:2px
}
.site-footer a
{
color:#737373;
}
.site-footer a:hover
{
color:#3366cc;
text-decoration:none;
}
.footer-links
{
padding-left:0;
list-style:none
}
.footer-links li
{
display:block
}
.footer-links a
{
color:#737373
}
.footer-links a:active,.footer-links a:focus,.footer-links a:hover
{
color:#3366cc;
text-decoration:none;
}
.footer-links.inline li
{
display:inline-block
}
.site-footer .social-icons
{
text-align:right
}
.site-footer .social-icons a
{
width:40px;
height:40px;
line-height:40px;
margin-left:6px;
margin-right:0;
border-radius:100%;
background-color:#33353d
}
.copyright-text
{
margin:0
}
@media (max-width:991px)
{
.site-footer [class^=col-]
{
margin-bottom:30px
}
}
@media (max-width:767px)
{
.site-footer
{
padding-bottom:0
}
.site-footer .copyright-text,.site-footer .social-icons
{
text-align:center
}
}
.social-icons
{
padding-left:0;
margin-bottom:0;
list-style:none
}
.social-icons li
{
display:inline-block;
margin-bottom:4px
}
.social-icons li.title
{
margin-right:15px;
text-transform:uppercase;
color:#96a2b2;
font-weight:700;
font-size:13px
}
.social-icons a{
background-color:#eceeef;
color:#818a91;
font-size:16px;
display:inline-block;
line-height:44px;
width:44px;
height:44px;
text-align:center;
margin-right:8px;
border-radius:100%;
-webkit-transition:all .2s linear;
-o-transition:all .2s linear;
transition:all .2s linear
}
.social-icons a:active,.social-icons a:focus,.social-icons a:hover
{
color:#fff;
background-color:#29aafe
}
.social-icons.size-sm a
{
line-height:34px;
height:34px;
width:34px;
font-size:14px
}
.social-icons a.facebook:hover
{
background-color:#3b5998
}
.social-icons a.twitter:hover
{
background-color:#00aced
}
.social-icons a.linkedin:hover
{
background-color:#007bb6
}
.social-icons a.dribbble:hover
{
background-color:#ea4c89
}
@media (max-width:767px)
{
.social-icons li.title
{
display:block;
margin-right:0;
font-weight:600
}
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
.row {
	flex-direction: column-reverse;
}
.col-25 {
	margin-bottom: 20px;
}
}




	</style>
  <body>

		<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
	<!-- Brand -->
	    <a class="navbar-brand" href="indexx.php"><img src="image/gray.png" style="width:120px; height:90px;"></a>

	<!-- Toggler/collapsibe Button -->
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
	</button>

	<!-- Navbar links -->
	<div class="collapse navbar-collapse" id="collapsibleNavbar">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">


			</li>




			<?php
			if(!isset($_SESSION['user_email'])){

			echo   '</li>
				<li class="nav-item"><a class="nav-link" href="login.html">Log In</a></li>';
		}
			else {
				echo   '</li>
					<li class="nav-item"><a class="nav-link" href="indexx.php">Explore</a></li>';
				echo   '</li>
					<li class="nav-item"><a class="nav-link" href="logged_in.php">Account</a></li>';
				echo   '</li>
					<li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li>';
			}
	?>


		</ul>
	</div>
	</nav>
<br><br><br><br>
<div class="parallax">
<br>

<div class="container">
      <div id="message"></div>
   <br />


      <div class="table-responsive">

<form method="post">
<table class="table table-hover">
	<thead>
	<tr>


		<th>Event</th>
		<th>Price</th>
		<th>Quantity</th>
		<th>Sub Total</th>
		<th></th>

	</tr>
</thead>
	<?php
	$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
	$s = 0;
	$index = 0;
	for($i = 0; $i < count ( $cart ); $i ++) {
		$s += $cart [$i]->price * $cart [$i]->quantity;
		?>
	<tr>

		<td><?php echo $cart[$i]->name; ?></td>
		<td>&#36;<?php echo number_format($cart[$i]->price,2) ?></td>
		<td><input type="number" value="<?php echo $cart[$i]->quantity; ?>"
			style="width: 50px;" name="quantity[]" min="1" max="1"></td>

		<td>&#36;<?php echo number_format($cart[$i]->price * $cart[$i]->quantity,2) ?></td>
		<td><input type="submit" value="Update" height="40">
			<input type="hidden" name="update">&nbsp;&nbsp;&nbsp;&nbsp; <a href="cart.php?index=<?php echo $index; ?>"
				onclick="return confirm('Are you sure?')" >Delete</button></a></td>

	</tr>
	<?php
	$index ++;
	}
	?>

	<tr>
		<td colspan="3" align="right"><b>Total</b></td>
		<td align="left">&#36;<?php echo number_format($s,2) ?></td>
	</tr>
</table>
<br>
</form>

		<div class="row">
		  <div class="col-75">
		    <div class="container">
		      <form action="checkout.php" method="POST">

		        <div class="row">
		          <div class="col-50">
		            <h3>Billing Address</h3>
		            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
		            <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
		            <label for="email"><i class="fa fa-envelope"></i> Email</label>
		            <input type="text" id="email" name="email" placeholder="john@example.com">
		            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
		            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
		            <label for="city"><i class="fa fa-institution"></i> City</label>
		            <input type="text" id="city" name="city" placeholder="New York">

		            <div class="row">
		              <div class="col-50">
		                <label for="state">State</label>
		                <input type="text" id="state" name="state" placeholder="NY">
		              </div>
		              <div class="col-50">
		                <label for="zip">Zip</label>
		                <input type="text" id="zip" name="zip" placeholder="10001">
		              </div>
		            </div>
		          </div>

		          <div class="col-50">
		            <h3>Payment</h3>
		            <label for="fname">Accepted Cards</label>
		            <div class="icon-container">
		              <i class="fa fa-cc-visa" style="color:navy;"></i>
		              <i class="fa fa-cc-amex" style="color:blue;"></i>
		              <i class="fa fa-cc-mastercard" style="color:red;"></i>
		              <i class="fa fa-cc-discover" style="color:orange;"></i>
		            </div>
		            <label for="cname">Name on Card</label>
		            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
		            <label for="ccnum">Credit card number</label>
		            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
		            <label for="expmonth">Exp Month</label>
		            <input type="text" id="expmonth" name="expmonth" placeholder="September">

		            <div class="row">
		              <div class="col-50">
		                <label for="expyear">Exp Year</label>
		                <input type="text" id="expyear" name="expyear" placeholder="2018">
		              </div>
		              <div class="col-50">
		                <label for="cvv">CVV</label>
		                <input type="text" id="cvv" name="cvv" placeholder="352">
		              </div>
		            </div>
		          </div>

		        </div>

		        <input type="submit" name="submit" value="Purchase" class="btn">
		      </form>
		    </div>
		  </div>
		</div>
</div>

</div>
</div>
  </body>
	<!-- Site footer -->
		<footer class="site-footer">
			<div class="container2">
				<div class="row">
					<div class="col-sm-12 col-md-6">
						<h6>About</h6>
						<p class="text-justify">Online Ticket Booking System – A event ticketing agency is starting a project to develop a website for booking event tickets online.  The agency requires that customers should be able to log in to their account, see information about the events, and book the tickets online. The new system should be able to calculate the subtotal and grand total of the ticket purchased. Also, once a ticket is booked, the customer should be able to see the information of the order, and the customer’s name, billing, and contact information is securely stored into the agency’s database.  </p>
					</div>

					<div class="col-xs-6 col-md-3">

						<ul class="footer-links">

						</ul>
					</div>

					<div class="col-xs-6 col-md-3">
						<h6>Quick Links</h6>
						<ul class="footer-links">
							<li><a href="about.php">About Us</a></li>
							<li><a href="contact.php">Contact Us</a></li>
							<li><a href="privacy.php">Privacy Policy</a></li>

						</ul>
					</div>
				</div>
				<hr>
			</div>
			<div class="container2">
				<div class="row">
					<div class="col-md-8 col-sm-6 col-xs-12">
						<p class="copyright-text">Copyright &copy; 2020 All Rights Reserved by
				 <a href="indexx.php">Team Three</a>.
						</p>
					</div>

					<div class="col-md-4 col-sm-6 col-xs-12">
						<ul class="social-icons">
							<li><a class="facebook" href="https://zicklin.baruch.cuny.edu/academic-programs/graduate/grad-admissions/?_ga=2.39587683.1569419937.1606191680-1866716861.1606191680"><i class="fa fa-facebook"></i></a></li>
							<li><a class="twitter" href="https://zicklin.baruch.cuny.edu/academic-programs/graduate/grad-admissions/?_ga=2.39587683.1569419937.1606191680-1866716861.1606191680"><i class="fa fa-twitter"></i></a></li>
							<li><a class="dribbble" href="https://zicklin.baruch.cuny.edu/academic-programs/graduate/grad-admissions/?_ga=2.39587683.1569419937.1606191680-1866716861.1606191680"><i class="fa fa-dribbble"></i></a></li>
							<li><a class="linkedin" href="https://zicklin.baruch.cuny.edu/academic-programs/graduate/grad-admissions/?_ga=2.39587683.1569419937.1606191680-1866716861.1606191680"><i class="fa fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
	</footer>
</html>
