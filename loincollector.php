<?php
 session_start();
 include("conection.php");
 include("function.php");
 if($_SERVER['REQUEST_METHOD']=="POST"){
    $user_name=$_POST['user_name'];
    $password=$_POST['password'];
    if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){
     $user_id=random_num(20);
      $query="insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";
   
      mysqli_query($con,$query);
    header("Location: login.php");
    die;
     }
    else{
     echo 'please enter valid username and password';
    }
 }
?>