<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: jobs.php' );
  die();
  
}

if( isset( $_POST['name'] ) )
{
  
  if( $_POST['name'] and $_POST['position'] )
  {
    
    $query = 'UPDATE jobs SET
      name = "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
      position = "'.mysqli_real_escape_string( $connect, $_POST['position'] ).'",
      date = "'.mysqli_real_escape_string( $connect, $_POST['date'] ).'"      
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Job has been updated' );
    
  }

  header( 'Location: jobs.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM jobs
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: jobs.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>

<h2>Edit Job</h2>

<form method="post">
  
  <label for="name">Name:</label>
  <input type="text" name="name" id="name" value="<?php echo htmlentities( $record['name'] ); ?>">
    
  <br>

  <label for="position">Position:</label>
  <input type="text" name="position" id="position" value="<?php echo htmlentities( $record['position'] ); ?>">
    
  <br>
  
  <label for="date">Date:</label>
  <input type="date" name="date" id="date" value="<?php echo htmlentities( $record['date'] ); ?>">
    
  <br>
  
  <input type="submit" value="Edit Job">
  
</form>

<p><a href="jobs.php"><i class="fas fa-arrow-circle-left"></i> Return to Job List</a></p>


<?php

include( 'includes/footer.php' );

?>