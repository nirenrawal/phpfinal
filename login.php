<?php
require_once('db.php');
$message = '';
try {
    if (isset($_POST["login"])) {
        if (empty($_POST["email"]) || empty($_POST["password"])) {
            $message = '<label>All fields are required</label>';
        } else {
            $query = "SELECT * FROM students WHERE email = :email AND password = :password";
            $statement = $db->prepare($query);
            $statement->execute(
                array(
                    'email'     =>     $_POST["email"],
                    'password'     =>     sha1($_POST["password"])
                )
            );
            $count = $statement->rowCount();
            echo $count;
            if ($count == 1) {
                $_SESSION["email"] = $_POST["email"];
                header("location:home.php");
            } else {
                $message = '<label>Wrong Data</label>';
            }
        }
    }
} catch (PDOException $error) {
    $message = $error->getMessage();
}
