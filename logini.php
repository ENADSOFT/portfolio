<?php


if (isset($_POST['login'])) {
  $user=$_POST['username'];
  $pass=$_POST['password'];

  if (empty($user) || empty($pass)) {
    echo 'Please fill all the field';
  }else {
    $dbc=mysqli_connect('localhost','root','','enad')or die('unable to connect to database');
    $q="SELECT * FROM admin WHERE username='$user' AND password='$pass'";
    $run=mysqli_query($dbc,$q)or die('unable to connect to the database');
    $num_rows=mysqli_num_rows($run);
    if ($num_rows==1) {
      $row=mysqli_fetch_array($run);
      $username=$row['username'];
      $password=$row['password'];
      $email=$row['email'];
      $phone=$row['phone'];
      $address=$row['address'];
      if ($user==$username && $pass==$password) {
        echo 'Welcome to the admin dashboard<br />';
        echo 'Username: ' . $username . '<br />';
        echo 'Password: ' . $password . '<br />';
        echo 'Email: ' . $email . '<br />';
        echo 'Phone: ' . $phone . '<br />';
        echo 'Address: ' . $address . '<br />';
        echo '<a href="edit.html">change contact details</a><br />';
      }else {
        echo 'Unrecognised login details';
      }
    }else {
      echo'unable to login';
    }
  }
}




 ?>