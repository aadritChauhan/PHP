<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['heading'] ) )
{
  
  if( $_POST['heading'] and $_POST['description'] )
  {
    
    $query = 'INSERT INTO aboutMe (
        heading,
        description
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['heading'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['description'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'About Me has been added' );
    
  }
  
  header( 'Location: aboutMe.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Social Media</h2>

<form method="post">
  
  <label for="heading">Heading:</label>
  <input type="text" name="heading" id="heading">
    
  <br>
  
  <label for="description">Description:</label>
  <input type="text" name="description" id="description">
  
  <br>
   
  <input type="submit" value="Add About Me">
  
</form>

<p><a href="aboutMe.php"><i class="fas fa-arrow-circle-left"></i> Return to About Me List</a></p>


<?php

include( 'includes/footer.php' );

?>