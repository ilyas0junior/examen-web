<?php 
  
  include ( 'includes/header.html' ) ;

  function fail( $str )
  {
    echo "<p id='err_msg'>Please enter a $str.</p>";
    echo '<p><a href="post.php">Post Message</a>' ;
    include ( 'includes/footer.html' ) ;
    exit(); 
  }

  if( isset( $_POST[ 'message' ] ) )
  {
    if ( !empty( trim( $_POST[ 'first_name' ] ) ) ) 
    { 
      $first_name =  $_POST[ 'first_name' ]  ; 
    }
    else { 
      fail( 'First Name' ) ; 
    }
    if ( !empty( trim( $_POST[ 'last_name' ] ) ) )
    { 
      $last_name = addslashes( $_POST[ 'last_name' ] ) ; 
    }
    else { 
      fail( 'Last Name' ) ; 
    }
    if ( !empty( trim( $_POST[ 'subject' ] ) ) )
    { 
      $subject = addslashes( $_POST[ 'subject' ] ) ; 
    }
    else { 
      fail( 'Subject' ) ; 
    }
    if ( !empty( trim( $_POST[ 'message' ] ) ) )
    { 
      $message = addslashes( $_POST[ 'message' ] ) ; 
    }
    else { 
      fail( 'Message' ) ; 
    }

    // Faire appel au ficheir connect_db.php qui contient la connexion avec la base de donnée
    require ( 'connect_db.php' ) ;

    // requête d'insertion dans la table forum:
    $sql = "INSERT INTO forum (first_name,last_name,subject,message,post_date) 
            VALUES ('$first_name', '$last_name','$subject', '$message', NOW() )" ;

    // Exécution de la requête    
       if (  $conn->query($sql)== false ) 
    { echo '<p>Error:</p>'; } 
    else // si les données sont bien insérées, redirection vers page forum.php
    { 
    $conn->close(); ;
    header('Location:forum.php') ; 
    }
}