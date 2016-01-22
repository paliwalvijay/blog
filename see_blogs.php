<?php
  //date_default_timezone_set('UTC');
  session_start();
  $connection = new MongoClient();
  $db = $connection->students;
  $collection = $db->students;
  $cursor = $collection->find();
  $no = explode(",", $_GET["no"]);;
  $user = $no[1];
  $_SESSION["user"]=$user;
  $_SESSION["var"] = $no[0];
  foreach ($cursor as $document ) {
  	if($document["_id"]==$user){break;}
  }
  $comments = $document["comment"];
  $blog = $document["blogs"];
  $date = $document["time"];
  $title = $document["title"];
?>

<html>
<title>Blog | MyBlog</title>
<body style="background:#FFA500">
  <form name="htmlform" method="post" action="home.php" >
<table width="450px">
<tr>
 <td colspan="2" style="text-align:center">
  <input type="submit" name="write" value="Home">
 </td>
</tr>
</table>
</form>
<p style = "font-size:25px"><?php echo " <b>".$title[$no[0]-1]."</b>"; ?></p>
<textarea rows = "10" cols="100" style = "font-size:18px;" readonly><?php echo $blog[$no[0]-1]; ?></textarea>
<form action="add_comment.php" method="post">
<textarea name="comment" cols="80" rows="2" style = "font-size:16px;" placeholder="Write comment here ...">
</textarea>
<br />
<input type="submit" value="Submit"/>
</form>
<p style = "font-size:20px"><?php echo " <b> Comments : </b>"; ?></p>
</body>
</html>
<?php
 $comments = $comments[$no[0]-1];
 $var=0;
 foreach ($comments as $comm){
  if($var%2 ==0&&(strlen($comments[$var+1])!=0))
  echo "<b>".$comm." :</b><br>";
else if(strlen($comm)!=0) echo $comm."<br>";
  $var = $var+1;
 }
?>
