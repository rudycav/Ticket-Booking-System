<?php
include 'connect.php';
session_start();


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
    .parallax{
    	background-image: url("image/parallax.jpg");
    	background-attachment: fixed;
    	background-position: center;
    	background-repeat: no-repeat;
    	background-size: cover;
      padding-bottom: 600px;
    }

    .container{
      background-color: white;
      max-width: 1290px;
      margin-top: 50px;
      padding-bottom: 30px;
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

    	.button{
    	padding-bottom: 2px;
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

    	.form{text-align: center;
    		margin-right: 170px;
    		font-size: 20px;}

      form{
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
        <div class="form">
        <form action="search.php" method="post">
          <input type="text" name="search" size="129">

          <button type="submit" name="search_btn" class="btn btn-success"><i class="fas fa-search"></i></button>
        </form>
  </div>
      </li>



      <?php
      if(!isset($_SESSION['user_email'])){


      echo   '</li>
        <li class="nav-item"><a class="nav-link" href="login.html">Log In</a></li>';
				echo   '</li>
					<li class="nav-item"><a class="nav-link" href="sign_up.php">Register</a></li>';
    }
      else {
        echo   '</li>
          <li class="nav-item"><a class="nav-link" href="logged_in.php">Account</a></li>';
        echo   '</li>
          <li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li>';
      }
  ?>


    </ul>
  </div>
  </nav>
  <div class="parallax">
<br><br>

<div class="container"><br><br>
 		<table class="table table-hover">
 			<tr>
 				<thead class="black white-text">
 				<th scope="col">Event</th>
        <th scope="col">Date</th>
 				<th scope="col">Location</th>
 				<th scope="col">Time</th>
 				<th scope="col">Seating</th>
 				<th scope="col">Price</th>
 				<th scope="col">Book</th>
 			</tr>
 				</thead>
        <?php
         if(isset($_POST['search_btn'])){
           $search = mysqli_real_escape_string($con, $_POST['search']);
           $stuff = "SELECT * FROM product WHERE name LIKE '%$search%' OR location LIKE '%$search%' OR date LIKE '%$search%' OR seating LIKE '%$search%'
                    OR price LIKE '%$search%' OR time LIKE '%$search%'";

           $r = mysqli_query($con,$stuff);
           $qr = mysqli_num_rows($r);

           if ($qr > 0){
             while($rrr = mysqli_fetch_object($r)){?>
               <tr>
                 <td><img style='width: 200px;' src='<?php echo $rrr->image; ?>'>&nbsp;&nbsp;&nbsp;<?php echo $rrr->name; ?></td>
                 <td><?php echo $rrr->date; ?></td>
                 <td><?php echo $rrr->location; ?></td>
                <td><?php echo $rrr->time; ?></td>
              <td><?php echo $rrr->seating; ?></td>
              <td>&#36;<?php echo number_format($rrr->price,2) ?></td>
              <?php if(!isset($_SESSION['user_email'])){?>
            <td><a href="login.html" class="btn btn-success">Add to cart</a></td>

          <?php  }
        }

           }
           else {?>
            <?php echo '<td><a href="cart.php?id=<?php echo $rrr->id; ?>" class="btn btn-success">Add to cart</a></td>';

          }?></tr>
        <?php }?>



 		</table>

 </div>
 <br><br>
 <form action="index.php">
<input type="submit" class="btn btn-success" value="Back" />
</form></button>
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
