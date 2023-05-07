<?php
include( 'admin/includes/database.php' );
include( 'admin/includes/config.php' );
include( 'admin/includes/functions.php' );
?>
<!doctype html>

<html>
<head>
  <html lang="en">
  <meta charset="UTF-8">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  
  <title>Website Admin</title>

  <link href="./admin/styles.css" type="text/css" rel="stylesheet">
  <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@300&display=swap" rel="stylesheet">
  
</head>
<body>
  <nav id="flexNav">
    <p style="font-size:larger">
      Aadrit Chauhan
    </p>
    <div id="flexMenu">
      <div>
         <a href="#projectFlex">Projects</a>
      </div>
      <div>
         <a href="#skil">Skills</a>
      </div>
      <div>
         <a href="#cc">Contact </a>
      </div>
      <div>
         <a href="#am">About Me</a>
      </div>
    </div>
  </nav>
  <main>
    <div id="mainFlex">
      <div>
        <img src="./Untitled.jpg" alt="">
      </div>
      <div id="mainContent">
        <h1>Hello, I'm Aadrit</h1>
        <p class="heightLine">I'm a web developer currently based in toronto, My goal is to help businesses and organizations achieve their online goals through clean, modern, and user-friendly web design.As a full-stack developer, my skills include HTML, CSS, JavaScript, MERN stack, ASP.NET, SQL and I'm also experienced in using various tools such as Git Hub, Figma, PhpMyAdmin to ensure efficient workflow and quality output.</p>
      </div>
    </div>
  <!-- education -->

      <?php 
      $query= 'SELECT * FROM education ';
      $result= mysqli_query($connect, $query);
    ?>
    <h1 class="textAlign">My Education</h1>  
    <div class="educationFlexOuter">
      <div class="educationFlex">    
        <?php while($record= mysqli_fetch_assoc($result)): ?>
         <div>
          <h2 class="textAlign"> <?php echo $record['name']; ?> </h2>

          <p class="textAlign"> <?php echo $record['school']; ?> </p>
        </div>
        <?php endwhile; ?>
      </div>
    </div>
  </main>
  
  <?php

  $query = 'SELECT *
    FROM projects
    ORDER BY date DESC';
  $result = mysqli_query( $connect, $query );

  ?>
    <!-- Projects -->

  <h1 class="textAlign">My Projects </h1>
  <div id="projectFlex">
    <?php while($record = mysqli_fetch_assoc($result)): ?>

      <div id="project">

       <h2 class="textAlign" style="text-decoration:underline"><?php echo $record['title']; ?></h2>
       <div class="projectContent"><p style="text-align:center"> <?php echo $record['content']; ?> </p></div>

        <?php if($record['photo']): ?>

         <div class="projectPic"> 
           <img src="<?php echo $record['photo']; ?>">
         </div>

          <?php else: ?>

          <p>This record does not have an image!</p>

        <?php endif; ?>
         <div><a href="<?php echo $record['url'];  ?>" style="font-weight:bold" >Link to Project</a> </div>

      </div>
    <?php endwhile; ?>
  </div>

<!-- SKILLS -->

    <?php 
      $query= 'SELECT * FROM skills ORDER BY percent DESC';
      $result= mysqli_query($connect, $query);
    ?>
    <div class="topMargin" id="skil">
        <h1 class="textAlign">My Skills</h1>
        <div class="skillBorder">
       <div class="skillSize">

          <?php while($record= mysqli_fetch_assoc($result)): ?>
            <h2 style="text-decoration:underline"> <?php echo $record['name']; ?></h2>

              <p>Percent: <?php echo $record['percent']; ?>%</p>

              <div style="background-color:grey;">
                  <div style="background-color: blue; height: 20px; width:<?php    echo $record['percent']; ?>%;">
                  </div>
              </div>

        <?php endwhile; ?>
      </div>
      </div>
      </div>
    <!-- About Me -->

    <?php 
      $query= 'SELECT * FROM aboutMe ';
      $result= mysqli_query($connect, $query);
    ?>
    <div class="topMargin" id="am">
        <h1 class="textAlign">About Me</h1>  
      <div class="aboutFlex">
        <?php while($record= mysqli_fetch_assoc($result)): ?>
          <div>
            <h2 class="textAlign" style="text-decoration:underline"> <?php echo $record['heading']; ?></h2>

            <p class="textAlign"> <?php echo $record['description']; ?> </p>

            <!-- <img src="admin/image.php?type=aboutMe&id=<?php echo $record['id']; ?>&width=100&height=100"> -->
          </div>

        <?php endwhile; ?>
      </div>     
        </div>
      <!-- Social Media -->
      <?php 
      $query= 'SELECT * FROM socialMedia ';
      $result= mysqli_query($connect, $query);
      ?>
      <div class="topMargin" id="cc"> 
          <h1 class="textAlign">Contact Me</h1>  
          <div class="socialCenter">   
          <div class="socialFlex">

          <?php while($record= mysqli_fetch_assoc($result)): ?>
            <div>
                <h2 style="text-decoration:underline"> <?php echo $record['name']; ?></h2>

                <p>Link: <a href="<?php echo $record['url']; ?>"><?php echo $record['name']; ?></a> </p>

                <?php if($record['photo']): ?>
                  
                  <img src="admin/image.php?type=socialMedia&id=<?php echo $record['id']; ?>&width=100&height=100">

                <?php else: ?>

                  <p>This record does not have an image!</p>

                <?php endif; ?>
             </div>

                <?php endwhile; ?>
              </div>
                </div>
                </div>
</body>
</html>
