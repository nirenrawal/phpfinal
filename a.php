<?php
$user_type = '0';
$hash_key = sha1(microtime());
$name = $_POST['name'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$email = $_POST['email'];
$password = sha1($_POST['p1']);
$picture = '';
$time = date('h:i A');
$date = date('d-m-Y');
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
?>