<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Favicon-->
  <link rel="shortcut icon" href="images/mosesmed favicon.png">
  <!-- Author Meta -->
  <meta name="Moses Med" content="Freelance full stack website developer and designer">
  <!-- Meta Description -->
  <meta name="description" content="">
  <!-- Meta Keyword -->
  <meta name="keywords" content="">
  <!-- meta character set -->
  <meta charset="UTF-8">
  <!-- Site Title -->
  <title>Moses Med | Official Page | Home</title>

  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
    CSS
    ============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/main.css">
  </head>
<body>

  <header id="header">
    <div class="container main-menu">
      <div class="row align-items-center justify-content-between d-flex">
        <div id="logo">
          <a href="index.html"><img src="images/mosesmed logo.png" alt="logo" title="" /></a>
        </div>
        <nav id="nav-menu-container">
          <ul class="nav-menu">
            <li><a href="index.html">Home</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="login.html">Login</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </header><br /><br /><br /><br /><br /><br />

<?php

if (isset($_POST['submit'])) {
  $username=$_POST['username'];
  $password=$_POST['password'];
  $newemail=$_POST['newemail'];
  $newphone=$_POST['newphone'];
  $newadd=$_POST['newadd'];

  $dbc=mysqli_connect('localhost','db_user','db_pass','db_name')or die('unable to connect to database');

  if (empty($username) || empty($password) || empty($newemail) || empty($newphone) || empty($newadd)) {
    echo 'Please fill all the fields';
  }else {
    $q="SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $run=mysqli_query($dbc,$q)or die('Unable to validate user');
    $row=mysqli_fetch_array($run);
    $user=$row['username'];
    $pass=$row['password'];
    if ($user=$username && $pass=$password) {
      $query="UPDATE admin SET email='$newemail', phone='$newphone', address='$newadd'";
      $result=mysqli_query($dbc,$query)or die('unable to change contact details');

      echo 'Your contacts has been changed successfully';
    }else {
      echo 'Unable to verify user';
    }
  }
}



 ?>

 <footer class="footer-area section-gap">
     <div class="container">
       <p>Copyright@ Moses Medahunsi 2020</p>
       <a href="#"></a>
     </div>
 </footer>
</body>
</html>
