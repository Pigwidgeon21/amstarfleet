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
	<script src="assets/js/crew.js"></script>
</head>
<body>

	<?php  

	if(isset($_POST['#addcrew'])) {
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

                    $result = mysqli_query($con,"SELECT * FROM crew");


                    

                    echo "<table  class='table table-striped table-bordered table-hover table-condensed' align='center' style='line-height: 0.5'>";

                    echo "<tr>

                    <th><a href='?orderBy=id'>ID</a></th>
					<th><a href='?orderBy=f_name'>First Name</a></th>
					<th><a href='?orderBy=l_name'>Last Name</a></th>
                    <th><a href='?orderBy=role'>Role</a></th>
                    <th><a href='?orderBy=ship'>Ship</a></th>
                    <th><a href='?orderBy=room'>Room</a></th>
                    <th><a href='?orderBy=username'>Username</a></th>
					<th><a href='?orderBy=email'>Email</a></th>
					
                    <th></th> 
                    <th></th>
                    </tr>";



                   
                


                    // loop through results of database query, displaying them in the table

                    while($row = mysqli_fetch_array($result)) {



                    // echo out the contents of each row into a table

                    echo "<tr>";

                    echo '<td style="height:5px">' . $row['id'] . '</td>';

                    echo '<td style="height:5px">' . $row['f_name'] . '</td>';

                    echo '<td style="height:5px">' . $row['l_name'] . '</td>';

                    echo '<td style="height:5px">' . $row['role'] . '</td>';

                    echo '<td style="height:5px">' . $row['ship'] . '</td>';

                     echo '<td style="height:5px">' . $row['room'] . '</td>';

                     echo '<td style="height:5px">' . $row['username'] . '</td>';

                     echo '<td style="height:5px">' . $row['email'] . '</td>';

                    // echo '<td>' . $row['specialty'] . '</td>';

                    // echo '<td>' . $row['storage'] . '</td>';

                    // echo '<td>' . $row['transporter'] . '</td>';

                    // echo '<td>' . $row['shuttle'] . '</td>';

                    // echo '<td>' . $row['living'] . '</td>';

                    echo '<td><form action="cedit.php?id=' . $row['id'] . '" method="post">
                    <input type="hidden" name="id" value="'. $row["id"] .'"> 
                    <input type="submit" name="edit" value="Edit">
                    </form></td>';

                    echo '<td><form action="cdelete.php?id=' . $row['id'] . '" method="post">
                    <input type="hidden" name="id" value="'. $row["id"] .'"> 
                    <input type="submit" name="delete" value="Delete">
                    </form></td>';

                    }

                    // close table>

                    echo "</table>";

                    
                ?>
 
                    <input type="submit" target="#" id="addcrew"  value="Add">
					<br>
					
				

            </div>




            

			<div id="second">

                <?php


                function renderForm($cf_name,$cl_name, $crole, $cship, $croom, $cuser, $cemail, $error) {
                // if there are any errors, display them

                if ($error != '')

                    {

                    echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';

                    }

                ?>

				<form action="" method="POST">

                

                <input type="text" name="f_name" placeholder="First Name" value="<?php 
						echo $cf_name; ?>" required>
					
                    <br>
                    
					<input type="text" name="l_name" placeholder="Last Name" value="<?php 
						echo $cl_name; ?>" required>
					
                    <br>
                    
					<input type="text" name="role" placeholder="Role" value="<?php 
						echo $crole; ?>" required>
					
                    <br>
<!--Ship/room info -->

                    <input type="text" name="ship" placeholder="Ship" value="<?php 
						echo $cship; ?>" required>
					
                    <br>

                    <input type="text" name="room" placeholder="Room" value="<?php 
						echo $croom; ?>" required>
					
                    <br>
                    <input type="text" name="username" placeholder="Username" value="<?php 
						echo $cuser; ?>" required>
					
                    <br>

                    <input type="text" name="email" placeholder="Email" value="<?php 
						echo $cemail; ?>" required>
					
                    <br>

                    
                   
					
		
					<input type="submit" name="submit" value="Add">
					<br>

					
					<a href="#" id="returnc" class="returnc">Return to Table</a>
                
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



	//Name
	$cf_name = strip_tags($_POST['f_name']); //Remove html tags
	
	//Decks
	$cl_name = strip_tags($_POST['l_name']); //Remove html tags
	

    //Rooms
	$crole = strip_tags($_POST['role']); //Remove html tags	
    
    //BR
	$cship = strip_tags($_POST['ship']); //Remove html tags	
    
     //Office
	 $croom = strip_tags($_POST['room']); //Remove html tags	
	
	  //Conference
      $cuser = strip_tags($_POST['username']); //Remove html tags     
    
	  //Lab
      $cemail = strip_tags($_POST['email']); //Remove html tags     
    

    // //Specialty
    // $sspec = strip_tags($_POST['spec']); //Remove html tags	
	

    // //Storage
    // $sstor = strip_tags($_POST['stor']); //Remove html tags
	
    
    // //Transporter
    // $stran = strip_tags($_POST['tran']); //Remove html tags	
	
    //Shuttle
    // $sshut = strip_tags($_POST['shut']); //Remove html tags	
	





// check to make sure both fields are entered

if ($cf_name == '' || $cl_name == '' || $crole == '' || $cship == ''|| $croom == ''|| $cuser == ''|| $cemail == '')

{

// generate error message

$error = 'ERROR: Please fill in all required fields!';



// if either field is blank, display the form again

renderForm($cf_name,$cl_name, $crole, $cship, $croom, $cuser, $cemail, $error);

}

else

{

// save the data to the database

$query= mysqli_query($con, "INSERT crew SET f_name='$cf_name', l_name='$cl_name', role='$crole', ship='$cship', room='$croom', username='$cuser', email='$cemail'")

//$query = mysqli_query($con, "INSERT INTO ship VALUES ('', '$sname', '$sdecks', '$srooms', '$sbr', '$soff', '$sconf', '$slab', '$sspec', '$sstor', '$stran', '$sshut')");

		

or die(mysql_error());



// once saved, redirect back to the view page

header("Location: crew.php");

}

}

else

// if the form hasn't been submitted, display the form

{

renderForm('','','','','','','','');

}

?>