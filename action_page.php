<html>
   <head>
       <title></title>
       <link href="jeopardy.css" type="text/css" rel="stylesheet">
   </head>
<?php
session_start();

// Array of answer choices
$answers = array('a', 'b', 'c');

// Array of card point values 
$card_scores = array(
    1 => 200,
    2 => 400,
    3 => 600,
    4 => 800,
    5 => 1000
);

// Get the index of the correct answer from hidden input field
$correct_answer_index = $_POST['answer'];
$card_value = $_POST['point_value'];

// Get the value of the selected answer from the form
$selected_answer = $_POST['lyric'];

if ($selected_answer == $answers[$correct_answer_index]) {
    $_SESSION['score'] += $card_scores[$card_value];
    $message = "Correct! Your score is now " . $_SESSION['score'] . '.';

    // Update the score for the current user in the file
    $file = fopen("scores.txt", "r+");
    $scores = array();
    while (!feof($file)) {
        $line = fgets($file);
        if (!empty($line)) {
            list($username, $score) = explode(",", $line);
            $scores[$username] = (int)$score;
        }
    }
    $username = $_SESSION['username'];
    $score = (int)$_SESSION['score'];
    $scores[$username] = $score;
    ftruncate($file, 0);
    foreach ($scores as $username => $score) {
        fwrite($file, $username . "," . $score . "\n");
    }
    fclose($file);
} else {
    $message = "Incorrect. Your score remains " . $_SESSION['score'] . '.';
}

echo "
    <h1>JEOPARDY!</h1>
    <div class='center'>
        $message <br>
        <a href='jeopardy.php'>Continue</a>
    </div>
";

?>
</body>
</html>