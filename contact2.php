<?php
	require 'connect.php';

session_start();

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
		<title>Ticket Booking System</title>
		<link rel="icon" href="image/logo.jpg" type="image/gif" sizes="16x16">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
          <script src="https://kit.fontawesome.com/a076d05399.js"></script>
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="jquery.tabledit.min.js"></script>
  </head>
  <style>
.parallax{
  background-image: url("image/parallax.jpg");
	background-attachment: fixed;
	background-position: center;
	background-repeat: no-repeat;
	background-size: cover;
	padding-bottom: 680px;
	padding-top: 8px;
	padding-right: 40px;
}

.container{
  margin-top: 200px;
  text-align: center;

}

  </style>
  <body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
  <!-- Brand -->
      <a class="navbar-brand" href="index.php"><img src="image/gray.png" style="width:120px; height:90px;"></a>

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
          <li class="nav-item"><a class="nav-link" href="logged_in.php">Account</a></li>';
          echo   '</li>
            <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>';
        echo   '</li>
          <li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li>';
      }
?>


    </ul>
  </div>
</nav>

<div class="parallax">
  <div class="container">
    <h1>Thank You!<br><br>We'll be in touch shortly.</h1>
    <br><br>
    <form action="index.php">
<input type="submit" class="btn btn-success btn-lg" value="Home" />
</form></button>



  </div>

</div>
  </body>
</html>
