<?php
//Declaring variables to prevent errors
$sname = ""; //name
$sdecks = ""; //decks
$srooms = ""; //rooms
$sbr = ""; //br
$soff = "";  //office
$sconf = ""; //conference
$slab = ""; //lab
$sspec = ""; //specialty
$sstor = ""; //storage
$stran = ""; //transporter
$sshut = ""; // Shuttle
$error_array = array(); //Holds error messages

if(isset($_POST['ship_button'])){

	//Registration form values

	//Name
	$sname = strip_tags($_POST['ship_name']); //Remove html tags
	$_SESSION['ship_name'] = $sname; //Stores ship name into session variable

	//Decks
	$sdecks = strip_tags($_POST['ship_decks']); //Remove html tags
	$_SESSION['ship_decks'] = $sdecks; //Stores # of into session variable
    

    //Rooms
	$srooms = strip_tags($_POST['ship_rooms']); //Remove html tags	
    $_SESSION['ship_rooms'] = $srooms; //Stores # of into session variable
    
    //BR
	$sbr = strip_tags($_POST['ship_br']); //Remove html tags	
    $_SESSION['ship_br'] = $sbr; //Stores # of into session variable
    
    //Office
	$soff = strip_tags($_POST['ship_office']); //Remove html tags	
	$_SESSION['ship_office'] = $soff; //Stores # of into session variable

	 //Conference
     $sconf = strip_tags($_POST['ship_conf']); //Remove html tags     
     $_SESSION['ship_conf'] = $sconf; //Stores # of into session variable
 
	 //Lab
     $slab = strip_tags($_POST['ship_lab']); //Remove html tags     
     $_SESSION['ship_lab'] = $slab; //Stores # of into session variable
 

    //Specialty
    $sspec = strip_tags($_POST['ship_spec']); //Remove html tags	
	$_SESSION['ship_spec'] = $sspec; //Stores # of into session variable


    //Storage
    $sstor = strip_tags($_POST['ship_stor']); //Remove html tags
	$_SESSION['ship_stor'] = $sstor; //Stores # of into session variable

    
    //Transporter
    $stran = strip_tags($_POST['ship_tran']); //Remove html tags	
	$_SESSION['ship_tran'] = $stran; //Stores # of  into session variable

    //Shuttle
    $sshut = strip_tags($_POST['ship_shut']); //Remove html tags	
	$_SESSION['ship_shut'] = $sshut; //Stores # of Shuttle into session variable



	if(strlen($sname) > 25 || strlen($sname) < 25) {
		array_push($error_array, "Ship name must be between 2 and 25 characters<br>");
	}

	if($sdecks = '') {
		array_push($error_array,  "Must enter a number<br>");
    }
    
    if($srooms = '') {
		array_push($error_array,  "Must enter a number<br>");
    }
    
    if($sbr = '') {
		array_push($error_array,  "Must enter a number<br>");
    }
    
    if($soff = '') {
		array_push($error_array,  "Must enter a number<br>");
    }
    
    if($sconf = '') {
		array_push($error_array,  "Must enter a number<br>");
    }
    
    if($slab = '') {
		array_push($error_array,  "Must enter a number<br>");
    }
    
    if($sspec = '') {
		array_push($error_array,  "Must enter a number<br>");
    }
    
    if($sstor = '') {
		array_push($error_array,  "Must enter a number<br>");
    }
    
    if($stran = '') {
		array_push($error_array,  "Must enter a number<br>");
    }
    
    if($sshut = '') {
		array_push($error_array,  "Must enter a number<br>");
	}

	if(empty($error_array)) {


		$query = mysqli_query($con, "INSERT INTO ship VALUES ('', '$sname', '$sdecks', '$srooms', '$sbr', '$soff', '$sconf', '$slab', '$sspec', '$sstor', '$stran', '$sshut')");

		array_push($error_array, "<span style='color: #14C800;'>Entry Logged In</span><br>");

		//Clear session variables 
		$_SESSION['ship_name'] = "";
		$_SESSION['ship_decks'] = "";
		$_SESSION['ship_rooms'] = "";
        $_SESSION['ship_br'] = "";
        $_SESSION['ship_office'] = "";
        $_SESSION['ship_conf'] = "";
        $_SESSION['ship_spec'] = "";
        
        $_SESSION['ship_lab'] = "";
        $_SESSION['ship_shut'] = "";
        $_SESSION['ship_tran'] = "";
        $_SESSION['ship_stor'] = "";
        

	}

}
?>

                                                                                    