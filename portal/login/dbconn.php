<?php
	session_start();
?>

<?php
	


	try{
		
		require '../../connect.php';
		
		if(!empty($_POST['Username']) && !empty($_POST['Password'])){
			
			$user = htmlspecialchars($_POST['Username']); //htmlspecialchars()is used to avoid injections
			$pass = htmlspecialchars($_POST['Password']); //htmlspecialchars()is used to avoid injections
			
			$sql = "SELECT * FROM nansidlela.login WHERE username='".$user."'"."AND password='".$pass."'";
			$stm = $conn->query($sql);
			$stm->execute();
			
			if($stm->rowCount()== 1){//Only one row should be returned
				
				$row = $stm-> fetch(PDO::FETCH_ASSOC);	//fetch stores the results as an array 
				$_SESSION['row'] = $row;
				
				
				header("Location:../portal.php"); //If everything is sorted then move to the portal
				exit();
				$conn->close();
			}
			else{
				$_SESSION['error'] = true; //error is set and should be returned back to the log in page
				header("Location:../../menu/login.php");
				
				$conn->close();
			}
		}
								
	}
	catch(PDOException $e){
		echo "Connection failed: ".$e->getMessage();
	}
?>
