<html>
<body style="background:#2B65EC"></body>
</html>
<?php
  session_start();
  $connection = new MongoClient();
  $db = $connection->students;
  $collection = $db->students;
  $success=0;
  $id=0;
  $cursor = $collection->find();
  if($_GET["log"]==1){
    foreach($cursor as $document){
      if (($document["email"] == $_SESSION["email"])){
      $success=1;
       break;
    }
   }
  }
  else{
  foreach($cursor as $document){
    if (($document["email"] == $_POST["email"])&&($document["password"]==$_POST["password"])){
    	$success=1; 
      break;
     // echo $document["email"];
    }
   }
  }
  if($success==1){
    $_SESSION["log"]=1;
  	 $_SESSION["id"] = $document["_id"];
     echo'<script> window.location="home.php"; </script> ';	
  }
  if($success==0){
  	 echo'<script> window.location="index.php"; </script> ';
  }
?>
