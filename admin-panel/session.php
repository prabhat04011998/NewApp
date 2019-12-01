<?php
   include('includes/config.php');
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
   
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select username from admins where username = '$user_check' ");
   if(!$ses_sql){
   	die("error ".mysqli_error($db));
   }
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   
   $login_session = $row['username'];
   
   
?>