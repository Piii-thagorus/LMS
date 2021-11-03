<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log in</title>
    <script src="jquery-3.5.1.js"></script>
    <style>

        body {
            background-image: url("../pics/loginbg.jpg");
            background-size: 100%;
        }


         a:link{text-decoration: none;}
        #hor a{color: orange;}

        /*Horizontal menu start*/
        #hor li{text-align:center;
            display: inline-block;
            padding: 40px;
            border-bottom: 1px solid orange;
            border-radius: 400px;
            
            color: orange;
            font-size: 20px;
            font-weight: bold;
            text-shadow: -1px -1px 0 orange,
                       -1px -1px 0 orange,
                       -1px -1px 0 orange,
                       -1px -1px 0 orange;
            min-width: 100px;
            }

         /*Main font*/
        h1{
        font-size: 50px;
        color: #b0e0e6;
       }



      /*Input layout*/
      input[type=text],
      input[type=password]{width: 200%;
      
      padding: 15px;
      margin: 5px 0px 22px 0px;
      display: inline-block;
      word-wrap: break-word;
        border:none;
      border-radius: 60px;
      //border-top: 5px solid #b0e0e6;
      border-bottom: 5px solid orange;
      background: transparent;}

      /*Submit button decoration*/
      #submit{background-color: orange;
      color: white;
      border: 2px solid orange;
      border-radius: 40px;
      width: 200%;
      padding: 16px 20px;
      margin: 8px 0px;
      cursor: pointer;
      font-weight: bold;}
      label{font-weight: bold;
      opacity: 0.9}

      #submit:hover{filter: grayscale(100%);}

      table h1{text-align: center;}
        table {padding-left: 20px;
        }
       
        main{margin-right:%;
             border-bottom: 5px solid orange;
             border-left: 5px solid #b0e0e6;
             border-radius: 60px;}

    input[type=text]:focus,
      input[type=password]:focus
      {border: none;
      border-bottom:5px solid;
      border-top: 5px solid}

    </style>
</head>
<body>

	
    <ul id="hor">
        <li><img src="../pics/logo.png" width="100px" height="100px"></li>
        <li><a href="main.html"> Home </a></li>
        <li><a href="../forms/welcome.php">Register</a></li>
        <li><a href="About.html">About</a></li>
    </ul>

    <h1>Welcome to Nansidlela School</h1>
	<?php
		
		/*	$_SESSION['error'] is set at dbconn.php
			it is returned when dbconn.php is done processing the user credentials	*/
		 
		 if(isset($_SESSION['error'])){
			
			//Initiall $_SESSION['error' is empty], so no error message will be show
			//If $_SESSION['error'] is set then the user entered invalid credentials
			

			echo  '<h4 style="color:red">Incorrect username or password!</h4>';
			$_SESSION['error'] = null;
		 }
	?>

 <main>
     <table>
         <tr>
             <td align="center">
                 <form method="post" action="../portal/login/dbconn.php" target="_blank">
                     <div class="container">
                         <label style="color: orange" for="Username">Username</label>
                         
                         <input type="text" name="Username" placeholder="Enter your username" id="username" required="required" autofocus="autofocus">
                         <br />
                         <label style="color: orange;" for="Password">Password</label>
                         <input type="password" name="Password" placeholder="Enter your password" id="password" required="required"><br />
                         <br />
                         <input id="submit" onsubmit="relocate()" type="submit" value="LogIn">

                 </form>
             </td>
         </tr>
     </table>
        
</main>

    <script>
        function to_portal() {
            var page = getElementsByTagName("html");
            page.innerHTML = "portal.html";
        }

        //hovering of menu
        var menu = $("#hor li");
        for (let x = 1; x < menu.length; x++) {
            menu.eq(x).mouseenter(function () {
                $(this).css("filter", "grayscale(100%)");
            }
            );
            menu.eq(x).mouseleave(function () {
                $(this).css("filter", "grayscale(0%)");
            }
            );
        }
		
		function relocate(){
			window.location.replace('../portal/login/dbconn.php')
		}
    </script>
</body>
</html>