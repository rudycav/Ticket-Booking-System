<?php
session_start();
require 'connect.php';

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
  .form{text-align: center;
    margin-right: 163px;
    font-size: 20px;}
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
        <div class="form">
        <form action="search.php" method="post">
          <?php if(!isset($_SESSION['user_email'])){
            echo '<input type="text" name="search" size="129">';
              }
            else{
                echo '<input type="text" name="search" size="123">';
            }
          ?>


          <button type="submit" name="search_btn" class="btn btn-success" aria-pressed="true"><i class="fas fa-search"></i></button>
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
            <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>';
        echo   '</li>
          <li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li>';
      }
?>


    </ul>
  </div>
</nav>
<br><br><br><br><br><br>
    <h1> Privacy Policy for Team Three</h1>
<p> If you require any more information or have any questions about our privacy policy, please feel free to contact us by email at rudy.bi@baruchmail.cuny.edu.</p>
<p>At Team Three we consider the privacy of our visitors to be extremely important. This privacy policy document describes in detail the types of personal information is collected and recorded by Team Three and how we use it. </p>
<p> <b>Log Files</b><br /> Like many other Web sites, Team Three makes use of log files. These files merely logs visitors to the site – usually a standard procedure for hosting companies and a part of hosting services's analytics. The information inside the log files includes internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date/time stamp, referring/exit pages, and possibly the number of clicks. This information is used to analyze trends, administer the site, track user's movement around the site, and gather demographic information. IP addresses, and other such information are not linked to any information that is personally identifiable. </p>
<p> <b>Cookies and Web Beacons</b><br />Team Three uses cookies to store information about visitors' preferences, to record user-specific information on which pages the site visitor accesses or visits, and to personalize or customize our web page content based upon visitors' browser type or other information that the visitor sends via their browser. </p>
<p><b>DoubleClick DART Cookie</b><br /> </p>
<p>
→ Google, as a third party vendor, uses cookies to serve ads on Team Three.<br /><br />
→ Google's use of the DART cookie enables it to serve ads to our site's visitors based upon their visit to Team Three and other sites on the Internet. <br /><br />
→ Users may opt out of the use of the DART cookie by visiting the Google ad and content network privacy policy at the following URL – <a href="http://www.google.com/privacy_ads.html">http://www.google.com/privacy_ads.html</a> </p>
<p><b>Our Advertising Partners</b><br /> </p>
<p> Some of our advertising partners may use cookies and web beacons on our site. Our advertising partners include ……. <br /></p>
<ul>
<li>Google</li>
<li>Commission Junction</li>
<li>Amazon</li>
<li>Adbrite</li>
<li>Clickbank</li>
<li>Yahoo! Publisher Network</li>
<li>Chitika</li>
<li>Kontera</li>
</ul>
<p><em>While each of these advertising partners has their own Privacy Policy for their site, an updated and hyperlinked resource is maintained here: <a href="https://www.privacypolicyonline.com/privacy-policy-links/">Privacy Policy Links</a>.<br /> <br />
You may consult this listing to find the privacy policy for each of the advertising partners of Team Three.</em></p>
<p> These third-party ad servers or ad networks use technology in their respective advertisements and links that appear on Team Three and which are sent directly to your browser. They automatically receive your IP address when this occurs. Other technologies (such as cookies, JavaScript, or Web Beacons) may also be used by our site's third-party ad networks to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on the site. </p>
<p> [Team Three] has no access to or control over these cookies that are used by third-party advertisers. </p>
</p>
<p><b>Third Party Privacy Policies</b><br />
You should consult the respective privacy policies of these third-party ad servers for more detailed information on their practices as well as for instructions about how to opt-out of certain practices. Team Three's privacy policy does not apply to, and we cannot control the activities of, such other advertisers or web sites. You may find a comprehensive listing of these privacy policies and their links here: <a href="https://www.privacypolicyonline.com/privacy-policy-links/" title="Privacy Policy Links">Privacy Policy Links</a>.</p>
<p> If you wish to disable cookies, you may do so through your individual browser options. More detailed information about cookie management with specific web browsers can be found at the browsers' respective websites. <a href="https://www.privacypolicyonline.com/what-are-cookies/" >What Are Cookies?</a></p>
<p><strong>Children's Information</strong><br />We believe it is important to provide added protection for children online. We encourage parents and guardians to spend time online with their children to observe, participate in and/or monitor and guide their online activity.<br />
Team Three does not knowingly collect any personally identifiable information from children under the age of 13.  If a parent or guardian believes that[Team Three has in its database the personally-identifiable information of a child under the age of 13, please contact us immediately (using the contact in the first paragraph) and we will use our best efforts to promptly remove such information from our records.</p>
<p>
<b>Online Privacy Policy Only</b><br />
This privacy policy applies only to our online activities and is valid for visitors to our website and regarding information shared and/or collected there.<br />
This policy does not apply to any information collected offline or via channels other than this website.</p>
<p><b>Consent</b><br />
By using our website, you hereby consent to our privacy policy and agree to its terms.
</p>
<p><b>Update</b><br />This Privacy Policy was last updated on: Nov25, 2020. Should we update, amend or make any changes to our privacy policy, those changes will be posted here.</p>
<p><!-- END of Privacy Policy || Generated by http://www.PrivacyPolicyOnline.com || --></p>
<p>
  </body>
</html>
