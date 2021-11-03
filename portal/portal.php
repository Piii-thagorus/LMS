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

        body{background-image: url("../pics/student1.jpg");
        background-size: cover;
        background-blend-mode: saturation;
        }

        table tr td{padding: 20px 0px 10px 0px;}

           /*Home button*/
        #logout{display: inline;
            padding: 10px 20px 10px 10px;
            border-bottom: 2px solid orange;
            border-top: 2px solid orange;
            border-radius: 400px;
            background: transparent;
            text-align: center;
            color: white;
			cursor: pointer
            }

        #link{ color: white;
            font-size: 20px;
            font-weight: bold;}

        #logout:hover{filter: grayscale(100%);}

         /*Student details*/
         #profile{
         border-bottom: 15px solid #b0e0e6;
         border-top: 15px solid orange;
            border-radius: 80px;}

        table tr td ul{font-style: italic;
        list-style-type: none;
        font-size: 20px;
        color: white;}

        #profile img{border-radius: 100px;}
		
		#edit{width: 100px;
		font-weight: bold;
		background: orange;
		color: white;
		border: 1px solid orange;
		border-radius: 40px;
		cursor: pointer;}
		
		#edit:hover{
			filter: grayscale(100%);
		}

         /*Side menu*/
        #sideline{padding: 0px 0px 20px 100px;
        border-left: none;}
        #sideline tr td a{color: white;}



        .describe {text-align: center;
        font-weight: bold;
             color: white;
             border-radius: 100px;
             font-size: 25px;
             background-color: orange;}

        #academics{text-align: center;}

        #welcome{text-align: center;
        font-size: 40px;
        font-weight: bold;
        color: white;
        }

        /*first column*/
        .subjects{background-color: #b0e0e6;
        border-color: #b0e0e6;
        border-radius: 80px;
        font-weight: bold;
        color: white;}

        .icons{ border: 2px solid #D3D3D3;
        border-radius: 80px;
        }

        .row1{border: 2px solid orange;
        background: orange;
        color: white;
        border-radius: 80px;}

        #grades td{font-weight: bold;
        color: white;
        font-size: 20px;
        min-width: 130px;}

         #grades td a{color: white;}

        #academics td h2{border-bottom: 5px solid #b0e0e6;
        border-right: 5px solid orange;
        border-radius: 80px;
        color:white;}

        a:link{text-decoration: none;}

        #header li{margin-top: 40px;
        margin-right: 50%;
        padding-top: 10px;
        padding-bottom: 10px}

        #time{background: orange;
        border: 2px solid orange;
        border-radius: 40px;
        text-align: center;
        font-family: arial;
        font-weight: bold;
        color: white;}
		
		.row1:not(:first-child):hover{
			filter: grayscale(100%);
		}
		.sideMenu{
			display: block;
		}
		.sideMenu :hover {
			filter:grayscale(100%);
		}

</style>


</head>
<body>
	<?php?//if(!empty($_SESSION['row'])) :?>
    <article>
        <table id="" align="center"  >

            <tr>
                <td>
                    <ul id="header">
                        <li id="logout" onclick="logout()"> Sign out</li>
                        <li id="time"></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td id="welcome" colspan="3">Welcome<?php echo " ".$_SESSION['row']['name']." ". $_SESSION['row']['surname'];
				//endif;?></td>
            </tr>
            <tr id="sl">

                <td colspan="2">
                    <table id="profile">
                        <tr><td><img src="../pics/student.jpg" width="350px" height="350px"></td>
                    <td>
                    <ul>
					<?php
						//Displaying the users information
                        echo "<li>".$_SESSION['row']['name']."</li>";
                        echo "<li>".$_SESSION['row']['surname']."</li>";
                        echo "<li>Grade:".$_SESSION['row']['grade']."</li>";
                       echo "<li>".$_SESSION['row']['identity']."</li>";
					  
					?>
						<li>
							<button id="edit">Edit</button>
						</li>
                    </ul>
                    </td>
					
                    </table>
                </td>
                <td id="menu"><img src="../pics/menu.png" width="50px" height="50px" style="margin-bottom:600%"></td>
                <td rowspan="2">
				<!--This will be the side
				REMINDER: convert the the tr to li
				-->
				
				<ul id="sideline">
						<li class="sideMenu">
						<a href="timetable.php">
						<figure id="timetable">
                        <img src="icons/timetable.png" width="250px" height="150px" class=""/>
                        <figcaption class="describe">TimeTable</figcaption>
						</figure></a></li>
                        
						<li class="sideMenu"><a href="Calendar.php">
						<figure id="calendar">
						<img src="icons/calendar.png" height="150px" width="250px" class="images"/>
                        <figcaption class="describe">Academic calendar</figcaption>
                        </figure></a></li>
						
						<li class="sideMenu"><a href="Study.php">
						<figure>
						<img src="icons/study.png" height="150px" width="250px" class="images"/>
                        <figcaption class="describe">Study resources</figcaption>
						</figure></a></li>
                        
						<li class="sideMenu"><a href="Sports.html">
						<figure>
						<img src="icons/sp.png" width="250px" height="150px" class="images"/>
                        <figcaption class="describe">Sport participation</figcaption>
						</figure></a></li>
                    
					</ul>	
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <table id="academics"> <!--Nested Table-->
                        <tr>
                            <td><h2>Academics</h2></td></tr>
                            <tr id="grades">
                            <td class="row1"> Subjects </td>
                            <td class="row1"><a href="Homework.php" target="_self"> Homework </a></td>
                            <td class="row1"><a href="Assignment.php"> Assignment </a></td>
                            <td class="row1"><a href="Exams.php"> Exam/Test </a></td>
                            <td class="row1"><a href="Results.php"> Results </a></td>
                        <tr>
                            <td class="subjects">IsiNdebele</td>
                            <td class="icons"><img src="../pics/tick.png" width="25px" height="25px"></td>
                            <td class="icons"><img src="../pics/wrong.png" width="25px" height="25px"></td>
                            <td class="icons"><img src="../pics/tick.png" width="25px" height="25px"></td>
                            <td class="icons"><img src="../pics/wrong.png" width="25px" height="25px"></td>
                        </tr>
                        <tr>
                            <td class="subjects">English</td>
                            <td class="icons"><img src="../pics/tick.png" width="25px" height="25px"></td>
                            <td class="icons"><img src="../pics/tick.png" width="25px" height="25px"></td>
                            <td class="icons"><img src="../pics/tick.png" width="25px" height="25px"></td>
                            <td class="icons"><img src="../pics/wrong.png" width="25px" height="25px"></td>

                        </tr>
                        <tr>
                            <td class="subjects">Mathematics</td>
                            <td class="icons"><img src="../pics/tick.png" width="25px" height="25px"></td>
                            <td class="icons"><img src="../pics/tick.png" width="25px" height="25px"></td>
                            <td class="icons"><img src="../pics/tick.png" width="25px" height="25px"></td>
                            <td class="icons"><img src="../pics/tick.png" width="25px" height="25px"></td>

                        </tr>
                        <tr>
                            <td class="subjects">Life Orientation</td>
                            <td class="icons"><img src="../pics/wrong.png" width="25px" height="25px"></td>
                            <td class="icons"><img src="../pics/wrong.png" width="25px" height="25px"></td>
                            <td class="icons"><img src="../pics/tick.png" width="25px" height="25px"></td>
                            <td class="icons"><img src="../pics/wrong.png" width="25px" height="25px"></td>

                        </tr>
                        <tr>
                            <td class="subjects">Physical Sciences</td>
                            <td class="icons"><img src="../pics/tick.png" width="25px" height="25px"></td>
                            <td class="icons"><img src="../pics/wrong.png" width="25px" height="25px"></td>
                            <td class="icons"><img src="../pics/tick.png" width="25px" height="25px"></td>
                            <td class="icons"><img src="../pics/wrong.png" width="25px" height="25px"></td>

                        </tr>
                        <tr>
                            <td class="subjects">Life Sciences</td>
                            <td class="icons"><img src="../pics/wrong.png" width="25px" height="25px"></td>
                            <td class="icons"><img src="../pics/wrong.png" width="25px" height="25px"></td>
                            <td class="icons"><img src="../pics/tick.png" width="25px" height="25px"></td>
                            <td class="icons"><img src="../pics/tick.png" width="25px" height="25px"></td>
                        </tr>
                        <tr>
                            <td class="subjects">Geography</td>
                            <td class="icons"><img src="../pics/wrong.png" width="25px" height="25px"></td>
                            <td class="icons"><img src="../pics/wrong.png" width="25px" height="25px"></td>
                            <td class="icons"><img src="../pics/tick.png" width="25px" height="25px"></td>
                            <td class="icons"><img src="../pics/wrong.png" width="25px" height="25px"></td>
                        </tr>

                </table>

                </td>
            </tr>

        </table>

    </article>

<script>

//hovering of sideline map
var image = $("#sideline .images");
var describe = $("#sideline .describe");

$("#menu").hide();
//media queries
        var main = window.matchMedia("(max-width: 992px)");
        if(main.matches){
            let side =$("#sideline");
            side.hide();
            let icon = $("#menu")
            icon.show();
            icon.click(function(){
                side.fadeToggle(1000);
                });
            icon.mouseenter(function(){
            icon.css("filter", "grayscale(100%)")});
            icon.mouseleave(function(){
            icon.css("filter", "grayscale(0%)")});

        }

for(let x=0; x<describe.length; x++){
if(x%2!=0){
describe.eq(x).css("background", "#b0e0e6");}}

//Displaying date on the portal

function dateDisplay(){

let days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
let months = ["January", "February", "March", "April", "May", "June",
"July", "August", "September", "October", "November", "December"];

let d = new Date();
let weekDay = d.getDate();
let dayOfWeek = days[d.getDay()];
let monthOfYear = months[d.getMonth()];
let year = d.getFullYear();
let fullDate = dayOfWeek +" " + monthOfYear + " " + weekDay + " " + year;
$("#time").html(fullDate);
}
dateDisplay()
setInterval(dateDisplay, 1000);

function logout(){	
	window.location.replace("login/logout.php")
}

</script>
</body>
</html>