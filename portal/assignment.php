<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assignment</title>
     <script src="jquery-3.5.1.js"></script>
	 <link href="../JsScheduler/Themes/peach.css" rel="stylesheet"/>
    <link href="portal.html" rel="import" id="im">
    <style>

        body {
            background-image: url("../pics/student1.jpg");
            background-size: 50%;
            color: white;
        }

        main {
            padding-top: 50px;
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        nav {
            margin-right: 15%;
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
     

        .describe {
            border: 1px solid orange;
            background: orange;
            border-radius: 100px;
            font-weight: bold;
            color: white;
            text-align: center;
            cursor: pointer;
        }

        #heading td{font-weight: bold;
        font-size: 30px;
        background: #b0e0e6;
        border: 1px solid #b0e0e6;
        border-radius: 40px;
        color: white;}

        .image img{border: 1px solid #b0e0e6;
        border-radius: 40px;
        cursor:pointer;}

        #calendar{border: 1px solid white;
        border-radius: 40px;}

        #back {
            font-weight: bold;
            border-radius: 100px;
            font-size: 22px;
            margin-right: 85%;
            background: orange;
            text-align: center;
        }
        
         a:link{text-decoration: none;}
        
         #back a {color: white;}
        
         #back:hover{filter: grayscale(100%);}
    </style>

</head>

<body>
    <div id="back"><a href="portal.php">Back to Portal</a> </div>

    <h1 align="center">New Assignments: 2</h1>
    <main>
        <nav>
            <ul>
                <li><a href="homework.php">Homework</a></li>
                <li><a href="results.php">Results</a></li>
                <li><a href="exams.php">Exams</a></li>
                <li><a href="timetable.php">Timetable</a></li>
                <li><a href="calendar.php">Calendar</a></li>
                <li><a href="study.php">Study Lab</a></li>
                <li>Sports</li>
            </ul>
        </nav>
        <div>
            <table align="center" cellspacing="3">
                <tr id="heading">
                    <td align="center">Subjects</td>
                    <td align="center" colspan="4">Calendar</td>
                </tr>
                <tr>
                    <td class="image"><img src="icons/al.png" width="150px" height="150px" onclick="hw();"></td>
                    <td rowspan="4" colspan="4" align="center" id="calendar" style="position:absolute; height: 55%; width: 60%" cellspacing="10px">
                        
                    </td>
                </tr>
                <tr>
                    <td class="describe">Isindebele</td>
                </tr>
                <tr>
                    <td class="image"><img src="icons/eng.png" width="150px" height="150px" onclick="hw();"></td>
                </tr>
                <tr>
                    <td class="describe">English</td>
                </tr>


                <tr>
                    <td class="image"><img src="icons/lo.png" width="150px" height="150px"></td>
                    <td class="image"><img src="icons/math.png" width="150px" height="150px"></td>
                    <td class="image"><img src="icons/ls.png" width="150px" height="150px"></td>
                    <td class="image"><img src="icons/ps.png" width="150px" height="150px"></td>
                    <td class="image"><img src="icons/geo.png" width="150px" height="150px"></td>
                </tr>
                <tr>
                    <td class="describe">Life Orientation</td>
                    <td class="describe">Mathematics</td>
                    <td class="describe">Life Science</td>
                    <td class="describe">Physics</td>
                    <td class="describe">Geography</td>
                </tr>

            </table>
        </div>
    </main>
	<script src="../JsScheduler/MindFusion.Scheduling.js" type="text/javascript"></script>
    <script>

        function hw() {
            var head = $("#heading td");
            var im = $(".image img");
            var des = $(".describe");
            var x = 0;

            alert($(this).attr("src"));

        }

        //hovering of sideline map
        var im = $(".image img");
        var des = $(".describe");

        for (let x = 0; x < im.length; x++) {
            im.eq(x).mouseenter(function () {
                $(this).css("filter", "grayscale(100%)");
                des.eq(x).css("filter", "grayscale(100%)");
            });
            im.eq(x).mouseleave(function () {
                $(this).css("filter", "grayscale(0%)");
                des.eq(x).css("filter", "grayscale(0%)");
            });
        }

        for (let x = 0; x < im.length; x++) {
            des.eq(x).mouseenter(function () {
                $(this).css("filter", "grayscale(100%)");
                im.eq(x).css("filter", "grayscale(100%)");
            });
            des.eq(x).mouseleave(function () {
                $(this).css("filter", "grayscale(0%)");
                im.eq(x).css("filter", "grayscale(0%)");
            });
        }
	
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
</body>


</html>