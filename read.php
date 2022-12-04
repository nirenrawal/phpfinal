<?php
require_once('db.php');

try {
    $q = $db->prepare('SELECT * FROM students');
    $q->execute();
    $data = $q->fetchAll();
    
    echo 'Hi '.$data[9]->name; //PDO::FETCH_OBJ
    // echo 'Hi '.$data[0]['name']; //PDO::FETCH_ASSOC

}catch(PDOException $ex){
    echo $ex;
}
?>