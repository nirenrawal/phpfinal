<?php  
 //login_success.php  

 if(isset($_SESSION["email"]))  
 {  
     $email = $_SESSION['email'];
     $q = $db->prepare('SELECT * FROM students where email = :email');
     $q->bindValue(':email', $email);
      echo '<h3>Login Success, Welcome - '.$_SESSION["email"].'</h3>';  
      echo '<br /><br /><a href="logout.php">Logout</a>';  
 }  
 else  
 {  
      header("location:login-form.php");  
 }  
 ?>  