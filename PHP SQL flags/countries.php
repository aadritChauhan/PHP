<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Countries</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>      
    <h1>List of Countries</h1>
    <?php

    $connect= mysqli_connect(
        'sql108.epizy.com', //host
        'epiz_33373342', //user
        '5mk4hwvn', //password
        'epiz_33373342_aadrit_11' //DbName
    );

    if(mysqli_connect_errno())
    {
        echo"Error: " . mysqli_connect_error();
    }
    $query= 'SELECT * FROM countries ORDER BY name';
    $result= mysqli_query($connect, $query)
        or die(mysqli_error($connect));

        echo "Rows:" . mysqli_num_rows($result);

        while($record= mysqli_fetch_assoc($result))
        {
            //print_r($record);
            echo '<div class= "country">';
            echo '<h2>' .$record['name'].'</h2>';
            echo '<p>Population: '.$record['population'].'</p>';

            echo '<div class="faces">';

            $faces=round($record['population']/10000000);
            if($faces)
            {
                for($i=0;$i<$faces;$i++)
                {
                    echo '&#9787;';
                }
            }
            else
            {
                echo '&lt;&#9787;';
            }
            echo '</div>';

            echo '<img src="images/'.$record['flag'].'" width="200px">';
            echo '</div>';


        }
    ?>
</body>
</html>