<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="style.css" type="text/css" rel="stylesheet" />
  </head>
  <body>
    <?php
    session_start();

    $flag = FALSE;


    $userName = $_POST['Username'];
    $Password = $_POST['Password'];
    $remember = $_POST['remember'];

    //fecthing the values from the txt get_included_file

         $file = @fopen("signupFile.txt", 'r');
         $array = explode("\n", fread($file, filesize("signupFile.txt")));
         $user_det=[];
         foreach ($array as $arr) {
             $fields = explode(",", $arr);
             if ($fields[2] == $_POST['Username']) {
               $flag = TRUE;
               $user_det = $fields;
               break;
             }
           }

    //
      if(!$flag){
        echo "user Name does not exist please sign up using below link </br> <a href = 'signup.php'>Go to sign up page</a>";
      }
      else{
        if($userName == $fields[2] && $Password == $fields[3]){
          $_SESSION['username'] = $userName;
          $_SESSION['score'] = $user_det[4];
        ?>
          <div align="center">
            <h1>JEOPARDY!</h1>
          </div>
          <div align = "center">
            <h2><a href='jeopardy.php'>Go to Game</a></h2>
            <h2>Know the rules Below</h2>
          </div>

        <?php
        }
        else{
          ?>
          <p>username or password is invalid.</p></br>
          <a href='login.php'> Please try again!</a>

        <?php

        }
      }

     ?>

   </body>
</html>
