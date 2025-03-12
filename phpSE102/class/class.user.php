<?php
class USER{
    public $db;
 
    function __construct($DB_con){
      $this->db = $DB_con;
    }

    public function redirect($url){
        header("Location: $url");
    }

    public function authLogin($user){
        $name = $_POST['name'];
        $password = $_POST['password'];
           
        if($this->login($name,$password)){
           $this->redirect('dashboard.php');
        }
        if($name === "admin" && $password === "admin"){
        //    $_SESSION['admin'] = 'admin';
           $this->redirect('teacherlist.php');
        }
        else{
         echo "<p style='color:red;'>Invalid username/email or password</p>";
        } 
      }

      public function login($name,$password){
        try{
           $stmt = $this->db->prepare("SELECT * FROM users WHERE name=:name LIMIT 1");
           $stmt->execute(array(':name'=>$name));
           $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
        //    if($stmt->rowCount() > 0){
        //       if(password_verify($password, $userRow['password'])){
        //          $_SESSION['user_session'] = $userRow['id'];
        //          return true;
        //       }
        //       else{
        //          return false;
        //       }
        //    }
            return true;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }


    function setStudentList($name,$email,$address,$course){
        try{
          $stmt = $this->db->prepare("INSERT INTO students_list(name,email,address,course) 
          VALUES(:name,:email,:address,:course)");
          $stmt->bindparam(":name", $name);
          $stmt->bindparam(":email", $email);
          $stmt->bindparam(":address", $address);
          $stmt->bindparam(":course", $course);
          $stmt->bindparam(":username", $username);
          $stmt->bindparam(":password", $password);
          $stmt->execute();
             return true;
          }
          catch(PDOException $e){
            echo $e->getMessage();
            return false;
          }
      }

      function setTeacherList($name,$email,$address,$status,$username,$password){
        try{
          $stmt = $this->db->prepare("INSERT INTO teachers_list(name,email,address,status,username,password) 
          VALUES(:name,:email,:address,:status,:username,:password)");
          $stmt->bindparam(":name", $name);
          $stmt->bindparam(":email", $email);
          $stmt->bindparam(":address", $address);
          $stmt->bindparam(":status", $status);
          $stmt->bindparam(":username", $username);
          $stmt->bindparam(":password", $password);
          $stmt->execute();
             return true;
          }
          catch(PDOException $e){
            echo $e->getMessage();
            return false;
          }
      }

}