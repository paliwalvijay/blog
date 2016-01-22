<html>
<head><title>Home | MyBlog</title></head>
<body style="background:#FFA500">
</body>
</html>
<?php
  $connection = new MongoClient();
  $db = $connection->students;
  $collection = $db->students;
 /* if(isset($_GET['write'])) {
       echo'<script> window.location="write_blog.php"; </script> '; 
    }*/
  $id=0;
  session_start();
  if($_SESSION["log"]==1){
    $id = $_SESSION["id"];
    $cursor = $collection->find();
    foreach($cursor as $document){
     if (($document["_id"] == $_SESSION["id"])){ break;}
    }
  }
  else {
    echo'<script> window.location="index.php"; </script> ';
  }
?>
<html>
<body>
  <p style = "font-size:30px"><?php echo "Welcome <b>".$document["first_name"]." ".$document["last_name"]."</b>"; ?></p>
<form name="htmlform" method="post" action="write_blog.php" >
<table width="450px">
<tr>
 <td colspan="2" style="text-align:center">
  <input type="submit" name="write" value="Write Blog">
 </td>
</tr>
</table>
</form>
<form name="htmlform" method="post" action="see_blog.php">
<table width="450px">
<tr>
 <td colspan="2" style="text-align:center">
  <input type="submit" value="See Your Blogs">
 </td>
</tr>
</table>
</form>
<form name="htmlform" method="post" action="logout.php">
<table width="450px">
<tr>
 <td colspan="2" style="text-align:left">
  <input type="submit" value="Log Out">
 </td>
</tr>
</table>
</form>
</body>
</html>
<?php
  if($_SESSION["log"]==1){
    $id = $_SESSION["id"];
    foreach($cursor as $document){
      //if (($document["_id"] == $id)){break;}
        echo "<br><br><b>".$document["first_name"]."  ".$document["last_name"]."</b> wrote : <br>";
        $blog = $document["blogs"];
        $date = $document["time"];
        $title = $document["title"];
        $no =1;
        $doc = $document["_id"];
        $_SESSION["user"] = $document["_id"];
        foreach ($blog as $key) {
          //echo "<br><br><b>".$no." . </b>";
          print "<br><b><a href=\"see_blogs.php?no=$no,$doc\">".$title[$no-1]."</b></a><br>";
         // echo $key;
          $k = nl2br ( $key, false);
          echo $k;
          echo "<br>         on ".$date[$no-1]."<br>";
          $no =$no+1;
        }
   }
  } 
?>
