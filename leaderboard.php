<?php
// Read the scores from the file
$file = fopen("scores.txt", "r");
$scores = array();
while (!feof($file)) {
    $line = fgets($file);
    if (!empty($line)) {
        list($username, $score) = explode(",", $line);
        $scores[$username] = (int)$score;
    }
}
fclose($file);

// Sort the scores in descending order based on the score
arsort($scores);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="style.css" type="text/css" rel="stylesheet" />
  </head>
  <body>
    <div>
        <h1>JEOPARDY LEADERBOARD</h1>
    </div>
    <br>
    <div align="center">
    <table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="Table">
    <tr>
      <td align="center"><strong>Rank</strong></td>
      <td align="center"><strong>Username</strong></td>
      <td align="center"><strong>Score</strong></td>
    </tr>
    <?php
        $rank = 1;
        foreach ($scores as $username => $score) {
            echo '<tr>';
            echo '<td align="center">' . $rank . '</td>';
            echo '<td align="center">' . $username . '</td>';
            echo '<td align="center">' . $score . '</td>';
            echo '</tr>';
            $rank++;
        }
        echo "<h2><a href='jeopardy.php'>Game Screen</a></h2>";
    ?>
    </table>
    </div>
  </body>
</html>