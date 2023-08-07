<!DOCTYPE html>
<html>
<head>
	<title>Travel Website</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
		if(isset($_POST['name'])){
			//setting connection variables
			$server = "localhost";
			$username = "root";
			$password = "";

			//setting connection with database
			$con = mysqli_connect($server, $username, $password);
			if(!$con)
				die("Connection failed due to ".mysqli_connect_error());

			//collecting post variables
			$name = $_POST['name']; 
			$age = $_POST['age']; 
			$gender = $_POST['gender'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$locations = $_POST['locations'];


			//executing query
			$sql = "INSERT INTO `travel_website`.`traveller_details`
			(name, age, gender, email, phone, locations, created_at) VALUES 
			('$name', '$age', '$gender', '$email', '$phone', '$locations', current_timestamp())";
			
			//showing error, if any
			if($con->query($sql) != true)
				echo "error $con->error";

			//closing database connection
			$con->close();
		}
	?>
	<div class="container">
		<h1>Travel Form</h1>
		<h4>Enter your travel details and specifications</h4>

		<form class="form" action="index.php" method="post">
			<input type="text" name="name" placeholder="Enter your name...">
			<input type="text" name="age" placeholder="Enter your age...">
			<input type="text" name="gender" placeholder="Enter your gender...">
			<input type="email" name="email" placeholder="Enter your email...">
			<input type="phone" name="phone" placeholder="Enter your phone...">
			<textarea name="locations" rows="3" cols="30" 
			placeholder="Enter your desired travel locations..." ></textarea> <br>
			<button class="submitBtn">Submit</button> 
		</form>

	</div>
</body>
</html>