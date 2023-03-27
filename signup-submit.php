<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="style.css" type="text/css" rel="stylesheet" />
  </head>
  <body>
    <?php
    $has_error = FALSE;


if (preg_match("/[0-9]/", $_POST["name"]) === 1) {
  echo"Name should not contain any numeric value</br>";
  $has_error = TRUE;
}

if (empty($_POST["name"])) {
  echo"The name must not be blank</br>";
  $has_error = TRUE;
}

$special_char = "!@#$%&^*";  // set of special characters
$password = $_POST["Password"];

$shared = implode( '' , array_intersect( str_split($password) , str_split($special_char) ) ); // checking common character between password and special char string.


if(strlen($shared) == 0){
 echo "Invalid Password. Please ensure your password have special characters(!, @, #, $, %, &, ^, *).";
 $has_error = TRUE;
}

if (!preg_match('/[A-Z]/', $_POST["Password"]) || !preg_match('~[0-9]+~', $_POST["Password"])) {
  echo " Invalid Password. Please ensure your password have One capital letter and one numeric value.</br>";
  $has_error = TRUE;
}
if ($_POST["Password"]!= $_POST["confirmPassword"]) {
  echo "Password does not match.</br>";
  $has_error = TRUE;
}
//check for comma
if (strlen(implode( '' , array_intersect( str_split($password) , str_split(",") ) )) > 0) {
  echo "Password must not contain 'comma(,)'.</br>";
  $has_error = TRUE;
}
if (strlen(implode( '' , array_intersect( str_split($_POST["email"]) , str_split(",") ) )) > 0) {
  echo "Email must not contain 'comma(,)'.</br>";
  $has_error = TRUE;
}
if (strlen(implode( '' , array_intersect( str_split($_POST["userName"]) , str_split(",") ) )) > 0) {
  echo "Username must not contain 'comma(,)'.</br>";
  $has_error = TRUE;
}
if (strlen(implode( '' , array_intersect( str_split($_POST["name"]) , str_split(",") ) )) > 0) {
  echo "Name must not contain 'comma(,)'.</br>";
  $has_error = TRUE;
}
//

if (strlen(implode( '' , array_intersect( str_split($_POST["email"]) , str_split("@") ) )) == 0) {
  echo "Please enter a valid email address.</br>";
  $has_error = TRUE;
}

// email validation


//checking if user exists;
$userFile = @fopen("signupFile.txt", 'r');
$array = explode("\n", fread($userFile, filesize("signupFile.txt")));


  foreach ($array as $arr) {
    $fields = explode(",", $arr);
    if ($fields[2] == $_POST["userName"]) {

      $has_error = TRUE;
      echo "User already exists";
      break;
    }
  }


if(!$has_error){
  $user_details = array($_POST["name"],
                      $_POST["email"],
                      $_POST["userName"],
                      $_POST["Password"]
                  );
  $user_info_to_write = implode(",", $user_details);
  //echo $user_info_to_write;
  file_put_contents("signupFile.txt", PHP_EOL.$user_info_to_write, FILE_APPEND);

  echo "Welcome <br>";
  echo "<a href='login.php'>Login</a>";
}
