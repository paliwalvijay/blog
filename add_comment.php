<?php
  //date_default_timezone_set('UTC');
  session_start();
  $connection = new MongoClient();
  $db = $connection->students;
  $collection = $db->students;
  $cursor = $collection->find();
  // $no = explode(",", $_GET["no"]);;
  $user = $_SESSION["user"];
  foreach ($cursor as $document ) {
  	if($document["_id"]==$user){break;}
  }
  $ins = $_SESSION["id"];
  foreach ($cursor as $doc ) {
    if($doc["_id"]==$ins){break;}
  }
  $comment = $document["comment"];
  $blog = $document["blogs"];
  $date = $document["time"];
  $title = $document["title"];
  $fname = $document["first_name"];
  $lname = $document["last_name"];
  $mail = $document["email"];
  $pwd = $document["password"];
  $time = $document["time"];
  $comm = $comment[$_SESSION["var"]-1];
  array_push($comm,$doc["first_name"]);
  array_push($comm,$_POST["comment"]);
  //echo $comment[$_SESSION["var"]-1][0];
  $repl = array($_SESSION["var"]-1=>$comm);
  $coll = array_replace($comment,$repl);
  $docu = array("_id"=>$document["_id"],"first_name" => $fname,"email"=>$mail,"last_name"=>$lname,"password"=>$pwd,"blogs"=>$blog,"title"=>$title,"comment"=>$coll,"time"=>$time);
  $collection->remove( array( '_id' => $document["_id"] ) );
  $collection->insert($docu);
  echo'<script> window.location="home.php"; </script> '; 
?>
