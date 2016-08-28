<html>
<head>
 <title>MyFirstBlog</title>
</head>
<body style="background:#2B65EC">
  <h1>Welcome to MyBlog</h1>
  <h2>Sign Up</h2>
<form name="htmlform" method="post" action="add_user.php">
<table width="450px">
<tr>
 <td valign="top">
  <label for="first_name" style="color: #FFFFFF"><b>First Name *</b></label>
 </td>
 <td valign="top">
  <input  type="text" name="first_name" maxlength="50" size="30">
 </td>
</tr>
 
<tr>
 <td valign="top"">
  <label for="last_name" style="color: #FFFFFF"><b>Last Name *</b></label>
 </td>
 <td valign="top">
  <input  type="text" name="last_name" maxlength="50" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="email" style="color: #FFFFFF"><b>Email </b>*</label>
 </td>
 <td valign="top">
  <input  type="text" name="email" maxlength="80" size="30">
 </td>
 
</tr>

<tr>
 <td valign="top">
  <label for="password" style="color: #FFFFFF"><b>Password</b></label>
 </td>
 <td valign="top">
  <input  type="password" name="password" maxlength="30" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="password1" style="color: #FFFFFF" ><b>Confirm Password</b></label>
 </td>
 <td valign="top">
  <input  type="password" name="password1" maxlength="30" size="30">
 </td>
</tr>
<tr>
 <td colspan="2" style="text-align:center">
  <input type="submit" value="Sign up"> 
 </td>
</tr>
</table>
</form>
</body>
 </html>
