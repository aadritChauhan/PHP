<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM jobs
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Job has been deleted' );
  
  header( 'Location: jobs.php' );
  die();
  
}

include( 'includes/header.php' );

$query = 'SELECT *
  FROM jobs
  ORDER BY date DESC';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Job</h2>

<table>
  <tr>
    <th></th>
    <th align="center">ID</th>
    <th align="left">Name</th>
    <th align="center">Position</th>
    <th align="center">Date</th>
    <th></th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center">
        <img src="image.php?type=jobs&id=<?php echo $record['id']; ?>&width=300&height=300&format=inside">
      </td>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="left">
        <?php echo htmlentities( $record['name'] ); ?>
      </td>
      <td align="left">
        <?php echo htmlentities( $record['position'] ); ?>
      </td>
      <td align="center"><?php echo htmlentities( $record['date'] ); ?></td>
      <td align="center"><a href="jobs_photo.php?id=<?php echo $record['id']; ?>">Photo</i></a></td>
      <td align="center"><a href="jobs_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="jobs.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this job?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="jobs_add.php"><i class="fas fa-plus-square"></i> Add Job</a></p>


<?php

include( 'includes/footer.php' );

?>