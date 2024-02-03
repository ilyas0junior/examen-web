<?php 

include ( 'includes/header.html' ) ;
require ( 'connect_db.php' ) ;
// Execution de la requete d'affichage
$result = $conn->query("SELECT * FROM forum");

if (isset ($_GET['post_id'])){

	$id=$_GET['post_id'];
	$sqld = "DELETE FROM forum WHERE post_id=$id";
	if ($conn->query($sqld)==true)
	{echo "<script> alert('deleted successfully');</script>";
	 header('Location:forum.php');}
	else "<script> alert('Error deleting');</script>";
	
}


if ( $result->num_rows > 0 )
{
  echo '<table><tr><th>Posted By</th><th>Subject</th><th id="msg">Message</th><th id="msg">Operation</th></tr>';
  while ($row = $result->fetch_assoc())
  {
	$idget=$row['post_id'];
	
	echo '<tr><td>' . 
	$row['first_name'] .' '. 
	$row['last_name'] . '<br>'. 
	$row['post_date'].'</td><td>' .
	$row['subject'] . '</td><td>' . 
	$row['message'] . '</td> <td>';
	echo"<a href='?post_id=$idget'>delete</a>" . '</td> </tr>';
  }
  echo '</table>' ;
}
else { echo '<p>There are currently no messages.</p>' ; }
echo '<p><a href="post.php">Post Message</a></p>' ;
$conn->close();
include ( 'includes/footer.html' ) ;
?>