

<!DOCTYPE html>
<html>
    <head>
        <title>PHP Exercise 1: Links and Variables</title>
    </head>
    <body><h1>PHP Exercise 1: Links and Variables</h1>
    <p>Use PHP echo and variables to output thefollowing link information:</p>
    <hr>
    <?php
    $linkName = 'Codecademy';
    $linkURL = 'https://www.codecademy.com/';
    $linkImage ='https://i.pcmag.com/imagery/reviews/05XBKmNFYeHCMIn726Nohqb-10..v1627594235.png';
    $linkDescription = 'Learn to code interactively, for free.';
    
    echo "<h1> $linkName </h1>";
    echo "<a href> $linkURL </a>";
    echo "<img src=$linkImage width=200px></img>";
    echo "<p> $linkDescription </p>";
    ?>
    </body>
    </html>

    
