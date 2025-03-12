<?php
 require_once './database/dbconfig.php';
      
 if(isset($_POST['btn-submit'])){
   $name = $_POST['name'];
   $email  = $_POST['email'];
   $address  = $_POST['address'];
   $course  = $_POST['course'];
   $username  = $_POST['username'];
    $password  = $_POST['password'];


   if($user->setStudentList($name,$email,$address,$course)){
    $user->redirect('studentlist.php');
   };
 }
?>