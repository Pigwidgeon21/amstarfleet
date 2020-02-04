<?php  
require 'config/config.php';
//require 'includes/form_handlers/register_handler.php';
//require 'includes/form_handlers/login_handler.php';



?>


<html>
<head>
    <title>StarFleet</title>
    <link rel="icon" href="assets/images/icons/sf.jpg">
    <link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="assets/js/ship.js"></script>
</head>
<body>

	<?php  

	if(isset($_POST['ship_button'])) {
		echo '
		<script>

		$(document).ready(function() {
            $("#third").hide();
           
			$("#fourth").show();
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
			<div id="third">

				
					
                <?php


                    

                    // get results from database

                    $result = mysqli_query($con,"SELECT * FROM ship");





//                     $orderBy = array('id', 'name', 'decks', 'rooms', 'br', 'office', 'conference', 'lab', 'specialty', 'storage', 'transporter', 'shuttle', 'living');

// $order = 'id';
// if (isset($_GET['orderBy']) && in_array($_GET['orderBy'], $orderBy)) {
//     $order = $_GET['orderBy'];
// }

// $query = 'SELECT * FROM ship ORDER BY '.$order;



// $sql = "SELECT * FROM ship";

// if ($_GET['sort'] == 'id')
// {
//     $sql .= " ORDER BY id";
// }
// else if ($_GET['sort'] == 'desc')
// {
//     $sql .= " ORDER BY name";
// }
// else if ($_GET['sort'] == 'decks')
// {
//     $sql .= " ORDER BY decks";
// }
// else if($_GET['sort'] == 'rooms')
// {
//     $sql .= " ORDER BY rooms";
// }
// else if($_GET['sort'] == 'br')
// {
//     $sql .= " ORDER BY br";
// }
// else if($_GET['sort'] == 'office')
// {
//     $sql .= " ORDER BY office";
// }
// else if($_GET['sort'] == 'conference')
// {
//     $sql .= " ORDER BY conference";
// }
// else if($_GET['sort'] == 'lab')
// {
//     $sql .= " ORDER BY lab";
// }
// else if($_GET['sort'] == 'specialty')
// {
//     $sql .= " ORDER BY specialty";
// }
// else if($_GET['sort'] == 'storage')
// {
//     $sql .= " ORDER BY storage";
// }
// else if($_GET['sort'] == 'transporter')
// {
//     $sql .= " ORDER BY transporter";
// }
// else if($_GET['sort'] == 'shuttle')
// {
//     $sql .= " ORDER BY shuttle";
// }
// else if($_GET['sort'] == 'living')
// {
//     $sql .= " ORDER BY living";
// }

                    
                    // For extra protection these are the columns of which the user can sort by (in your database table).



                    // display data in table

                    // $orderBy = "id";
                    // $order = "asc";
                    
                    // if(!empty($_GET["orderby"])) {
                    //     $orderBy = $_GET["orderby"];
                    // }
                    // if(!empty($_GET["order"])) {
                    //     $order = $_GET["order"];
                    // }




                //    $orderBy = !empty($_GET["orderby"]) ? $_GET["orderby"] : "id";
                //    $order = !empty($_GET["order"]) ? $_GET["order"] : "asc";
                 
                //     $sql = "SELECT * FROM ship ORDER BY " . $orderBy . " " . $order;
                  
                //    // $result2 = $con->query($sql);

                //     $result2 = mysqli_query($con, $sql) or die( mysqli_error($con));

                //     //$result = mysqli_query($con, "SELECT * FROM ship ORDER BY " . $orderBy . " " . $order);
                    
                    
                //     //or die(mysqli_error($error));

                //     $sidOrder = "asc";
                //     $snameOrder = "asc";
                //     $sdecksOrder = "asc";
                //     $sroomsOrder = "asc";
                //     $sbrOrder = "asc";
                //     $soffOrder = "asc";
                //     $sconfOrder = "asc";
                //     $slabOrder = "asc";
                //     $sspecOrder = "asc";
                //     $sstorOrder = "asc";
                //     $stranOrder = "asc";
                //     $sshutOrder = "asc";
                //     $slivOrder = "asc";
                    
                //     if($orderBy == "id" && $order == "asc") {
                //         $sidOrder = "desc";
                //       }
            
                    
                //     if($orderBy == "name" && $order == "asc") {
                //       $nameOrder = "desc";
                //     }
                //     if($orderBy == "decks" && $order == "asc") {
                //         $sdecksOrder = "desc";
                //     }

                //     if($orderBy == "rooms" && $order == "asc") {
                //         $sroomsOrder = "desc";
                //     }

                //     if($orderBy == "br" && $order == "asc") {
                //         $sbrOrder = "desc";
                //     }

                //     if($orderBy == "office" && $order == "asc") {
                //         $soffOrder = "desc";
                //     }

                //     if($orderBy == "conference" && $order == "asc") {
                //         $sconfOrder = "desc";
                //     }

                //     if($orderBy == "lab" && $order == "asc") {
                //         $slabOrder = "desc";
                //     }

                //     if($orderBy == "specialty" && $order == "asc") {
                //         $sspecOrder = "desc";
                //     }
                //     if($orderBy == "storage" && $order == "asc") {
                //         $sstorOrder = "desc";
                //     }
                //     if($orderBy == "transporter" && $order == "asc") {
                //         $stranOrder = "desc";
                //     }
                //     if($orderBy == "shuttle" && $order == "asc") {
                //         $sshutOrder = "desc";
                //     }

                //     if($orderBy == "living" && $order == "asc") {
                //         $slivOrder = "desc";
                //     }







                    echo "<table class='table table-striped table-bordered table-hover table-condensed' align='center'>";

                    echo "<tr>

                    <th><a href='?orderBy=id'>ID</a></th>
					<th><a href='?orderBy=name'>Name</a></th>
					<th><a href='?orderBy=decks'>Decks</a></th>
                    <th><a href='?orderBy=rooms'>Rooms</a></th>
					<th><a href='?orderBy=br'>BR</a></th>
					<th><a href='?orderBy=office'>Office</a></th>
                    <th><a href='?orderBy=conference'>Conference</a></th>
					<th><a href='?orderBy=lab'>Lab</a></th>
					<th><a href='?orderBy=specialty'>Specialty</a></th>
                    <th><a href='?orderBy=storage'>Storage</a></th>
					<th><a href='?orderBy=transporter'>Transporter</a></th>
					<th><a href='?orderBy=shuttle'>Shuttle</a></th>
                    <th><a href='?orderBy=living'>Living</a></th>
                    <th></th> 
                    <th></th>
                    </tr>";



                   
                


                    // loop through results of database query, displaying them in the table

                    while($row = mysqli_fetch_array($result)) {



                    // echo out the contents of each row into a table

                    echo "<tr>";

                    echo '<td>' . $row['id'] . '</td>';

                    echo '<td>' . $row['name'] . '</td>';

                    echo '<td>' . $row['decks'] . '</td>';

                    echo '<td>' . $row['rooms'] . '</td>';

                    echo '<td>' . $row['br'] . '</td>';

                    echo '<td>' . $row['office'] . '</td>';

                    echo '<td>' . $row['conference'] . '</td>';

                    echo '<td>' . $row['lab'] . '</td>';

                    echo '<td>' . $row['specialty'] . '</td>';

                    echo '<td>' . $row['storage'] . '</td>';

                    echo '<td>' . $row['transporter'] . '</td>';

                    echo '<td>' . $row['shuttle'] . '</td>';

                    echo '<td>' . $row['living'] . '</td>';

                    echo '<td><form action="edit.php?id=' . $row['id'] . '" method="post">
                    <input type="hidden" name="id" value="'. $row["id"] .'"> 
                    <input type="submit" name="edit" value="Edit">
                    </form></td>';

                    echo '<td><form action="delete.php?id=' . $row['id'] . '" method="post">
                    <input type="hidden" name="id" value="'. $row["id"] .'"> 
                    <input type="submit" name="delete" value="Delete">
                    </form></td>';

                    }

                    // close table>

                    echo "</table>";

                    



                ?>

                

					
                    
                    <input type="submit" target="#" id="addship"  value="Add">
					<br>
					
				

			</div>

			<div id="fourth">

                <?php


                function renderForm($sname, $sdecks, $srooms, $sbr, $soff, $sconf, $slab, $sspec, $sstor, $stran, $sshut, $sliv, $error) {
                // if there are any errors, display them

                if ($error != '')

                    {

                    echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';

                    }

                ?>

				<form action="" method="POST">
					<input type="text" name="name" placeholder="Name" value="<?php 
						echo $sname; ?>" required>
					
                    <br>
                    
					<input type="number" name="decks" placeholder="Decks" value="<?php 
						echo $sdecks; ?>" required>
					
                    <br>
<!--Ship/room info -->

                    <input type="number" name="rooms" placeholder="Rooms" value="<?php 
						echo $rooms; ?>" required>
					
                    <br>

                    <input type="number" name="br" placeholder="BR" value="<?php 
						echo $sbr; ?>" required>
					
                    <br>

                    <input type="number" name="office" placeholder="Office" value="<?php 
						echo $soffice; ?>" required>
					
                    <br>

                    <input type="number" name="conf" placeholder="Conference" value="<?php 
						echo $sconf; ?>" required>
					
                    <br>

                    <input type="number" name="lab" placeholder="Lab" value="<?php 
						echo $slab; ?>" required>
					
                    <br>

                    <input type="number" name="spec" placeholder="Specialty" value="<?php 
						echo $sspec; ?>" required>
					
                    <br>

                    <input type="number" name="stor" placeholder="Storage" value="<?php 
						echo $sstor; ?>" required>
					
                    <br>

                    <input type="number" name="tran" placeholder="Transporter" value="<?php 
						echo $stran; ?>" required>
					
                    <br>

                    <input type="number" name="shut" placeholder="Shuttle" value="<?php 
						echo $sshut; ?>" required>
					
                    <br>

                    <input type="number" name="living" placeholder="Living" value="<?php 
						echo $sliv; ?>" required>
					
                    <br>
					
		
					<input type="submit" name="submit" value="Add">
					<br>

					
					<a href="#" id="returns" class="returns">Return to Table</a>
                
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
	





// check to make sure both fields are entered

if ($sname == '' || $sdecks == '' || $srooms == '' || $sbr == '' || $soff == '' || $sconf == '' || $slab == '' || $sspec == '' || $sstor == '' || $stran == '' || $sshut == '')

{

// generate error message

$error = 'ERROR: Please fill in all required fields!';



// if either field is blank, display the form again

renderForm($sname, $sdecks, $srooms, $sbr, $soff, $sconf, $slab, $sspec, $sstor, $stran, $sshut, $error);

}

else

{

// save the data to the database

$query= mysqli_query($con, "INSERT ship SET name='$sname', decks='$sdecks', rooms='$srooms', br='$sbr', office='$soff', conference='$sconf', lab='$slab', specialty='$sspec', storage='$sstor', transporter='$stran', shuttle='$sshut'")

//$query = mysqli_query($con, "INSERT INTO ship VALUES ('', '$sname', '$sdecks', '$srooms', '$sbr', '$soff', '$sconf', '$slab', '$sspec', '$sstor', '$stran', '$sshut')");

		

or die(mysql_error());



// once saved, redirect back to the view page

header("Location: ship.php");

}

}

else

// if the form hasn't been submitted, display the form

{

renderForm('','','','','','','','','','','','');

}

?>

<!-- END ADD-->






