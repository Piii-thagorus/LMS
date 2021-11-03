<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calendar</title>
	<link href="../JsScheduler/Themes/peach.css" rel="stylesheet"/>
	<style>
		body{background-image: url("../pics/student1.jpg");
        background-size: 100%;
		text-align: center;
		color: white}
		
		 main {
            padding-top: 10px;
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        nav {
            margin-right: 10%;
        }

            nav ul li {
                list-style-type: none;
                font-weight: bold;
                margin: 12px 0px 10px 0px;
                padding: 10px 0px 10px 0px;
                text-align: center;
                border: 2px solid orange;
                border-radius: 100px;
                cursor: pointer;
            }

                nav ul li a {
                    text-decoration: none;
                    color: white;
                }

                nav ul li:hover {
                    filter: grayscale(100%);
                }
		
		#calendar{
			position: absolute;
			margin-left: 15%;
			//margin-right: 15%;
			height: 60%;
			width: 60%;
			align-items: center;
		}
		
		        #back {
            font-weight: bold;
            font-size: 22px;
            margin-right: 85%;
            background: orange;
            text-align: center;
            border-radius: 100px;
        }
        
         a:link{text-decoration: none;}
        
         #back a {color: white;}
        
         #back:hover{filter: grayscale(100%);}
	</style>
	
</head>
<body>
	<div id="back"><a href="portal.php">Back to Portal</a> </div>
	<?php echo "<h1> Grade " . $_SESSION['row']['grade'] . " academic calendar</h1>"; ?>
	<main>
	<nav>
        <ul>
            <li><a href="results.html">Results</a></li>
            <li><a href="assignment.html">Assigment</a></li>
            <li><a href="exams.html">Exams</a></li>
            <li><a href="timetable.html">Timetable</a></li>
            <li>Calendar</li>
            <li><a href="study.html">Study Lab</a></li>
            <li>Sports</li>
        </ul>
    </nav>
	<div id="calendar" height="500px"></div>
	
	</main>
</body>
<script src="../JsScheduler/MindFusion.Scheduling.js" type="text/javascript"></script>
<script>

var p = MindFusion.Scheduling;

//create new calendar instance/object
var calendar = new p.Calendar(document.getElementById("calendar"));
calendar.currentView = p.CalendarView.SingleMonth; //specify the view of the calendar
calendar.theme = "peach"; //Theme of the calendar
calendar.selectionEnd.addEventListener(handleSelection);

function handleSelection(render, args){
	
	if(render.CurrentView === p.CalendarView.SingleMonth){
		
		args.cancel = true;
		var start = args.startTime;
		var end = args.endTime;
		
		render.timetableSettings.dates.clear();
		
		while(start < end){
			render.timetableSettings.dates.add(start);
			start = p.DateTime.addDays(start, 1);
		}
		
		render.CurrentView = p.CalendarView.Timetable;
	}
}


//Display calendar
calendar.render();

</script>
</html>