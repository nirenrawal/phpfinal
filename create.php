<?php
require_once('db.php');

try {
    if(!empty($_POST)){
    if ($_FILES["picture"]["error"] > 0) { 
        $msg = "File upload error";
    } else 
    {
        $file_name = $_FILES["picture"]["name"];
        $upload_dir = "profile_pictures";
        $tmp = explode('.', $file_name);
        $extension = end($tmp);
        $file_id = md5($_POST['email']) . "." . $extension; 
  
        if($extension == 'JPEG' || $extension == 'jpeg' || $extension == 'GIF' || $extension == 'gif' || $extension == 'PNG' || $extension == 'png' || $extension == 'JPG' || $extension == 'jpg') {
            $user_type = '0';
            $hash_key = sha1(microtime());
            $name = htmlspecialchars( $_POST['name']);
            $dob = htmlspecialchars($_POST['dob']);
            $address = htmlspecialchars($_POST['address']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars(sha1($_POST['password']));
            $picture = $file_id;
            $time = date('h:i A');
            $date = date('Y-m-d');
            $agent = $_SERVER['HTTP_USER_AGENT'];
            $ip = $_SERVER['REMOTE_ADDR'];
  
            $q = $db->prepare('INSERT INTO students VALUES(:id, :user_type, :hash_key, :name, :dob, :address, :email, :password, :picture, :time, :date, :agent, :ip)');
            $q->bindValue(':id', null);
            $q->bindValue(':user_type', $user_type);
            $q->bindValue(':hash_key', $hash_key);
            $q->bindValue(':name', $name);
            $q->bindValue(':dob', $dob);
            $q->bindValue(':address', $address);
            $q->bindValue(':email', $email);
            $q->bindValue(':password', $password);
            $q->bindValue(':picture', $picture);
            $q->bindValue(':time', $time);
            $q->bindValue(':date', $date);
            $q->bindValue(':agent', $agent);
            $q->bindValue(':ip', $ip);
  
            $q->execute();
  
            if ($q) {
                move_uploaded_file($_FILES["picture"]["tmp_name"], $upload_dir . "/" . $file_id);
                $msg = "Successfully Registered";
            } else 
            {
                $msg = "Account already exists";
            }
        }else{
            $msg = "You are trying to upload illegal file please check the file extenstion";
        }
    }
  }
  }catch(PDOException $ex){
    echo $ex;
  }
?>