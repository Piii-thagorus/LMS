<?php
	session_start();
?>

<?php
	
	try{
		require '../connect.php';
		$GLOBALS['conn'] =  $conn; //Making it global so that it can be accessed in different scopes
		$GLOBALS['conn']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$GLOBALS['id'] = $_SESSION['personal']['Identity'];
		
		//This function will be used to send data into database
		function insertingDetails($details, $table){
			
			//Inserting ID as it will be used as a unique identifier for a record
			$GLOBALS['conn']->exec("INSERT INTO nansidlela.".$table." (identity) VALUES('".$GLOBALS['id']."')");
			
			if(isset($details['Stand'])){
			
				//All the address values will be stored as one sentence
				//The sentence will start with the stand number
				$GLOBALS['adr'] = $details['Stand'];
			
			}
			
			foreach($details as $k=>$v){
			
				if($k == "City/Town" || $k == "Suburb/Village" ||
					$k == "Section/Street" || $k=="Postal_address"){
					
					//making all address values a single string
					$GLOBALS['adr'] = $GLOBALS['adr']." ".$v;
					continue;
					
					}
				if($k == "Identity" || $k == "Stand"){
					//The identity is already pushed to the database
					//The stand will be pushed at a later stage as a single string with other address values
					continue;
				}
				
				else{
					
					$sql = "UPDATE nansidlela.".$table." SET $k = '$v' WHERE Identity='".$GLOBALS['id']."'";
					$GLOBALS['conn']->exec($sql);
				}	
		}	
			if(isset($details['Stand'])){
				
				//sending the address to the database
				$adr = $GLOBALS['adr'];
				$GLOBALS['conn']->exec("UPDATE nansidlela.".$table." SET Physical_address ='$adr' WHERE Identity ='".$GLOBALS['id']."'");
				
			}
		}
		
		//This function will send the education details to the dabase	
		function education($details){
			
			//Inserting the ID first for identification
			$GLOBALS['conn']->exec("INSERT INTO nansidlela.education (identity) VALUES('".$GLOBALS['id']."')");
			
			foreach($details as $k=>$v){
				$sql = "UPDATE nansidlela.education SET $k = '$v' WHERE Identity='".$GLOBALS['id']."'";
				$GLOBALS['conn']->exec($sql);
				
				}
		}
		
		if($_SERVER["REQUEST_METHOD"]=="POST"){
			
			insertingDetails($_SESSION['personal'], "personalDetails");
			insertingDetails($_SESSION['medical'],  "medicalinfo");
			insertingDetails($_SESSION['guardian'], "guardians");
			education($_SESSION['education']);
		}		
	}
	catch(PDOException $e){
		echo "Connection failed: ".$e->getMessage();
	}
?>