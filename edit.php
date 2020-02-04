<?php
require 'config/config.php';


function renderForm($id,$sname, $sdecks, $srooms, $sbr, $soff, $sconf, $slab, $sspec, $sstor, $stran, $sshut, $sliv, $error)
    

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
                    <p class='desc'><strong>Name: </strong></p> <input type="text" name="name" placeholder="Name" value="<?php 
						echo $sname; ?>" required>
					
                    <br>
                    
                    <p class='desc'><strong>Decks: </strong></p><input type="number" name="decks" placeholder="Decks" value="<?php 
						echo $sdecks; ?>" required>
					
                    <br>
<!--Ship/room info -->

                    <p class='desc'><strong>Rooms:</strong></p><input type="number" name="rooms" placeholder="Rooms" value="<?php 
						echo $srooms; ?>" required>
					
                    <br>

                    <p class='desc'><strong>BR:</strong></p><input type="number" name="br" placeholder="BR" value="<?php 
						echo $sbr; ?>" required>
					
                    <br>

                    <p class='desc'><strong>Office:</strong></p><input type="number" name="office" placeholder="Office" value="<?php 
						echo $soff; ?>" required>
					
                    <br>

                    <p class='desc'><strong>Conference:</strong></p><input type="number" name="conf" placeholder="Conference" value="<?php 
						echo $sconf; ?>" required>
					
                    <br>

                    <p class='desc'><strong>Lab:</strong></p><input type="number" name="lab" placeholder="Lab" value="<?php 
						echo $slab; ?>" required>
					
                    <br>

                    <p class='desc'><strong>Specialty:</strong></p><input type="number" name="spec" placeholder="Specialty" value="<?php 
						echo $sspec; ?>" required>
					
                    <br>

                    <p class='desc'><strong>Storage: </strong></p><input type="number" name="stor" placeholder="Storage" value="<?php 
						echo $sstor; ?>" required>
					
                    <br>

                    <p class='desc'><strong>Transporter: </strong></p><input type="number" name="tran" placeholder="Transporter" value="<?php 
						echo $stran; ?>" required>
					
                    <br>

                    <p class='desc'><strong>Shuttle: </strong></p><input type="number" name="shut" placeholder="Shuttle" value="<?php 
						echo $sshut; ?>" required>
					
                    <br>

                    <p class='desc'><strong>Living: </strong></p><input type="number" name="living" placeholder="Living" value="<?php 
						echo $sliv; ?>" required>
					
                    <br>
					
		
					<input type="submit" name="submit" value="Submit">
					<br>

					
					<a href="ship.php" id="returns" class="returns">Return to Table</a>
                
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
	$sname = strip_tags($_POST['name']); //Remove html tags
	
	//Decks
	$sdecks = strip_tags($_POST['decks']); //Remove html tags
	

    //Rooms
	$srooms = strip_tags($_POST['rooms']); //Remove html tags	
    
    //BR
	$sbr = strip_tags($_POST['br']); //Remove html tags	
    
    //Office
	$soff = strip_tags($_POST['office']); //Remove html tags	
	
	 //Conference
     $sconf = strip_tags($_POST['conf']); //Remove html tags     
    
	 //Lab
     $slab = strip_tags($_POST['lab']); //Remove html tags     
    

    //Specialty
    $sspec = strip_tags($_POST['spec']); //Remove html tags	
	

    //Storage
    $sstor = strip_tags($_POST['stor']); //Remove html tags
	
    
    //Transporter
    $stran = strip_tags($_POST['tran']); //Remove html tags	
	
    //Shuttle
    $sshut = strip_tags($_POST['shut']); //Remove html tags	

    //Shuttle
    $sliv = strip_tags($_POST['living']); //Remove html tags	
	





// check to make sure both fields are entered

if ($sname == '' || $sdecks == '' || $srooms == '' || $sbr == '' || $soff == '' || $sconf == '' || $slab == '' || $sspec == '' || $sstor == '' || $stran == '' || $sshut == ''|| $sliv == '')

{

    // generate error message
    
    $error = 'ERROR: Please fill in all required fields!';
    
    
    
    // if either field is blank, display the form again
    
    renderForm($sname, $sdecks, $srooms, $sbr, $soff, $sconf, $slab, $sspec, $sstor, $stran, $sshut, $sliv, $error);
    
    }

    else

{

// save the data to the database

//$query= mysqli_query($con, "INSERT ship SET name='$sname', decks='$sdecks', rooms='$srooms', br='$sbr', office='$soff', conference='$sconf', lab='$slab', specialty='$sspec', storage='$sstor', transporter='$stran', shuttle='$sshut'")

$query = mysqli_query($con, "UPDATE ship SET name='$sname', decks='$sdecks', rooms='$srooms', br='$sbr', office='$soff', conference='$sconf', lab='$slab', specialty='$sspec', storage='$sstor', transporter='$stran', shuttle='$sshut', living='$sliv' WHERE id='$id'");

		

//or die(mysql_error());



// redirect

header("Location: ship.php");

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

$result = mysqli_query($con, "SELECT * FROM ship WHERE id=$id")

or die(mysql_error());

$row = mysqli_fetch_array($result);

// check that the 'id' matches up with a row in the databse

if($row)

{



// get data from db



$sname = $row['name'];
$sdecks = $row['decks'];
$srooms = $row['rooms'];
$sbr = $row['br'];
$soff = $row['office'];
$sconf = $row['conference'];
$slab = $row['lab'];
$sspec = $row['specialty'];
$sstor = $row['storage'];
$stran = $row['transporter'];
$sshut = $row['shuttle'];
$sliv = $row['living'];


//show form
renderForm($id, $sname, $sdecks, $srooms, $sbr, $soff, $sconf, $slab, $sspec, $sstor, $stran, $sshut, $sliv, '');
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