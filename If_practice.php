<!doctype html>
<html>
  <head>
    <title>PHP If Statements</title> 
  </head>
  <body>

    <h1>PHP If Statements</h1> 

    <p>Use PHP echo and variables to output the following link information, use if statements to make sure everything outputs correctly:</p>

    <?php

    // **************************************************
    // Do not edit this code

    $randomNumber = ceil(rand(1,3));

    echo '<p>The random number is '.$randomNumber.'.</p>';

    if ($randomNumber == 1)
    {
      $linkName = 'Codecademy';
      $linkURL = 'https://www.codecademy.com/';
      $linkImage = '';
      $linkDescription = 'Learn to code interactively, for free.';
    }
    elseif ($randomNumber == 2)
    {
      $linkName = '';
      $linkURL = 'https://www.w3schools.com/';
      $linkImage = 'https://www.w3schools.com/css/w3css.gif';
      $linkDescription = 'W3Schools is optimized for learning, testing, and training.';
    }
    else
    {
      $linkName = 'Mozilla Developer Network';
      $linkURL = 'https://developer.mozilla.org';
      $linkImage = 'https://www.logo.wine/a/logo/MDN_Web_Docs/MDN_Web_Docs-Logo.wine.svg';
      $linkDescription = 'The Mozilla Developer Network (MDN) provides information about Open Web technologies.';
    }

    // **************************************************

    echo "<h2>.$linkName.</h2>";
    echo "<a href='$linkURL'>.$linkURL.</a>";
    echo "<img src=$linkImage width=200px></img>";
    echo "<p> .$linkDescription.</p>";

    if($linkName== ""){
      echo"<h2>".(parse_url($linkURL, PHP_URL_HOST))."</h2>";
    }
    elseif($linkURL==""){
      echo"<p> NO LINK FOUND</p>";
    }
    elseif($linkImage==""){
      echo"<p>NO IMAGE FOUND</p>";
    }
    elseif($linkDescription==""){
      echo"<p>NO DESCRIPTION FOUND</p>";
    }
    
    ?>

  </body>
</html>