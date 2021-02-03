<?php
include 'connect.php';
session_start();

if (isset($_POST['email']) && isset($_POST['pass'])) {
  $email = $_POST['email'];
  $pass = $_POST['pass'];

/*empty fields*/
  if (empty($email) || empty($pass)) {
    echo "<script type='text/javascript'>alert('All fields are required!');
window.location='login.html';
</script>";

    exit();
  }



  /*if email & pass input == database*/
  else {
    $sql = "SELECT * FROM user WHERE email='$email' AND
      pass='$pass'";
    $result = mysqli_query($con, $sql);
    /*duplicates*/
    if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);




      /*if email and pass matches*/
      if ($row['email'] === $email && $row['pass'] === $pass && $row['user_type'] === "user" || empty($row['user_type'])) {
          $_SESSION['user_email'] = $row['email'];
          $_SESSION['user_pass'] = $row['pass'];

          header("Location: logged_in.php");
          exit();
        }

        //if admin login, takes admins to admin.php
        else {
          if($row['email'] === $email && $row['pass'] === $pass && $row['user_type'] == "admin"){
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_pass'] = $row['pass'];
            header("Location: admin.php");
            exit();
          }

        }




    }
  }
}





if(!isset($_SESSION['user_email'])){
	header("Location: login.html");
}

$rn = $_SESSION['user_email'];
$sql = "SELECT `product`.`date` AS 'Date', `product`.`seating` AS 'Seating', `product`.`time` AS 'Time',`product`.`location` AS 'Location',`ordersdetail`.`ordersid` AS 'OrderID', `product`.`name` AS 'ProductName', `product`.`price` AS 'SingleProductPrice', `ordersdetail`.`quantity` AS 'OrderQuantity', (`product`.`price`*`ordersdetail`.`quantity`) AS 'TotalPrice' FROM `ordersdetail` INNER JOIN `orders` ON `orders`.`id` = `ordersdetail`.`ordersid` INNER JOIN `product` ON `product`.`id` = `ordersdetail`.`productid` WHERE `orders`.`username` = '$rn'";
$results = mysqli_query($con, $sql);

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
              <title>Ticket Booking System</title>
          		<link rel="icon" href="image/logo.jpg" type="image/gif" sizes="16x16">
  </head>
  <style>
  .parallax{
    background-image: url("image/parallax.jpg");
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }

  .form{text-align: center;

    margin-right: 130px;

		font-size: 21px;}

  .container{
    background-color: white;
    padding-bottom: 400px;
  }
  .title{
    text-align: center;
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
@media (max-width:767px)
{
  .social-icons li.title
  {
    display:block;
    margin-right:0;
    font-weight:600
  }
}
  </style>

  <body>
      <br><br>
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
          <div class="form">
          <form action="search.php" method="post">
            <input type="text" name="search" size="108">

            <button type="submit" name="search_btn" class="btn btn-success"><i class="fas fa-search"></i></button>
          </form>
        </li>


        <?php
        if(!isset($_SESSION['user_email'])){

        echo   '</li>
          <li class="nav-item"><a class="nav-link" href="login.html">Log In</a></li>';
      }
        else {

          echo   '</li>
            <li class="nav-item"><a class="nav-link" href="index.php">Explore</a></li>';
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
  <br><br>
<div class="container"><br><br><br>
<?php if(mysqli_num_rows($results) > 0): ?>
<table class="table table-hover">
  <div class="title">
  <h2>Your Tickets</h2>
</div>
<tr>
  <th scope="col">Event</th>
  <th scope="col">Date</th>
    <th scope="col">Location</th>
  <th scope="col">Quantity</th>
  <th scope="col">Time</th>
  <th scope="col">Seating</th>

</tr>

<?php foreach($results as $result): ?>
  <tr>

    <td><?php echo $result['ProductName']; ?></td>
    <td><?php echo $result['Date']; ?></td>
    <td><?php echo $result['Location']; ?></td>
    <td><?php echo $result['OrderQuantity']; ?></td>
    <td><?php echo $result['Time']; ?></td>
    <td><?php echo $result['Seating']; ?></td>
  </tr>
<?php endforeach; ?>
</table>
</container>
<?php else: ?>
<div class="title">
  <h2>Your Tickets</h2>
</div>
<?php endif; ?>


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
         <a href="index.php">Team Three</a>.
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
