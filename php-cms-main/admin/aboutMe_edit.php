<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: aboutMe.php' );
  die();
  
}

if( isset( $_POST['heading'] ) )
{
  
  if( $_POST['heading'] and $_POST['description'] )
  {
    
    $query = 'UPDATE aboutMe SET
      heading = "'.mysqli_real_escape_string( $connect, $_POST['heading'] ).'",
      description = "'.mysqli_real_escape_string( $connect, $_POST['description'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'About Me has been updated' );
    
  }

  header( 'Location: aboutMe.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM aboutMe
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: aboutMe.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>

<h2>Edit Project</h2>

<form method="post">
  
  <label for="heading">Heading:</label>
  <input type="text" name="heading" id="heading" value="<?php echo htmlentities( $record['heading'] ); ?>">
    
  <label for="description">Description:</label>
  <input type="text" name="description" id="description" value="<?php echo htmlentities( $record['description'] ); ?>">
    
    
 
  
  
  <br>
  
  <input type="submit" value="Edit Description">
  
</form>

<p><a href="aboutMe.php"><i class="fas fa-arrow-circle-left"></i> Return to About Me List</a></p>


<?php

include( 'includes/footer.php' );

?>