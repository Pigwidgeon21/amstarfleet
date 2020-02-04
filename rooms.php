<?php  
require 'config/config.php';



?>


<html>
<head>
    <title>StarFleet</title>
    <link rel="icon" href="assets/images/icons/sf.jpg">
    <link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="assets/js/rooms.js"></script>
</head>
<body>

	<?php  

	if(isset($_POST['#addroom'])) {
		echo '
		<script>

		$(document).ready(function() {
            $("#first").hide();
            
			$("#second").show();
		});

		</script>

		';
    }
    
    


	?>

	<div class="wrapper">

		<div class="table_box">

			<div class="table_header">
				<h1>STARFLEET COMMAND</h1>
				<a href="index.php">Home</a> || <a action="logout.php" href="register.php">Log Out</a>
			</div>
			<br>
			<div id="first">

				
					
                <?php


                    

                    // get results from database

                    $result = mysqli_query($con,"SELECT * FROM rooms");


                    

                    echo "<table  class='table table-striped table-bordered table-hover table-condensed' align='center' style='line-height: 0.5'>";

                    echo "<tr>

                    <th><a href='?orderBy=id'>ID</a></th>
					<th><a href='?orderBy=type'>Type</a></th>
					<th><a href='?orderBy=name'>Name</a></th>
                    <th><a href='?orderBy=occupant'>Occupant</a></th>
                    <th><a href='?orderBy=floor'>Floor</a></th>
                    <th><a href='?orderBy=ship'>Ship</a></th>
					
                    <th></th> 
                    <th></th>
                    </tr>";



                   
                


                    // loop through results of database query, displaying them in the table

                    while($row = mysqli_fetch_array($result)) {



                    // echo out the contents of each row into a table

                    echo "<tr>";

                    echo '<td style="height:5px">' . $row['id'] . '</td>';

                    echo '<td style="height:5px">' . $row['type'] . '</td>';

                    echo '<td style="height:5px">' . $row['name'] . '</td>';

                    echo '<td style="height:5px">' . $row['occupant'] . '</td>';

                    echo '<td style="height:5px">' . $row['floor'] . '</td>';

                    echo '<td style="height:5px">' . $row['ship'] . '</td>';

                    // echo '<td>' . $row['office'] . '</td>';

                    // echo '<td>' . $row['conference'] . '</td>';

                    // echo '<td>' . $row['lab'] . '</td>';

                    // echo '<td>' . $row['specialty'] . '</td>';

                    // echo '<td>' . $row['storage'] . '</td>';

                    // echo '<td>' . $row['transporter'] . '</td>';

                    // echo '<td>' . $row['shuttle'] . '</td>';

                    // echo '<td>' . $row['living'] . '</td>';

                    echo '<td><form action="redit.php?id=' . $row['id'] . '" method="post">
                    <input type="hidden" name="id" value="'. $row["id"] .'"> 
                    <input type="submit" name="edit" value="Edit">
                    </form></td>';

                    echo '<td><form action="rdelete.php?id=' . $row['id'] . '" method="post">
                    <input type="hidden" name="id" value="'. $row["id"] .'"> 
                    <input type="submit" name="delete" value="Delete">
                    </form></td>';

                    }

                    // close table>

                    echo "</table>";

                    
                ?>
 
                    <input type="submit" target="#" id="addroom"  value="Add">
					<br>
					
				

            </div>




            

			<div id="second">

                <?php


                function renderForm($rtype, $rname, $rocc, $rfloor, $rship, $error) {
                // if there are any errors, display them

                if ($error != '')

                    {

                    echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';

                    }

                ?>

				<form action="" method="POST">

                <input type="text" name="type" placeholder="Type" value="<?php 
						echo $rtype; ?>" required>
					
                    <br>
                    
					<input type="text" name="name" placeholder="Name" value="<?php 
						echo $rname; ?>" required>
					
                    <br>
                    
					<input type="text" name="occupant" placeholder="Occupant" value="<?php 
						echo $rocc; ?>" required>
					
                    <br>
<!--Ship/room info -->

                    <input type="text" name="floor" placeholder="Floor" value="<?php 
						echo $rfloor; ?>" required>
					
                    <br>

                    <input type="text" name="ship" placeholder="Ship" value="<?php 
						echo $rship; ?>" required>
					
                    <br>

                    
                   
					
		
					<input type="submit" name="submit" value="Add">
					<br>

					
					<a href="#" id="returnr" class="returnr">Return to Table</a>
                
                </form>
                
            
            </div>


            







		</div>

	</div>


</body>
</html>
<?php

}






// check if the form has been submitted. If it has, start to process the form and save it to the database

if (isset($_POST['submit']))

{

// get form data, making sure it is valid


	//Type
	$rtype = strip_tags($_POST['type']); //Remove html tags
	
	//Name
	$rname = strip_tags($_POST['name']); //Remove html tags
	

    //Occupant
	$rocc = strip_tags($_POST['occupant']); //Remove html tags	
    
    //Floor
	$rfloor = strip_tags($_POST['floor']); //Remove html tags	
    
     //Ship
	 $rship = strip_tags($_POST['ship']); //Remove html tags	
	
	//  //Conference
    //  $sconf = strip_tags($_POST['conf']); //Remove html tags     
    
	//  //Lab
    //  $slab = strip_tags($_POST['lab']); //Remove html tags     
    

    // //Specialty
    // $sspec = strip_tags($_POST['spec']); //Remove html tags	
	

    // //Storage
    // $sstor = strip_tags($_POST['stor']); //Remove html tags
	
    
    // //Transporter
    // $stran = strip_tags($_POST['tran']); //Remove html tags	
	
    //Shuttle
    // $sshut = strip_tags($_POST['shut']); //Remove html tags	
	





// check to make sure both fields are entered

if ($rtype == '' || $rname == '' || $rocc == '' || $rfloor == ''|| $rship == '')

{

// generate error message

$error = 'ERROR: Please fill in all required fields!';



// if either field is blank, display the form again

renderForm($rtype, $rname, $rocc, $rfloor, $rship, $error);

}

else

{

// save the data to the database

$query= mysqli_query($con, "INSERT decks SET type='$rtype', name='$rname', occupant='$rocc', floor='$rfloor', ship='$rship'")

//$query = mysqli_query($con, "INSERT INTO ship VALUES ('', '$sname', '$sdecks', '$srooms', '$sbr', '$soff', '$sconf', '$slab', '$sspec', '$sstor', '$stran', '$sshut')");

		

or die(mysql_error());



// once saved, redirect back to the view page

header("Location: rooms.php");

}

}

else

// if the form hasn't been submitted, display the form

{

renderForm('','','','','','');

}

?>