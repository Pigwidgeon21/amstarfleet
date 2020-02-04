<?php  
require 'config/config.php';

if (isset($_SESSION['username'])) {
	$userLoggedIn = $_SESSION['username'];
	$user_details_query = mysqli_query($con, "SELECT * FROM admin WHERE username='$userLoggedIn'");
	$user = mysqli_fetch_array($user_details_query);
}
else {
	header("Location: register.php");
}


?>


<html>
<head>
    <title>StarFleet</title>
    <link rel="icon" href="assets/images/icons/sf.jpg">
    <link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="assets/js/decks.js"></script>
</head>
<body>

	

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

                    $result = mysqli_query($con,"SELECT * FROM admin");

 
                ?>


<div class="user_details column">
    <div class="head">
		<a href="<?php echo $userLoggedIn; ?>">  <img  src="<?php echo $user['profile_pic']; ?>"> </a>

		<div class="user_details_left_right">
            <p class='name'>
			<a href="<?php echo $userLoggedIn; ?>">
			<?php 
			echo $user['first_name'] . " " . $user['last_name'];

			 ?>
            </a>
</p>
			
			<?php echo "<p class='role'>"  .$user['role']. "</p>"; 
			echo   "<p class='role'>"  .$user['ship']. "</p>"; 

            ?>

<img src="assets/images/sfc2.png" />
<p class='role'>'Ex Astra, Scientia?'</p>
            
            
            
        </div>
        </div>

	</div>
    


<div class= "nav-div">
<nav id="nav-bar" class="navbar">
    <ul class="menu">
      <li class="nav-link"><a href="ship.php">Ships</a></li>
       &nbsp;        
      <li class="nav-link"><a href="decks.php">Decks</a></li>
      &nbsp;
      <li class="nav-link"><a href="rooms.php">Rooms</a></li>
      &nbsp;
      <li class="nav-link"><a href="crew.php">Crew</a></li>

</nav>
</div>


                
                    <br>
                    <br>
				
				

            </div>




            



            







		</div>

	</div>


</body>
</html>
