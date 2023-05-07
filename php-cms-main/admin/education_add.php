<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['name'] ) )
{
  
  if( $_POST['name'] and $_POST['school'] )
  {
    
    $query = 'INSERT INTO education (
        name,
        school,
        date
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['school'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['date'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Education has been added' );
    
  }
  
  header( 'Location: education.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Education</h2>

<form method="post">
  
  <label for="name">Name:</label>
  <input type="text" name="name" id="name">
    
  <br>
  
  <label for="school">School:</label>
  <input type="text" name="school" id="school">
  
  <br>
  
  <label for="date">Date:</label>
  <input type="date" name="date" id="date">
  
  <br>
 
  <input type="submit" value="Add Education">
  
</form>

<p><a href="education.php"><i class="fas fa-arrow-circle-left"></i> Return to Education List</a></p>


<?php

include( 'includes/footer.php' );

?>