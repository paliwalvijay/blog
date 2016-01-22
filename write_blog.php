<?php
 $x = "cnjaew ";
 ?>
<html>
<head>
 <title>Write Blog | MyBlog</title>
</head>
<body style="background:#FFA500">
  <h1>Welcome to MyBlog</h1>
   <form name="htmlform" method="post" action="home.php" >
<table width="450px">
<tr>
 <td colspan="2" style="text-align:center">
  <input type="submit" name="write" value="Back to Home">
 </td>
</tr>
</table>
</form>
<form name="htmlform" method="post" action="add_blog.php">
<table width="450px">
<tr>
 <td valign="top">
  <label for="blog">Write Blog here :</label>
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="title"><b>Title : </b></label>
 </td>
</tr>
<tr>
 <td valign="top">
  <input  type="text" name="title" maxlength="200" size="50" style="font-size:20px">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="title"><b>Content : </b></label>
 </td>
</tr>
<tr>
 <td valign="top">
  <textarea  name="blog" maxlength="2000" cols="80" rows="20" style="font-size:15px"></textarea>
 </td>
</tr>
<tr>
 <td colspan="3" style="text-align:center">
  <input type="submit" value="Submit"> </td>
</tr>
</table>
</form>
</body>
 </html>
