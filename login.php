<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login page using cookies and session </title>
<link href="style.css" rel="stylesheet">
</head>
<body>
<div>
  <h1>JEOPARDY!</h1>
</div>
<br>
  <div align="center">
    <form action="validate.php" method="post" name="Login_Form">
      <table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="Table">
            <tr>
              <td align="right" valign="top">Username</td>
              <td><input name="Username" type="text" class="Input"></td>
            </tr>
            <tr>
              <td align="right">Password</td>
              <td><input name="Password" type="password" class="Input"></td>
            </tr>
            <tr>
              <td colspan="2" align="center"> <input type="checkbox" name ="remember" value="1">Remember me</td>
            </tr>
      </table>
      <input class="form__button" type="submit" value="Login">
  </form>
  </div>
</body>
</html>
