
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Personal details</title>
    <script src="jquery-3.5.1.js"></script>
    <style>

    body { 
		background-image: url("../pics/b.jpg"); 
        background-size: 100%;  
    }

    ::placeholder{
		color: white;
		}

    body{
		text-align: center;
       }

    a:link{
		text-decoration: none;
		}

    .hor a{
		color: orange;
		}

    h1{
		color: white;
		}

    .hor ul li{
		display: inline-block;
        padding: 50px;
        border-bottom: 2px solid orange;
        border-radius: 100px;           
        color: orange;
        font-size: 20px;
        font-weight: bold;
          }

      
    input[type=text],
    input[type=date],
    input[type=password],
    input[type=email],
    select{
		width: 70%;
		padding: 15px;
		border:none;
		border-bottom: 5px solid #b0e0e6;
		border-radius: 50px;
		margin: 5px 0px 22px 0px;
		display: inline-block;
		word-wrap: break-word;
		background: transparent;
		}

      
    button{
		background-color: orange;
		color: white;
		border: 1px solid orange;
		border-radius: 100px;
		width: 50%;
		padding: 16px 20px;
		margin: 8px 0px;
		cursor: pointer;
		font-weight: bold;
		  }
      
	 

    button:hover{
		filter: grayscale(100%);
	  }

    input[type=text],
    input[type=select]{
		text-transform: capitalize
       }

    input[type=text]:focus,
    input[type=number]:focus,
    input[type=password]:focus,
    input[type=email]:focus,
    select:focus{
		border: none;
		border-bottom:5px solid;
		border-top: 5px solid;
		}

	form{
        padding-right: 25%;
        padding-left: 25%;
        }

        label{font-weight: bold;
        color:white;}

        fieldset{
        border: none;
        border-left: 5px solid #b0e0e6;
        border-right: 5px solid #b0e0e6;
        border-radius: 100px;}
		
		.hor > ul > a:not(:first-child):hover{
			filter: grayscale(100%);
		}
		.hor > ul > a:not(:first-child):hover{
			cursor: pointer;
		}
		input[required=required] ~ label::after{
			content: "*";
			color: red
		}
		
		select[required=required] ~ label::after{
			content: "*";
			color: red
		}
    </style>

</head>
<body>

  <nav class="hor">
  <ul>
      <li><img src="../pics/logo.png" width="100px" height="100px"></li>
      <a href="../menu/main.html"><li>Home</li></a>
      <a href="../menu/about.html"><li>About</li></a>
      <a href="../menu/log in.html"><li>Log In</li></a>
  </ul>
</nav>
<br/>

  <form id="form" method="post" action="medical.php">
      <fieldset>
          <legend>
              <h1 align="center">Personal Details, Contact & Address</h1>
              <br/>
              <small style="color: red">A red star means the field is compulsory *</small>
          </legend>

          <label for="firstname">First name.</label>
          <br/>
          <input type="text" name="firstName" placeholder="Enter your first name" id="firstname" required="required"
                 pattern="[a-zA-Z]+" oninvalid="setCustomValidity('Text only and don\'t leave blank')" autofocus="autofocus">
			<br/>
          <label for="middle name">Middle name/s.</label>
          <br/>
          <input type="text" name="middleName" placeholder="Enter your Middle name" id="middle name" pattern="[a-zA-Z]+" oninvalid="setCustomValidity('Text only')">
          <br/>
          <label for="surname">Surname.</label>
          <br/>
          <input type="text" placeholder="Enter surname" name="surname" id="surname" required="required"
		  pattern="[a-zA-Z]+" oninvalid="setCustomValidity('Text only and don\'t leave blank')">
          <br/>
          <label for="gender">Gender</label>
          <br/>
          <select id="gender" name="gender" required="required">
              <option value="default" selected>Please select your gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
          </select>
          <br/>
          <label for="dob">When were you born?</label>
          <br/>
          <input type="date" id="dob" name="DOB" required="required">
          <br/>
          <label  for="nationality"><b>Are you South African?</b></label>
          <br/>
          <select name="southAfrican" id="nationality" required="required" onmouseleave="specifyNation()">
              <option value="default" selected>Please select if you South African or not</option>
              <option value="Yes" >Yes</option>
              <option value="No">No</option>
          </select>
          <br/>
			<label  class="foreign" for="nation"> What is your nationality </label>
			<br/>
			<input pattern="[a-zA-Z]+" oninvalid="setCustomValidity(\'Only alphabets are allowed\')" disabled class="foreign" 
			type="text" name="nationality" id="nation" required="required"placeholder="Type in your nationality" >
			<br class="foreign"/>
          <label for="identity">ID No. </label>
          <br/>
          <input type="text" name="identity" placeholder="Enter your ID number" id="identity"
                 required="required" size="13">
          <br/>
          <label for="hl">Home Language</label>
          <br/>
          <select id="hl" name="homeLanguage" required="required">
              <option selected="selected">Select your home language</option>
              <option value="English">English</option>
              <option value="Afrikaans">Afrikaans</option>
              <option value="Isindebele">Isindebele</option>
              <option value="Northern sotho">Northern Sotho/Sepedi</option>
              <option value="Southern sotht">Southern Sotho</option>
              <option value="isiZulu">IsiZulu</option>
              <option value="isiXhosa">IsiXhosa</option>
              <option value="Swati">IsiSwati</option>
              <option value="Venda">Venda</option>
              <option value="seTswana">SeTswana</option>
              <option value="Tsonga">Tsonga</option>
              <option value="Other">Other</option>
          </select>
          <br/>
          <label for="email">Email address.</label>
          <br/>
          <input type="email" name="email" placeholder="Enter email address" id="email" required="required">
          <br/>
          <label for="numbers">Cell phone numbers.</label>
          <br/>
          <input type="text" name="cell" placeholder="Enter your cell phone number" id="numbers" required="required">
          <br/>
          <label for="guardian">Who is your guardian at home?</label>
          <br/>
          <select name="guardian" id="guardian" required="required" onmouseleave="specifyCustody()">
              <option selected="selected">Select who you stay with at home</option>
              <option value="Parents">Both parents</option>
              <option value="Mother">Mother</option>
              <option value="Father">Father</option>
              <option value="Grandparents">Grandparents</option>
              <option value="Grandmother">Grandmother</option>
              <option value="Grandfather">Grandfather</option>
              <option value="Other">Other</option>
          </select>
          <br/>
          <section class="custodian">
          <!--If the user selects "other" for the option above, javascript will insert a html field asking the user to be specific-->
		  <label for="specifyGuardian">Specify your guardian at home</label>
			<br/>
			<input disabled pattern="[a-zA-Z]+" oninvalid="setCustomValidity(\'Only alphabets are allowed\')" 
			type="text" name="otherGuardian" id="specifyGuardian" required="required" placeholder="Specify your guardian at home" >
			<br/>
          </section>
          <label for="address">Physical Address.</label>
          <br/>
          <input pattern="[a-zA-Z]+" oninvalid="setCustomValidity('Text only and don\'t leave blank')" type="text" placeholder="City/Town" name="city/town" id="address" required="required">
          <br/>
          <input pattern="[a-zA-Z]+" oninvalid="setCustomValidity('Text only and don\'t leave blank')" type="text" placeholder="Village/Suburb" name="suburb/village">
          <input type="text" placeholder="Section/Street" name="section/street">
          <input type="text" placeholder="Stand No." name="stand">
          <input type="text" placeholder="Postal address" name="postalAddress">
          <br/>
          <label for="disability">Do you have any disabilities? </label>
          <br/>
          <select  id="disability" name="disability" required="required" onmouseleave="specifyDisability()">
              <option value="selection" selected>Please select if you have any disabilities or not</option>
              <option value="Yes">Yes</option>
              <option value="No">No</option>
          </select>
          <br/>
         <section class="disabled">
        <!--If the user selects "yes" for the option above, javascript will insert a html field asking the user to be specific-->
		<label for="disable">What is your disability?</label>
		<br/>
		<input pattern="[a-zA-Z]+" oninvalid="setCustomValidity(\'Only alphabets are allowed\')"
		type="text" id="disable" name="disabilityType" required="required" placeholder="Type of disability">
        </section>
      </fieldset>
      <button id="proceed">Proceed</button>
  </form>



</body>
<script>

//If not a south african show text field for nationality 
$(".foreign").hide(); //When the web loads this should be hidden since no selection has been made yet
function specifyNation(){
   try{
		let nation = $("#nationality");
		
		if(nation.val()=="No"){
			
			//When the user is not south african this block will execute
			//This field will require the user to specify their nationality
			
			$("#nation").removeAttr("disabled");
			$(".foreign").show();
		} 
		
		else {
			
			$(".foreign").attr("disabled", "disabled");
			$(".foreign").hide();
		}
	}
	catch(err){
		console.log(err.message);
	}
}

//If selected option for guardian is "other" then show specify field 
$(".custodian").hide();//When the web loads this should be hidden since no selection has been made yet
function specifyCustody(){
	try{
		var custody = $("#guardian");
		if(custody.val() == "Other"){
			
			//This line executes when the users selects "other"
			//This field will appear asking the user to specify the guardian
			
			$("#specifyGuardian").removeAttr("disabled"); 
			$(".custodian").show();
		}
		else{ 
			$(".custodian").hide();
			$("#specifyGuardian").attr("disabled", "disabled")
		}
	}
	catch(err){
		console.log(err.message)
	} 
}

//If disabled show text field disability specification
$(".disabled").hide();	//When the web loads this should be hidden since no selection has been made yet
function specifyDisability(){
	try{
		let disability = $("#disability");
		if(disability.val()=="Yes"){
			
			//This block executes when the user has a disability
			//This field will ask the user to specify their disability
			
			$("#disbale").removeAttr("disabled");
			$(".disabled").show();
		}
		else{
			$(".disabled").hide();
			$("#disable").attr("disabled", "disabled");
		}
	}
	catch(err){
		console.log(err.message)
	}      
}

function validating(){
	try{
		
		var phone = new RegExp('^0[0-9].*$').test($("#numbers").val());
		var identity = new RegExp('^\d+$');
		
		if(!phone){
			alert("Invalid phone numbers");
			$('#form').submit(function(e){
			e.preventDefault();
			})
		}
	}
	catch(err){
		console.log(err.message)
	}
}


</script>
</html>
