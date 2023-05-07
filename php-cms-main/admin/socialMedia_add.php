<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['name'] ) )
{
  
  if( $_POST['name'] and $_POST['url'] )
  {
    
    $query = 'INSERT INTO socialMedia (
        name,
        url
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['url'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Social Media has been added' );
    
  }
  
  header( 'Location: socialMedia.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Social Media</h2>

<form method="post">
  
  <label for="name">Name:</label>
  <input type="text" name="name" id="name">
    
  <br>
  
  <label for="url">URL:</label>
  <input type="text" name="url" id="url">
  
  <br>
   
  <input type="submit" value="Add Social Media">
  
</form>

<p><a href="socialMedia.php"><i class="fas fa-arrow-circle-left"></i> Return to Social Media List</a></p>


<?php

include( 'includes/footer.php' );

?>