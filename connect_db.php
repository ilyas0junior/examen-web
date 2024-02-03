<?php

//the mysqli class returns an "object" that 
//represents the connection to the MySQL Server


$conn = new mysqli("localhost", "root", "", "forumdb") ;

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

