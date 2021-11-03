<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>TimeTable</title>

    <script src="jquery-3.5.1.js"></script>


    <style>

        body {
            background-image: url("../pics/student1.jpg");
            background-size: 50%;
            color: white;
        }

        main {
            padding-top: 10px;
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


    table{text-align: center;}

    #days td{font-weight: bold;
    font-size: 20px;
    color: white;
    border: 1px solid #b0e0e6;
    border-radius: 30px;
    background: #b0e0e6;
    }

    #heading td{font-size: 25px;
    border-bottom: 5px solid orange;
    }
    #p2 td, #p4 td, #p5 td, #p7 td{
    border: 1px solid #b0e0e6;
    border-radius: 40px;
    }

    #p1 td, #p3 td, #break td, #p6 td{
    border: 1px solid orange;
    border-radius: 40px;}

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

    #linkAndDate{list-style-type: none;}

    a:link{text-decoration: none;}

        #linkAndDate li{
        }

        #time{background: orange;
        border: 2px solid orange;
        border-radius: 40px;
        text-align: center;
        font-family: arial;
        font-weight: bold;
        color: white;
        margin-top: 20px;
        margin-right: 80%;}

</style>

</head>

<body>

    <ul id="linkAndDate">
        <li id="back"><a href="portal.php">Back to Portal</a> </li>
        <li id="time"></li>
    </ul>

    <?php	echo '<h1 align="center"> Grade '. $_SESSION['row']['grade'] .' Academic timetable</h1>'; ?>
    <main>
        <nav>
            <ul>
                <li><a href="homework.php">Homework</a></li>
                <li><a href="assignment.php">Assigment</a></li>
                <li><a href="exams.php">Exams</a></li>
                <li><a href="results.php">Results</a></li>
                <li><a href="calendar.php">Calendar</a></li>
                <li><a href="study.php">Study Lab</a></li>
                <li>Sports</li>
            </ul>
        </nav>
        <div>

            <table align="center" cellspacing="10">
                <tr id="heading">
                    <?php echo '<td colspan="7">Academic timetable for '.$_SESSION['row']['name'].' ' .$_SESSION['row']['surname'] .': '.$_SESSION['row']['grade'].'</td>';?>
                </tr>
                <tr id="days">
                    <td class="no">No.</td>
                    <td class="time">Time</td>
                    <td class="mon">Monday</td>
                    <td class="tue">Tuesday</td>
                    <td class="wed">Wednesday</td>
                    <td class="thur">Thursday</td>
                    <td class="fri">Friday</td>
                </tr>
                <tr id="p1">
                    <td class="no">1</td>
                    <td class="time">08:10</td>
                    <td class="mon">English</td>
                    <td class="tue">Isindebele</td>
                    <td class="wed">Isindebele</td>
                    <td class="thur">LO</td>
                    <td class="fri">Maths</td>
                </tr>
                <tr id="p2">
                    <td class="no">2</td>
                    <td class="time">09:00</td>
                    <td class="mon">Physics</td>
                    <td class="tue">Life Science</td>
                    <td class="wed">Geography</td>
                    <td class="thur">English</td>
                    <td class="fri">Maths</td>
                </tr>
                <tr id="p3">
                    <td class="no">3</td>
                    <td class="time">09:50</td>
                    <td class="mon">English</td>
                    <td class="tue">LO</td>
                    <td class="wed">Isindebele</td>
                    <td class="thur">Geography</td>
                    <td class="fri">Geography</td>
                </tr>
                <tr id="p4">
                    <td class="no">4</td>
                    <td class="time">10:40</td>
                    <td class="mon">Geography</td>
                    <td class="tue">Physics</td>
                    <td class="wed">Geography</td>
                    <td class="thur">Life Science</td>
                    <td class="fri">Isindebele</td>
                </tr>
                <tr id="break">
                    <td class="no">5</td>
                    <td class="time">11:30</td>
                    <td colspan="5">Break</td>
                </tr>
                <tr id="p5">
                    <td class="no">6</td>
                    <td class="time">12:20</td>
                    <td class="mon">Physics</td>
                    <td class="tue">Life science</td>
                    <td class="wed">English</td>
                    <td class="thur">Isindebele</td>
                    <td class="fri">LO</td>
                </tr>
                <tr id="p6">
                    <td class="no">7</td>
                    <td class="time">13:10</td>
                    <td class="mon">LO</td>
                    <td class="tue">Physics</td>
                    <td class="wed">Maths</td>
                    <td class="thur">Isindebele</td>
                    <td class="fri">English</td>
                </tr>
                <tr id="p7">
                    <td class="no">8</td>
                    <td class="time">14:00</td>
                    <td class="mon">Life Science</td>
                    <td class="tue">Maths</td>
                    <td class="wed">Physics</td>
                    <td class="thur">Physics</td>
                    <td class="fri">English</td>
                </tr>
            </table>
        </div>
    </main>


    <script>
        var date = new Date();
        var num = date.getDay();
        var daysList = ["mon", "tue", "wed", "thur", "fri", " "]
        var heading = $("#heading td")
        var breakTime = $("#break td")
        var day = $("tr td");
        day.css("filter", "grayscale(100%)");

        for (let i = 0; i < day.length; i++) {

            //First two columns should have no gray filter
            if (day.eq(i).attr("class") == "no" || day.eq(i).attr("class") == "time") {
                let bg = day.eq(i).css("border-color");
                day.eq(i).css({ "filter": "grayscale(0%)" });
            }
            if (day.eq(i).attr("class") == daysList[num - 1]) {
                let bg = day.eq(i).css("border-color");
                day.eq(i).css({ "filter": "grayscale(0%)", "background": bg, "color": "white" });
            }
        }

        heading.css("filter", "grayscale(0%)"); //First row has no filter
        let bg = breakTime.css("border-color");
        //break section takes no filter
        breakTime.eq(2).css({ "filter": "grayscale(0%)", "background": bg, "color": "white" });

        function dateDisplay() {
            let days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
            let months = ["January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"];
            let d = new Date();
            let weekDay = d.getDate();
            let dayOfWeek = days[d.getDay()];
            let monthOfYear = months[d.getMonth()];
            let year = d.getFullYear();
            let fullDate = dayOfWeek + " " + monthOfYear + " " + weekDay + " " + year;
            $("#time").html(fullDate);
        }
        dateDisplay()
        setInterval(dateDisplay, 1000);
    </script>
</body>
</html>