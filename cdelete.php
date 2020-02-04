<?php 
require 'config/config.php';
	
if (isset($_GET['id']) && is_numeric($_GET['id']))

{

// get id value

$id = $_GET['id'];



// delete the entry

$result = mysqli_query($con,"DELETE FROM crew WHERE id=$id")

or die(mysql_error());



// redirect back to the view page

header("Location: crew.php");

}

else

// if id isn't set, or isn't valid, redirect back to view page

{

header("Location: crew.php");

}



?>