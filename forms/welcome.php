<?php
	session_start();
	$_GLOBAl['msg'] = null; //This message will be used to alert an error later on
?>

<html>
	<head>
		<script src="jquery-3.5.1.js"></script>
		<style>
		body{background: black;
		color: white;}
		
		nav a {color:white;}
		
		a:link{text-decoration: none;}
		
		nav{display: inline;
            padding: 10px 20px 10px 10px;
            border-bottom: 2px solid orange;
            //border-top: 2px solid orange;
            border-radius: 300px;
            background: transparent;
            text-align: center;
            color: white;
			cursor: pointer;
            }
			
			nav:hover{filter: grayscale(100%);}
			
			
		main{text-align: center;
		margin: 10% 0% 0% 0%;
		border-left: 10px solid orange;
		border-right: 10px solid orange
		}
		
		input[type=text],    
		select{
			text-align:center;
			color: orange;
			width: 40%;
			padding: 15px;
			border:none;
			border-bottom: 5px solid #b0e0e6;
			border-radius: 50px;
			margin: 5px 0px 22px 0px;
			display: inline-block;
			word-wrap: break-word;
			background: transparent;
		}
		
		input[type=text]:focus,
		select:focus{
			border: none;
			border-bottom:5px solid;
			border-top: 5px solid;
		}
		
		input[type=submit]{
		background-color: orange;
		color: white;
		border: 1px solid orange;
		border-radius: 100px;
		width: 40%;
		padding: 16px 20px;
		margin: 8px 0px;
		cursor: pointer;
		font-weight: bold;
		  }
      
	 

    input[type=submit]:hover{
		filter: grayscale(100%);
	  }
	  
	  h3{
		  color: red;
	  }
		</style>
		
	</head>
	<body>
	<?php
	
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			
			if(isset($_POST['1stTime'])){
				if($_POST['1stTime'] == "Yes"){
					header("Location:register.php");
				}
				
		
				else{
				//This code will execute if the user is not the 1st time they apply
			
				if(isset($_POST['identity'])){
			
					try{
						//This code will check if an identity exist or not
			
						$idNo = htmlspecialchars($_POST['identity']);
						if(!empty($idNo)){
							require '../connect.php';
					
							$sql = 'SELECT * FROM nansidlela.students where identity="' .$idNo. '"' . 'OR studentNo="'.$idNo.'"';
							$stm = $conn->query($sql);
							$stm->execute();
					
							if($stm->rowCount()==1){
								//if there's a record discovered an error message will be set
								//$_GLOBAl['id'] = $idNo;
								$_GLOBAL['message'] = "<h3>E01: '$idNo' is an existing profile!</h3>".
									"<h3 class=" . "error" . ">To change your profile, log in to your portal</h3>";	
							}
					
							else{
								//if there's no record discovered an error message will be set
								$_GLOBAL['message'] = "<h3>E02: '$idNo' is not an existing profile</h3>".
												"<h3>Enter correct ID or consult with school admin</h3>"; }
						}
					}
				
					catch(PDOException $e){
					
						echo "Connection failed: ".$e->getMessage();
					}
				}
			}	
		}
		}	
	?>
	<nav><a href="../menu/main.html">Home</a></nav>
		<main>
		<form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>">
			<legend>
			<?php
				//This is where an error message will pop up
				
				if(isset($_GLOBAL['message'])){
					echo $_GLOBAL['message'];
					unset($_GLOBAL['message']);
				}
			?>
			</legend>
			<label for="1stTime">Are you applying for the first time?</label>
			<br/>
			<select id="1stTime" required name="1stTime" onmouseleave="notFirstTime()">
			<option value="No" >No</option>
			<option value="Yes" selected="selected">Yes</option>
			</select>
			<br/>
			<div id="studentNumber">
			</div>
			<br/>
			<input type="submit">
		</form>
		</main>
	</body>
	
	<script>
	/*This function presents another field where users will enter their ID no
	if they not applying for the frist time*/
	function notFirstTime(){ 
		
		let returning = $("#1stTime"); 
		
		if(returning.val()=="No"){
			//This code executes if user applied before
			
			let statement= '<br/><label for="identity">Please type in your ID number</label><br/>\
			<input type="text" name="identity" id="identity" required="required">';
			
			$("#studentNumber").html(statement);
		}
		
		else{
			//If user applied before than ID field should be blank
			$("#studentNumber").html("");
		}
	}
	
	</script>
</html>