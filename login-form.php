<?php
include('header.php');
require_once('login.php');
// require_once('db.php');
// $message = '';
// try  
//  {  
//       // $connect = new PDO("mysql:host=$host; dbname=$database", $email, $password);  
//       // $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
//       if(isset($_POST["login"]))  
//       {  
//            if(empty($_POST["email"]) || empty($_POST["password"]))  
//            {  
//                 $message = '<label>All fields are required</label>';  
//            }  
//            else  
//            {  
//                 $query = "SELECT * FROM students WHERE email = :email AND password = :password";  
//                 $statement = $db->prepare($query);  
//                 $statement->execute(  
//                      array(  
//                           'email'     =>     $_POST["email"],  
//                           'password'     =>     sha1($_POST["password"])  
//                      )  
//                 );  
//                 $count = $statement->rowCount();  
//                 echo $count;
//                 if($count == 1)  
//                 {  
//                      $_SESSION["email"] = $_POST["email"];  
//                      header("location:profile.php");  
//                 }  
//                 else  
//                 {  
//                      $message = '<label>Wrong Data</label>';  
//                 }  
//            }  
//       }  
//  }  
//  catch(PDOException $error)  
//  {  
//       $message = $error->getMessage();  
//  }  
 ?>




<section class="pt-5">
  <div class="row">
    <div class="container">
      <div class="jumbotron">
        <h1 class="display-4 text-center">Log In</h1>
        <p class="lead">Please Enter your email address and password.</p>
        <hr class="my-4">



        <form method="post">
          <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
          ?>  

          <div class="form-group">
            <label for="email">Email address</label>
            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input name="password" type="password" class="form-control" id="password" placeholder="Enter Password">
          </div>

          <input type="submit" name="login" class="btn btn-info" value="Login" />
        </form>
      </div>
    </div>
  </div>
</section>



<?php include("footer.php"); ?>