<?php 
require 'config/config.php';
	
if (isset($_GET['id']) && is_numeric($_GET['id']))

{

// get id value

$id = $_GET['id'];



// delete the entry

$result = mysqli_query($con,"DELETE FROM decks WHERE id=$id")

or die(mysql_error());



// redirect 

header("Location: decks.php");

}

else

// if id isn't set, or isn't valid, redirect 

{

header("Location: decks.php");

}



?>