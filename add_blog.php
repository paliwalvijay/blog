<?php
  session_start();
  $connection = new MongoClient();
  $db = $connection->students;
  $collection = $db->students;
  $cursor = $collection->find();
  $blog = $_POST["blog"];
  $id = $_SESSION["id"];
  foreach ($cursor as $document ) {
  	if($document["_id"]==$id){break;}
  }
  $blog = $document["blogs"];
  array_push($blog,$_POST["blog"]);
  $title = $document["title"];
  array_push($title,$_POST["title"]);
  $time = $document["time"];
  array_push($time,date("F j, Y, g:i a"));
  $fname = $document["first_name"];
  $lname = $document["last_name"];
  $mail = $document["email"];
  $pwd = $document["password"];
  $comments = $document["comment"];
  $comm = array("","");
  array_push($comments,$comm);
  $doc = array("_id"=>$document["_id"],"first_name" => $fname,"email"=>$mail,"last_name"=>$lname,"password"=>$pwd,"blogs"=>$blog,"title"=>$title,"comment"=>$comments,"time"=>$time);
  $collection->remove( array( '_id' => $document["_id"] ) );
  $collection->insert($doc);
  echo'<script> window.location="see_blog.php"; </script> '; 
?>
