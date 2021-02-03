<?php
include 'connect.php';



 ?>




  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="UTF-8">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
      padding-bottom: 800px;
    }

    .container{
      max-width: 900px;
    }
    </style>
    <body>
      <nav class="navbar navbar-expand-md bg-dark navbar-dark">
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
          <a class="nav-link" href="admin.php">Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="parallax">
<br><br>

<div class="container"><br><br>
 		<table class="table table-dark table-hover">
 			<tr>
 				<thead class="black white-text">
 				<th scope="col">User ID</th>
        <th scope="col">User Type</th>
 				<th scope="col">Email</th>
 				<th scope="col">Pasword</th>
 				<th scope="col">First Name</th>
 				<th scope="col">Last Name</th>
 			</tr>
 				</thead>
        <?php
         if(isset($_POST['search_btn'])){
           $search = mysqli_real_escape_string($con, $_POST['search']);
           $stuff = "SELECT * FROM user WHERE user_type LIKE '%$search%' OR email LIKE '%$search%' OR first LIKE '%$search%' OR last LIKE '%$search%'
                    OR pass LIKE '%$search%' OR id LIKE '%$search%'";

           $r = mysqli_query($con,$stuff);
           $qr = mysqli_num_rows($r);

           if ($qr > 0){
             while($rrr = mysqli_fetch_object($r)){?>
               <tr>

                 <td><?php echo $rrr->id; ?></td>
                 <td><?php echo $rrr->user_type; ?></td>
                <td><?php echo $rrr->email; ?></td>
              <td><?php echo $rrr->pass; ?></td>
            <td><?php echo $rrr->first; ?></td>
            <td><?php echo $rrr->last; ?></td>
            </tr>
              <?php  }


           }else {
             echo "No results";
           }
         }

         ?>

 		</table>
 </div>
</div>
</div>
    </body>
  </html>
