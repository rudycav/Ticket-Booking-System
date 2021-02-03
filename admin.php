<?php
include 'connect.php';
session_start();





$sql = "SELECT `user`.`id` AS 'ID', `user`.`user_type` AS 'UserType', `user`.`email` AS 'Email', `user`.`first` AS 'FirstName', `user`.`last` AS 'LastName' FROM `user`";
$results = mysqli_query($con, $sql);
$total = mysqli_num_rows($results);


?>

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
  .hello {text-align: center;
          font-size: 50px;}

  .parallax{
  	background-image: url("image/parallax.jpg");
  	background-attachment: fixed;
  	background-position: center;
  	background-repeat: no-repeat;
  	background-size: cover;
    pa
  }

  .container{
    max-width: 1200px;
    padding-bottom: 40px;
  }

  .form{
    margin-bottom: 30px;
    font-size: 17px;
    margin-left: 70px;
}

  </style>
  <body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
  <!-- Brand -->
    <a class="navbar-brand" href="admin.php"><img src="image/gray.png" style="width:120px; height:90px;"></a>

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
          <li class="nav-item"><a class="nav-link" href="admin.php">Admin</a></li>';
        echo   '</li>
          <li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li>';

      }
  ?>


    </ul>
  </div>
  </nav>
  <br>
<div class="parallax">
<br><br><br><br><br><br><br><br>



<div class="container">
  <div class="hello">
    Hello Admin
  </div>
  <div class="form">
  <form action="search_admin.php" method="post">
    <input type="text" name="search" size="115">

    <button type="submit" name="search_btn" class="btn btn-primary"><i class="fas fa-search"></i></button>
  </form>
</div>
<table class="table table-dark table-hover">
<tr>
  <td>User ID</td>
  <td>User Role</td>
  <td>User Email</td>
  <td>First Name</td>
  <td>Last Name</td>

</tr>
<?php

    while($row=mysqli_fetch_array($results))
      {
        echo "<tr>";
        echo  "<td>".$row['ID']."</td>";
        echo  "<td>".$row['UserType']."</td>";
        echo  "<td>".$row['Email']."</td>";
        echo  "<td>".$row['FirstName']."</td>";
        echo  "<td>".$row['LastName']."</td>";



      }

 ?>
</div>
</div>

  </body>
</html>
