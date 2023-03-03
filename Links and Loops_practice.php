<!doctype html>
<html>
<head>
   <title>PHP and For Loops</title> 
</head>
<body>
    
  <h1>PHP and For Loops</h1> 

  <p>Use PHP echo, if statements, and loops to output all three links.</p>

  <?php

  // **************************************************
  // Do not edit this code
  
  $links = array (
    0 => array (
      'name' => 'Codecademy',
      'url' =>'https://www.codecademy.com/',
      'image' => '',
      'description' => 'Learn to code interactively, for free.' ),
    1 => array ( 
      'name' => '',
      'url' => 'https://www.w3schools.com/',
      'image' => 'w3schools.png',
      'description' => 'W3Schools is optimized for learning, testing, and training.' ),
    2 => array (
      'name' => 'Mozilla Developer Network',
      'url' => 'https://www.codecademy.com/',
      'image' => 'mozilla.png',
      'description' => 'The Mozilla Developer Network (MDN) provides information about Open Web technologies.' )
    );
    
  // **************************************************

  for ($i = 0; $i < count ($links); $i ++)
  {
    if($links[$i]['name']===""){
    echo '<h1>'.(parse_url($links[$i]['url'], PHP_URL_HOST)).'</h1>';
    }
    else{
      echo "<h1>".$links[$i]['name']."</h1>";
    }
    if($links[$i]['url']===""){
      echo "<h3>NO URL FOUND </h3>";
    }
    else{
      echo"<a href>" .$links[$i]['url']."</a>";
    }
    if($links[$i]['image']===""){
      echo "<h3> NO IMAGE FOUND</h3>";
    }
    else{
      echo'<img src="'.$links[$i]['image'].'" width=200px >';
    }
    if($links[$i]['description']==="")
    {
      echo"<h3>NO URL FOUND</h3>";
    }
    else{
      echo"<p>".$links[$i]['description']."</p>";
    }

  }

  

  ?>
    
</body>
</html>
