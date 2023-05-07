<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM aboutMe
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'About me has been deleted' );
  
  header( 'Location: aboutMe.php' );
  die();
  
}

include( 'includes/header.php' );

$query = 'SELECT *
  FROM aboutMe
  ORDER BY heading';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage About Me</h2>

<table>
  <tr>
    <th></th>
    <th align="center">ID</th>
    <th align="center">Heading</th>
    <th align="left">Description</th>
    <th></th>
    <th></th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center">
       <img src="image.php?type=aboutMe&id=<?php echo $record['id']; ?> &width=300&height=300&format=inside">
      </td>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="center">
        <?php echo htmlentities( $record['heading'] ); ?>
      </td>
      
      <td align="left">
      <?php echo htmlentities( $record['description'] ); ?>

        </a>
      </td>
      
      <td align="center"><a href="aboutMe_photo.php?id=<?php echo $record['id']; ?>">Photo</i></a></td>
      <td align="center"><a href="aboutMe_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="aboutMe.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this about me section?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="aboutMe_add.php"><i class="fas fa-plus-square"></i> Add About Me</a></p>  


<?php

include( 'includes/footer.php' );

?>