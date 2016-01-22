<?php
 if(!($_POST["password"] == $_POST["password1"])){
    echo'<script> window.location="signup.php"; </script> ';
 }
 else{
 $connection = new MongoClient();
  $db = $connection->students;
  $collection = $db->students;
    $document = array("first_name" => $_POST["first_name"],"email"=>$_POST["email"],"last_name"=>$_POST["last_name"],"password"=>$_POST["password"],"blogs"=>array("My firsy blog"),"title"=>array("First Blog"),"time"=> array(date("F j, Y, g:i a")),"comment"=>array(array("","")));
    $collection->insert($document);
    session_start();
    $_SESSION["log"]=2;
    $_SESSION["email"] = $_POST["email"];
    echo $_SESSION["email"];
    echo'<script> window.location="login.php?log=1"; </script> ';
 }
?>
