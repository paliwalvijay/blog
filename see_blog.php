<html>
<head>
 <title>Your Blogs | MyBlog</title>
</head>
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
</body>
</html>
<?php
  //date_default_timezone_set('UTC');
  session_start();
  $connection = new MongoClient();
  $db = $connection->students;
  $collection = $db->students;
  $cursor = $collection->find();
  $blog = $_POST["blog"];
  $id = $_SESSION["id"];
  //echo "<a href="signup.php">Sign Up</a>";
  foreach ($cursor as $document ) {
  	if($document["_id"]==$id){break;}
  }
  $blog = $document["blogs"];
  $date = $document["time"];
  $title = $document["title"];
  echo "<b>Your BLOGS : </b>";
  $no =1;
  //echo $today;
  foreach ($blog as $key) {
    echo "<br><br><b>".$no." . </b>";
    echo "<b>".$title[$no-1]."</b><br><br>";
  	echo $key;
    echo "<br>         on ".$date[$no-1];
    $no =$no+1;
}
?>
