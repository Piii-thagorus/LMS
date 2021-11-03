<?php
	session_start()
?>

<html>
	<head>
		<title>
			PHP in the house
		</title>
		<style>
		body{
		text-align: center;
		color: black;
		}

		#edu {border: 2px solid orange;
		border-radius: 40px;
		width:60%;
		}

		#edu div{
			border: 2px solid black;
		}
		</style>
	</head>
	<body>
	
		<table align="center">
		
		<?php
				
		$_SESSION['education'] = $_POST;

		//Display personal detials info
		echo "<h1>"."Your personal details are:"."</h1>";
		foreach($_SESSION['personal'] as $k => $v){
		if($v == "submit" || $v == "Submit"){
	
		}
		else {
		echo "<tr>
					<td> $k:</td>
					<td> $v </td>
			</tr>";
		
		}		
		}
		?>
		
		</table>

		<table align="center">
		<?Php
		//Displaying medical info
		$i = 0;
		echo "<h1>"."Your medical details are:"."</h1>";
		foreach($_SESSION['medical'] as $k => $v){
		if($v == "submit" || $v == "Submit"){
			continue;
		}
		if ($k == "Full_name") {
			$i++;
			if($i==1){
			echo "<tr><td colspan ='2'><h2>Your Doctor's/Specialist's details:</h2></td></tr>";
			}
			echo "<tr>
					<td> $k:</td>
					<td> $v </td>
			</tr>";
		
			continue;
		}

		else {
		echo "<tr>
					<td> $k:</td>
					<td> $v </td>
			</tr>";
		
		}
		}

		?>

		</table>
		
		<table align="center">
		<?php
		//Displaying guardian info
		echo "<h1>"."Your guradian/parent details are:"."</h1>";
		$x = 0;
		$y = 0;
		$z = 0;
		foreach($_SESSION['guardian'] as $k => $v){
		
		if($v == "submit" || $v == "Submit"){
		//Should not display the submit input
		//Just pass

		continue;
		}
		
			if(is_int(strpos($k, "2"))) //Checking if theres a second parent/Guardian
			//All field names of guardians/parents end with the number representing its the guardian number. except for the first form
			//E.g if there are two parent/guardian forms the second form will have all its field names end with number 2
			{
				$x++;
				if($x==1){
				//Making sure that this heading is only displayed once during a loop
					echo "<h2>Parent/Guardian 2</h2>";
				}
				//These are field names that end with number 2, and their respective values
				//The number 2 is removed for easy reading for the user

				
				echo "<tr>
					<td>".str_replace("2", "", $k)."</td>
					<td> $v </td></tr>";
				
				continue; //Should not execute the statements below
			}

			if(is_int(strpos($k, "3"))) //Checking if theres a third parent/Guardian
			//All field names of guardians/parents end with the number representing its the guardian number. except for the first form
			//E.g if there are two parent/guardian forms the second form will have all its field names end with number 2
			{
				$y++;
				if($y==1){
				//Making sure that this heading is only displayed once during a loop
					echo "<h2>Parent/Guardian 3</h2>";
				}
				//These are field names that end with number 3, and their respective values
				//The number 3 is removed for easy reading for the user

				
				echo "<tr>
					<td>".str_replace("3", "", $k)."</td>
					<td> $v </td></tr>";
				continue; //Should not execute the statements below
			}
			
			if(is_int(strpos($k, "4"))) //Checking if theres a fourth parent/Guardian
			//All field names of guardians/parents end with the number representing its the guardian number. except for the first form
			//E.g if there are two parent/guardian forms the second form will have all its field names end with number 2
			{
				$z++;
				if($z==1){
				//Making sure that this heading is only displayed once during a loop
					echo "<h2>Parent/Guardian 4</h2>";
				}
				//These are field names that end with number 4, and their respective values
				//The number 4 is removed for easy reading for the user

				echo "<tr>
					<td>".str_replace("4", "", $k)."</td>
					<td> $v </td>
			</tr>";
				continue; //Should not execute the statements below
			}

			else {
			echo "<tr>
					<td> $k:</td>
					<td> $v </td>
			</tr>";
			}
			}

		?>
		</table>

		<table id="edu" align="center">
		<?php
			//Education info
		echo "<h1>"."Your education details are:"."</h1>";
		foreach($_SESSION['education'] as $k => $v){
		if($v == "submit" || $v == "Submit"){
	
		}
		if($k == "Subjects"){
			$a = explode(";", $v);
			echo "<div>";
			//displaying subjects
			echo '<tr><td colspan="2" align="center">'.$k.':</td></tr>';

					foreach($a as $m){
							
					echo "<tr><td>$m</td></tr>";
				}
			echo "</div>";
			
		}
		else {
		echo "<tr>
					<td> $k:</td>
					<td> $v </td>
			</tr>";
		}
		}
		
		?>
		</table>
		
		<br/>
		<form method="post" action="form2db.php">
			<button>Proceed</button>
		</form>
	</body>
</html>

