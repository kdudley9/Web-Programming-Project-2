<!DOCTYPE html>
<html>
  <head>
    <title>JEOPARDY GAME</title>
    <meta charset="utf-8" />
    <link href="style.css" type="text/css" rel="stylesheet" />
  </head>
   <body>

    <div class="left-half">
      <h1> Welcome to JEOPARDY GAME!</h1>
      <fieldset>
  <legend>New User Signup:</legend>
  <table>
      <form action="signup-submit.php" method="post">
          <tr>
              <td>Name:</td>
              <td>
                  <input type="text" name="name" size="17" maxlength="16">
              </td>
          </tr>
          <tr>
              <td>Email:</td>
              <td>
                  <input type="text" name="email" size="30" maxlength="28">
              </td>
          </tr>
          <tr>
              <td>User Name:</td>
              <td>
                  <input type="text" name="userName" size="30" maxlength="20">
              </td>
          </tr>
          <tr>
              <td>Password:</td>
              <td>
                  <input type="password" name="Password" size="12" maxlength="10">
              </td>
          </tr>
          <tr>
              <td> Confirm Password:</td>
              <td>
                  <input type="text" name="confirmPassword" size="12" maxlength="10">
              </td>
          </tr>
          <tr>
              <td>
                  <input type="submit" value="Sign Up">
              </td>
          </tr>
      </form>
  </table>
</fieldset>
</div>
  </body>
</html>
