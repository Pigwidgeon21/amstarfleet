<?php
require 'config/config.php';


function renderForm($id,$ddeck,$dname, $drooms, $droom_name, $error)
    

{

?>


<html>

<head>

<title>Edit Record</title>

<link rel="icon" href="assets/images/icons/sf.jpg">
<link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	

</head>

<body>



                <?php


                    // if there are any errors, display them

                    if ($error != '')

                    {

                    echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';

                    }

                ?>

<div class="wrapper">

<div class="table_box">

    <div class="table_header">
        <h1>STARFLEET COMMAND</h1>
        
    </div>
    <br>

                    <form action="" method="post">

                    <input type="hidden" name="id" value="<?php echo $id; ?>"/>

                    <p><strong>ID:</strong> <?php echo $id; ?></p>
                    <p class='desc'><strong>Deck: </strong></p> <input type="text" name="deck" placeholder="Deck" value="<?php 
						echo $ddeck; ?>" required>
					
                    <br>
                    
                    <p class='desc'><strong>Name: </strong></p><input type="text" name="name" placeholder="Name" value="<?php 
						echo $dname; ?>" required>
					
                    <br>
<!--Ship/room info -->

                    <p class='desc'><strong>Rooms:</strong></p><input type="text" name="rooms" placeholder="Rooms" value="<?php 
						echo $drooms; ?>" required>
					
                    <br>

                    <p class='desc'><strong>Room Names:</strong></p><input type="text" name="room_name" placeholder="Room Names" value="<?php 
						echo $droom_name; ?>" required>
					
                    <br>

                    
                  			
		
					<input type="submit" name="submit" value="Submit">
					<br>

					
					<a href="decks.php" id="returnd" class="returns">Return to Table</a>
                
                </form>

                </div>
                </div>
                </div>

</body>

</html>

<?php

}


if (isset($_POST['submit']))


{

    // confirm that the 'id' value is a valid integer 
    
    if (is_numeric($_POST['id']))
    
    {
    
    // get form data
    
    $id = $_POST['id'];

    //Name
	$ddeck = strip_tags($_POST['deck']); //Remove html tags
	
	//Decks
	$dname = strip_tags($_POST['name']); //Remove html tags
	

    //Rooms
	$drooms = strip_tags($_POST['rooms']); //Remove html tags	
    
    //BR
	$droom_name = strip_tags($_POST['room_name']); //Remove html tags	
    
  
   





// check to make sure both fields are entered

if ($ddeck == '' || $dname == '' || $drooms == '' || $droom_name == '')

{

    // generate error message
    
    $error = 'ERROR: Please fill in all required fields!';
    
    
    
    // if either field is blank, display the form again
    
    renderForm($id, $ddeck, $dname, $drooms, $droom_name, $error);
    
    }

    else

{

// save the data to the database

//$query= mysqli_query($con, "INSERT ship SET name='$sname', decks='$sdecks', rooms='$srooms', br='$sbr', office='$soff', conference='$sconf', lab='$slab', specialty='$sspec', storage='$sstor', transporter='$stran', shuttle='$sshut'")

$query = mysqli_query($con, "UPDATE decks SET deck='$ddeck', name='$dname', rooms='$drooms', room_name='$droom_name' WHERE id='$id'");

		

//or die(mysql_error());



// redirect

header("Location: decks.php");

}

}

else

{

// if the 'id' isn't valid, display an error

echo 'Error!';

}

}

else

// if the form hasn't been submitted, get the data from the db and display the form

{



// get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)

if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)

{

    // query db

$id = $_GET['id'];

$result = mysqli_query($con, "SELECT * FROM decks WHERE id=$id")

or die(mysql_error());

$row = mysqli_fetch_array($result);

// check that the 'id' matches up with a row in the databse

if($row)

{



// get data from db



$ddeck = $row['deck'];
$dname = $row['name'];
$drooms = $row['rooms'];
$droom_name = $row['room_name'];



//show form
renderForm($id, $ddeck, $dname, $drooms, $droom_name, '');
}

else

// if no match, display result

{

echo "No results!";

}

}

else

// if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error

{

echo 'Error!';

}

}

?>