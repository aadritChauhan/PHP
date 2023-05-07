<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['name'] ) )
{
  
  if( $_POST['name'] and $_POST['position'] )
  {
    
    $query = 'INSERT INTO jobs (
        name,
        position,
        date
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['position'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['date'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Job has been added' );
    
  }
  
  header( 'Location: jobs.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Job</h2>

<form method="post">
  
  <label for="name">Name:</label>
  <input type="text" name="name" id="name">
    
  <br>
  
  <label for="position">Position:</label>
  <input type="text" name="position" id="position">
  
  <br>
  
  <label for="date">Date:</label>
  <input type="date" name="date" id="date">
  
  <br>
 
  <input type="submit" value="Add Job">
  
</form>

<p><a href="jobs.php"><i class="fas fa-arrow-circle-left"></i> Return to Job List</a></p>


<?php

include( 'includes/footer.php' );

?>