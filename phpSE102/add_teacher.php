<?php
 require_once './database/dbconfig.php';
      
 if(isset($_POST['btn-submit'])){
   $name = $_POST['name'];
   $email  = $_POST['email'];
   $address  = $_POST['address'];
   $status  = $_POST['status'];
   $username  = $_POST['username'];
   $password  = $_POST['password'];

   if($user->setTeacherList($name,$email,$address,$status,$username,$password)){
    $user->redirect('teacherlist.php');
   };
 }
?>