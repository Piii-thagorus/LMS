<?php
    session_start();
	//connecting to the database to retrieve the subjects of the user
	
	try{
		require '../connect.php';
		
		$userid = $_SESSION['row']['identity'];
		$grade = $_SESSION['row']['grade'];//This sesseion was stored in login page
		
		/*Select the table of students of that grade
		ie. if student in grade 12 then select grade12 table*/
		$sql = "SELECT * FROM nansidlela.grade" .$grade. " WHERE identity = '$userid'";	
		
		$stm = $conn->query($sql);
		$stm->execute();
		$result = $stm->fetchALL(PDO::FETCH_ASSOC);
		$GLOBALS['studySub'] = explode(";", $result[0]['subjects']); //explode converts string to array
		//$GLOBALS['studySub'] consists of the subjects
	
	}
	catch(PDOException $e){
		echo "Connection failed: ".$e->getMessage();
	}
	
?>

<html>
<head>
	 <meta charset="UTF-8">
    <title>Study material</title>
    <script src="jquery-3.5.1.js"></script>
    <style>
    body{background: black;
	color:white}
	video{margin0: 0% 50% 0% 50%}
        #columns >li{display: inline-block}
        #rows{text-align:center}
        #rows li{padding-top: 20px;}
		
	span{
        font-weight: bold;
		text-align: center;
		color: white;
		min-width: 70px;
        font-size: 30px;
	}
	
	ul{text-align: center;
	}
	 .heading{padding: 10px 0px 20px 0px;
        font-size: 40px;
        border-top: 5px solid;
        border-bottom: 5px solid orange;
        border-radius: 40px;
        margin: 0% 25% 0% 25%;
        }
	
	#back2R{
		margin-left:25%;
		margin-right:25%;
		text-align:center;
		border-bottom: 1px solid orange;
		border-top: 1px solid orange;
		cursor: pointer;
	}
	#back2R:hover{filter:grayscale(100%)}
	
	#back{font-weight: bold;
        font-size: 22px;
        margin-right: 85%;
        background: orange;
        text-align: center;
        border-radius: 100px;
        }

        a:link{text-decoration: none;}
        #back a {color: white;}
        #back:hover{filter: grayscale(100%);}	
	
	details{
		text-align:center;
	}
	
	details{
		cursor: pointer;
	}
	
	
	details summary:hover{
        filter:grayscale(100%);}
		
	details  input{
		background: transparent;
		border: 1px solid orange;
        font-weight: bold;
        color: white;
		width: 100%;
        font-size: 20px;
        cursor: pointer;
        border-radius: 100px;
		margin-top: 10px; 
	}
	
	details  input:hover{
		filter:grayscale(100%);
	}
	
	video{border: 2px solid orange;
		border-radius: 40px;
	}
	
	table{border-top: 3px solid white;
		border-right: 3px solid white;
		border-radius: 60px;
		
	}
	
	table td{padding-top: 10px;
			padding-left: 10px;
	}
	
    </style>
</head>
<body>
	<div id="back"><a href="portal.php">Back to Portal</a> </div>
	<h1 align="center" class="heading">Study LAB</h1>

  <ul id="columns">
        <li>
			 <details>
				<summary>
				<img src="icons/videos.png" width="200px" height="200px" class="image"><br/>
				<span>Videos</span>
				</summary>
				<br/>
				<form  action="study.php" method="post">
                       <input type="hidden" name="type" value="video">
						<?php
							foreach($GLOBALS['studySub'] as $s){
								
								echo '<input type="submit" name="'.$s.'" value="'.$s.'"><br/>';
							}
						?>
				</form>
			</details>
        </li>

        <li>
            <details>
				
				<summary>
				<img src="icons/papers.png" width="200px" height="200px" class="image"><br/>
				<span>Exam papers</span>
				</summary>
				
				<br/>
				
				<form action="study.php" method="post">
					
					<input type="hidden" name="type" value="papers"> 
					<!--This will send the type of source needed ie. papers, videos etc
					This is the section for question papers-->
					
					<?php	
							//Displaying the subjects of the students
							foreach($GLOBALS['studySub'] as $s){
								echo '<input type="submit" name="'.$s.'" value="'.$s.'"><br/>';
							}
						?>
				</form>
			</details>
        </li>
		  
		 <li>
			<details>
				
				<summary>
				<img src="icons/exercises.png" width="200px" height="200px" class="image"><br/>
				<span>Exercises</span>
				</summary>
				
				<br/>
				
				<form action="study.php" method="post">
                       <input type="hidden" name="type" value="exercise">
					   
					   <!--This will send the type of source needed ie. papers, videos etc
						This is the section for exercises-->
						
						<?php
						
							//Displaying the subjects of the students
							foreach($GLOBALS['studySub'] as $s){
								echo '<input type="submit" name="'.$s.'" value="'.$s.'"><br/>';
							}
						?>
				</form>
			</details>
        </li>
		 <li>
			<details>
				
				<summary>
				<img src="icons/notes.png" width="200px" height="200px" class="image"><br/>
				<span>Notes</span>
				</summary>
				
				<br/>
				
				<form action="study.php" method="post">
                    <input type="hidden" name="type" value="notes">
					<!--This will send the type of source needed ie. papers, videos etc
					This is the section for notes-->
					
					<?php
							foreach($GLOBALS['studySub'] as $s){
								
								//Displaying the subjects of the students
								echo '<input type="submit" name="'.$s.'" value="'.$s.'"><br/>';
							}
						?>
                </form>
			</details>
        </li>
    </ul>

<h1 id="back2R" onclick="showColumn()">Back to resources</h1>

<script>
//$("#back2R") is a option for the user to return back to the selection choice
// initially the user did not select so it is hidden
$("#back2R").hide();
</script>

<table align="center" id="content">   
<?php
	//This code of for displaying the content that the user selected
	//The code will execute only if the user selected
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		foreach($_POST as $k=>$v){
		//There's only one subject value that is submitted, we use it to access the table
		//Instead of using "if" statements to check which subject has been clicked
		$_SESSION['subs'] = $_POST[$k];
	}

	//heading for the selected options
	//ie. If user selected Isinebele videos the heading will be "Isindebele videos"
	echo "<caption><h1>".$_SESSION['subs']. " " . $_POST['type']. "s </h1></caption>";
	
	try{
		require '../connect.php';
	
		if($_SERVER['REQUEST_METHOD'] === "POST"){
			
			$subject = $_SESSION['subs'];
			
			$sql = "SELECT * FROM nansidlela.".$subject."uploads WHERE type = '".$_POST['type']."'";	
			//The table name of subjects end with uploads. i.e Maths = maths_uploads	
			
			$stm = $conn->query($sql);
			$stm->execute();
			$result = $stm->fetchALL(PDO::FETCH_ASSOC);
			
			$x = 0; //varible will be used for looping
			
			if(0 < count($result)){
				while($x < count($result)){
					
					echo'<tr>'.
						'<td class="content"><video id="play" width="400" height="400" controls="controls" playsinline>'.
						'<source src="'.$result[$x]['file'].'" type="video/mp4"/>'.
						'</video></td>'.
						'<td><cite> Type: '.$result[$x]['type'].'<br/>'.
						'Uploaded: '.$result[$x]['date'].'<br/>'.
						'Description: '.$result[$x]['description'].'<br/>'.
						'Due Date :'.$result[$x]['due_date'].'</cite></td></tr>';
				$x++;
				
			}
			echo '<script>$("#back2R").show();'. //$("#back2R") is shown sincve the user clicked and redirect to the contents selected
			'$("#columns").hide();'.//Selection menu is hidden
			'$("#content").show();'. //Selected content is shown
			'</script>';
			}
			
			else{
				
				//If the selected subjects has no content this code will execute
				echo '<tr><td><h2 style="color:red">'."No uploads of ".$_SESSION['subs']." ".$_POST['type']."s</h2></td></tr>";
			}
			}
								
	}
	catch(PDOException $e){
		echo "Connection failed: ".$e->getMessage();
	}
		
	}
	
?>
</table>
</body>
<script>
function showColumn(){
	$("#back2R").hide();
			$("#columns").show();
			$("#content").hide();
}
</script>
</html>