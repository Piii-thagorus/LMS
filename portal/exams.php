<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exams/Tests</title>
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

        table td{text-align: center;}

        .describe{border: 1px solid orange;
        font-weight: bold;
        //background: orange;
        border-radius: 100px;
        color: white;
        font-size: 30px;
        cursor: pointer;}


        .image {cursor: pointer;}


        h1{padding: 10px 0px 20px 0px;
        font-size: 60px;
        border-top: 5px solid;
        border-bottom: 5px solid orange;
        border-radius: 40px;
        margin: 0% 25% 0% 25%;
        }

        #subject tr td, #term tr td {
            background: #fbceb1;
            font-weight: bold;
            color: white;
            font-size: 22px;
            cursor: pointer;
            border-radius: 100px;
        }
        
        #subject{margin-bottom: 0%;
        cursor: pointer;}
        
        #subject tr td:hover, #term tr td:hover{
        filter:grayscale(100%);}

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
    <h1 align="center">Exam/Test</h1>

    <main>
        <nav>
            <ul>
                <li><a href="homework.php">Homework</a></li>
                <li><a href="assignment.php">Assigment</a></li>
                <li><a href="results.php">Results</a></li>
                <li><a href="timetable.php">Timetable</a></li>
                <li><a href="calenar.php">Calendar</a></li>
                <li><a href="study.php">Study Lab</a></li>
                <li>Sports</li>
            </ul>
        </nav>
        <div>
            <table >
                <tr>
                    <td><img src="icons/exam.png" width="300px" height="300px" class="image" onclick="sld1()"></td>
                    <td rowspan="2" id="display1" width="500px">
                        <table width="100%" id="subject">
                            <tr><td>Isindebele</td></tr> 
                            <tr><td>English</td></tr>
                            <tr><td>Mathematics</td></tr>
                            <tr><td>Life Orientation</td></tr>
                            <tr><td>Physical Science</td></tr>
                            <tr><td>Life Sciences</td></tr>
                            <tr><td>Geography</td></tr>
                        </table>
                    </td>
                </tr>
                <tr> <td align="center" class="describe" onclick="sld1()">Exams/Test</td>   </tr>
                <tr>
                    <td><img src="icons/timet.png" width="300px" height="300px" class="image" onclick="sld2()"></td>
                    <td rowspan="2" id="display2" width="500px">
                        <table width="100%" id="term">
                            <tr><td>Term 1</td></tr>
                            <tr><td>Term 2</td></tr>
                            <tr><td>Term 3</td></tr>
                            <tr><td>Term 4</td></tr>
                        </table>
                    </td>
                </tr>
                <tr><td align="center" class="describe" onclick="sld2()">Exam/Test Timetable</td></tr>
            </table>
        
        </div>
    </main>
    <script>

        //making cells of both tables equally aligned
        var sub = $("#subject tr td").length;
        var term = $("#term tr td").length;

        if (term > sub) {
            let diff = term - sub;
            let v = diff * 10;
            $("#subject").css("margin-bottom", v.toString() + "%");
        }
        else {
            let diff = sub - term;
            let v = diff * 10;
            $("#term").css("margin-bottom", v.toString() + "%");
        }
        //hide effects
        $("#subject").hide();
        $("#term").hide();

        
        function sld1() {
            $("#subject").fadeToggle(1000);
        }

        
        function sld2() {
            $("#term").fadeToggle(1000);     
        }

        //hovering of sideline map
        var im = $(".image");
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


    </script>

</body>

</html>