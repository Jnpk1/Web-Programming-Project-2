<html>
  <head>
    <title> bonk </title>
    <link rel="stylesheet" href="maintheme.css">
  </head>

<body>

<main>

<div id="righttext">
<?php
if (isset($_POST['submit1'])) {
    //Setup
    $file = file_get_contents('medium.txt');
    $allwords = explode(PHP_EOL, $file);
    $wordcount = sizeof($allwords);
    $chosen = $allwords[rand(0, ($wordcount - 2))];
    //echo $chosen;
    $sep = explode(',', $chosen);
    $word = $sep[0];
    $hint = $sep[1];
    $wordarr = str_split($word);
    $blankarr = $wordarr;
    for ($i = 0; $i < sizeof($wordarr);$i++) {
        $blankarr[$i] = '_';
    }
    $blankword = implode("", $blankarr);
    $text = $blankword.",".$word.",,0,5";
    file_put_contents('badhangman.txt', $text);
    header('Location:hangman.php');
    //End Setup
}
?>

<h1>Select your Difficulty</h1>

<form method="post">
  <select name="submit1" id="cars">
  <option value="easy">Easy</option>
  <option value="medium">Medium</option>
  <option value="hard">Hard</option>
  <option value="master">Master</option>
</select>
<input type="submit" name="" value="Submit">
</form>

<br>
<br>

</div>

</main>

</body>
</html>
