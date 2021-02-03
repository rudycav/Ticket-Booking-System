<?php

require 'connect.php';
require 'item.php';
session_start();



// Save new order
mysqli_query($con, 'insert into orders(name, datecreation, username)
values("New Order", "'.date('Y-m-d').'", "'.$_SESSION['user_email'].'")');
$ordersid = mysqli_insert_id($con);



// Save order details for new order
$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
for($i=0; $i<count($cart); $i++) {
	mysqli_query($con, 'insert into ordersdetail(productid, ordersid, price, quantity, email)
values('.$cart[$i]->id.', '.$ordersid.','.$cart[$i]->price.', '.$cart[$i]->quantity.', "'.$_SESSION['user_email'].'")');
}

if (isset($_POST['submit'])){
	//include_once 'cart.php';
	$full = $_POST['firstname'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$cardname = $_POST['cardname'];
	$cardnumber = $_POST['cardnumber'];
	$expmonth = $_POST['expmonth'];
	$expyear = $_POST['expyear'];
	$cvv = $_POST['cvv'];

mysqli_query($con, 'INSERT INTO billing (name, email, address, city, state, zip, card_name, card, exp_month, exp_year, cvv)
values("'.$full.'", "'.$email.'", "'.$address.'", "'.$city.'", "'.$state.'", "'.$zip.'", "'.$cardname.'", "'.$cardnumber.'", "'.$expmonth.'", "'.$expyear.'", "'.$cvv.'")');
}
// Clear all products in cart
unset($_SESSION['cart']);
header("Location: confirm.php");
?>
