<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student portal</title>
		
    <script src="jquery-3.5.1.js"></script>


    <style>
	body{
		text-align: center;
	}
	
	figure{
		margin: 0%;
		padding:0%;
		width: 100%;
		height: 100%;
		width: 200px;
		//width: 200px;
		}
		
	div{
		padding-top: 10px;
       // display: flex;
        //flex-direction: row;
        align-items: center;
	}
	
	button{margin-left: 10px;}
	</style>
</head>
<body>
<h1> Welcome to the The blackboard</h1>
<h2>Please slect he school you are interested in</h2>
<form acion="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
<label for="filterBy">Filter BY:</label><br/>
<select>
<option value="name" selected="selected">School Name</option>
<option value="district">District</option>
</select>
</form>
<br/>
<form>
	<?php
	
	try{
	
		require '../connect.php';
		
			$sql = "SELECT * FROM allschools.schools";
			$stm = $conn->query($sql);
			$stm->execute();
			$results = $stm-> fetchAll(PDO::FETCH_ASSOC);	//fetch stores the results as an array 
			//$_SESSION['row'] = $results;
			$outcome = count($results);
			if($outcome % 2 != 0){
				$i = 0;
				while($i < $outcome-1){
					if($i % 2 == 0){
						echo '<div><button><figure>'.
							'<img src="'.$results[$i]['logourl'].'" height="150px" width="150px"/>'.
							'<figcaption>'.$results[$i]['name'].'</figcaption>'.
							'<figure/></button>'.
							'<button><figure>'.
							'<img src="'. $results[$i+1]['logourl']. '" height="150px" width="150px"/>'.
							'<figcaption>'.$results[$i+1]['name']. '</figcaption>'.
							'<figure></button></div><br/>';
					}
					$i += 1;
				}
				echo '<button>'.
					'<figure>'.
					'<img src="'. $results[$outcome-1]['logourl'].'" height="150px" width="150px"/>'.
					'<figcaption>'.$results[$outcome-1]['name'].'</figcaption>'.
					'<figure></button>';
			}
			else{
				$i = 0;
				while($i < $outcome-1){
					if($i % 2 == 0){
						echo '<div><button><figure>'.
							'<img src="'.$results[$i]['logourl'].'" height="150px" width="150px"/>'.
							'<figcaption>'.$results[$i]['name'].'</figcaption>'.
							'<figure/></button>'.
							'<button><figure>'.
							'<img src="'. $results[$i+1]['logourl']. '" height="150px" width="150px"/>'.
							'<figcaption>'.$results[$i+1]['name']. '</figcaption>'.
							'<figure></button></div><br/>';
					}
					$i += 1;
				}	
			}
	}
	catch(PDOException $e){
		echo "Connection failed: ".$e->getMessage();
	}
?>

</form>
</body>
<script>
</script>
</html>