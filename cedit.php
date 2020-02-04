<?php
require 'config/config.php';


function renderForm($id,$cf_name,$cl_name, $crole, $cship, $croom, $cuser, $cemail, $error)
    

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
                    <p class='desc'><strong>First Name: </strong></p> <input type="text" name="f_name" placeholder="First Name" value="<?php 
						echo $cf_name; ?>" required>
					
                    <br>
                    
                    <p class='desc'><strong>Last Name: </strong></p><input type="text" name="l_name" placeholder="Last Name" value="<?php 
						echo $cl_name; ?>" required>
					
                    <br>
<!--Ship/room info -->

                    <p class='desc'><strong>Role:</strong></p><input type="text" name="role" placeholder="Role" value="<?php 
						echo $crole; ?>" required>
					
                    <br>

                    <p class='desc'><strong>Ship:</strong></p><input type="text" name="ship" placeholder="Ship" value="<?php 
						echo $cship; ?>" required>
					
                    <br>

                    <p class='desc'><strong>Room:</strong></p><input type="text" name="room" placeholder="Room" value="<?php 
						echo $croom; ?>" required>
					
                    <br>

                    <p class='desc'><strong>Username:</strong></p><input type="text" name="username" placeholder="Username" value="<?php 
						echo $cuser; ?>" required>
					
                    <br>

                    <p class='desc'><strong>Email:</strong></p><input type="text" name="email" placeholder="email" value="<?php 
						echo $cemail; ?>" required>
					
                    <br>

                    
                  			
		
					<input type="submit" name="submit" value="Submit">
					<br>

					
					<a href="crew.php" id="returnc" class="returnc">Return to Table</a>
                
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

    //First Name
	$cf_name = strip_tags($_POST['f_name']); //Remove html tags
	
	//Last Name
	$cl_name = strip_tags($_POST['l_name']); //Remove html tags
	

    //Role
	$crole = strip_tags($_POST['role']); //Remove html tags	
    
    //ship
    $cship = strip_tags($_POST['ship']); //Remove html tags	

    //room
    $croom = strip_tags($_POST['room']); //Remove html tags	

    //username
    $cuser = strip_tags($_POST['username']); //Remove html tags	

    //email
    $cemail = strip_tags($_POST['email']); //Remove html tags	
    
    
    
  
   





// check to make sure both fields are entered

if ($cf_name == '' || $cl_name == '' || $crole == '' || $cship == ''|| $croom == ''|| $cuser == ''|| $cemail == '')

{

    // generate error message
    
    $error = 'ERROR: Please fill in all required fields!';
    
    
    
    // if either field is blank, display the form again
    
    renderForm($id, $cf_name, $cl_name, $crole, $cship, $croom, $cuser, $cemail, $error);
    
    }

    else

{

// save the data to the database

//$query= mysqli_query($con, "INSERT ship SET name='$sname', decks='$sdecks', rooms='$srooms', br='$sbr', office='$soff', conference='$sconf', lab='$slab', specialty='$sspec', storage='$sstor', transporter='$stran', shuttle='$sshut'")

$query = mysqli_query($con, "UPDATE crew SET f_name='$cf_name', l_name='$cl_name', role='$crole', ship='$cship', room='$croom', username='$cuser', email='$cemail' WHERE id='$id'");



//or die(mysql_error());



// redirect

header("Location: crew.php");

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

$result = mysqli_query($con, "SELECT * FROM crew WHERE id=$id")

or die(mysql_error());

$row = mysqli_fetch_array($result);

// check that the 'id' matches up with a row in the databse

if($row)

{



// get data from db



$cf_name = $row['f_name'];
$cl_name = $row['l_name'];
$crole = $row['role'];
$cship = $row['ship'];
$croom = $row['room'];
$cuser = $row['username'];
$cemail = $row['email'];



//show form
renderForm($id, $cf_name,$cl_name, $crole, $cship, $croom, $cuser, $cemail, '');
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