<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: education.php' );
  die();
  
}

if( isset( $_POST['name'] ) )
{
  
  if( $_POST['name'] and $_POST['school'] )
  {
    
    $query = 'UPDATE education SET
      name = "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
      school = "'.mysqli_real_escape_string( $connect, $_POST['school'] ).'",
      date = "'.mysqli_real_escape_string( $connect, $_POST['date'] ).'"      
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Education has been updated' );
    
  }

  header( 'Location: education.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM education
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: education.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>

<h2>Edit Education</h2>

<form method="post">
  
  <label for="name">Name:</label>
  <input type="text" name="name" id="name" value="<?php echo htmlentities( $record['name'] ); ?>">
    
  <br>

  <label for="school">School:</label>
  <input type="text" name="school" id="school" value="<?php echo htmlentities( $record['school'] ); ?>">
    
  <br>
  
  <label for="date">Date:</label>
  <input type="date" name="date" id="date" value="<?php echo htmlentities( $record['date'] ); ?>">
    
  <br>
  
  <input type="submit" value="Edit Education">
  
</form>

<p><a href="education.php"><i class="fas fa-arrow-circle-left"></i> Return to Education List</a></p>


<?php

include( 'includes/footer.php' );

?>