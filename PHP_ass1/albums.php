<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Favourite Albums</title>
</head>
<body>
    <!-- Page Heading -->
    <h1 class="heading">Favourite albums</h1>
    

    <?php
    // Connecting to database
    $connect= mysqli_connect(
    'sql108.epizy.com', //host
    'epiz_33373342', //username
    '5mk4hwvn', //password
    'epiz_33373342_Assignment1' //Dname
    );

    // initialising variable with a query
    $query= 'SELECT * FROM albums ORDER BY name';
    // getting data in a variable through "$query"
    $result= mysqli_query($connect, $query) or die(mysqli_error($connect));

    // displaying data using echo 
    echo '<div class="albumIn">';
    echo '<div class="flex">';
    while($record= mysqli_fetch_assoc($result))
    {
        echo '<div class="album">';
        echo '<h2 class="albumName">'.$record['name'].'</h2>';
        echo '<img src="images/'.$record['image'].'" class= "center">';
        echo '<p class="center">Artist: '.$record['artist/band'].'</p>';
        echo '<p class="center">Label: '.$record['genre'].'</p>';
        echo '<p class="center">Release Year: '.$record['release_year'].'</p>';
        echo '</div>';
    }
        
        echo '</div>';
        echo '</div>';

    ?>

    
</body>
</html> 