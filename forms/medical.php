<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Medical information</title>
    <script src="jquery-3.5.1.js"></script>
    <style>
        body{text-align: center;
        background-image: url("../pics/med1.jpg");
        background-size: 100%;}

         fieldset{
        border: none;
        border-left: 5px solid #b0e0e6;
        border-right: 5px solid orange;
        border-radius: 100px;}

        h1{color: white}
          
      label{font-weight: bold;
      font-size: 20px;
      color: white;}

      ::placeholder{color: white;}
      
     select {color: orange;
     background-color: red;}
      
      input[type=tel]:focus,
      input[type=text]:focus,
      input[type=number]:focus,
      input[type=password]:focus,
      input[type=email]:focus,
      select:focus
      {border: none;
      border-bottom:5px solid;
      border-top: 5px solid;
      color: orange}

      /*Input fields*/
      input[type=tel],
      input[type=text],
      input[type=date],
      input[type=password],
      input[type=email],
      select
      {width: 70%;
      padding: 15px;
      border:none;
      border-top: 5px solid orange;
      border-bottom: 5px solid #b0e0e6;
      border-radius: 50px;
      margin: 5px 0px 22px 0px;
      display: inline-block;
      word-wrap: break-word;
      background: transparent;
      color: orange}

      form{margin-left: 25%;
      margin-right: 25%;}

      #specsForDr{border: 2px solid black}

      button{width:25%;
      background: orange;
      font-weight: bold;
      font-size: 25px;
      border: 1px solid orange;
      border-radius: 100px;
      color:white;
      cursor: pointer;}

      button:hover{
      filter: grayscale(100%);
      }

       input[type=text]{
       text-transform: capitalize
       }

        legend {
            text-align: center;
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
<form action="guardian.php" method="post">
    <fieldset>
        <legend>
            <h1 align="center">Medical Information</h1>
            <small style="color: red">A red star means the field is compulsory *</small>
        </legend>
        <label for="chronic">Do you suffer from ongoing sickness? e.g. Asthma</label>
        <br/>
        <select name="Chronic Illness" id="chronic" required="required" autofocus="autofocus" onmouseleave="illness()">
            <option value="" selected="selected">Select if you suffer from chronic illness</option>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
        </select>
        <section class="sick">
            <!--This field will not be visible unless the user suffer from chronic sickness,
			this field will be visible asking the user to be specific-->
			<br/>
            <label for= "chronicSpecs" > Specify your chronic sickness</label >
            <br />
            <input disabled type="text" name="ChronicType" id="chronicSpecs" required="required" placeholder="Specify your chronic sickness">
        </section>
        <br/>
        <label for="consult">Do you have to see a doctor/medical specialist on regular basis?</label>
        <br/>
        <select name="Consultation" id="consult" required="required" onmouseleave="consulting()">
            <option value="" selected="selected">Select if you have to consult on a regular basis</option>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
        </select>
        <section class="consultation">
            <!--This field will not be visible unless the user has to consult a doctor on a regular
			this field will be visible asking the user to be specific-->
			<br/> 
            <label for= "consultSpecs" > How often do you need to see a doctor/medical specialist ?</label > 
            <br /> 
            <select id="consultSpecs" name="Consultation period" disabled>
                <option selected="selected"></option>
                <option value="Weekly">Weekly</option>
                <option value="Monthly">Monthly</option>
                <option value="Every 3 months">Every 3 months</option>
                <option value="Every 6 months">Every 6 months</option>
                <option value="Yearly">Yearly</option>
                <option value="Other">Other</option>
            </select> 
        </section>
        <br/>
        <label for="specialist">Do you have a specific doctor/medical specialist</label>
        <br/>
        <select name="Doctor" id="specialist" required="required" onmouseleave="doc()">
            <option value="" selected="selected">Select if you have a medical specialist</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
        <br/>
        <section class="DrSpecs">
            <!--If the user selects "yes" for the option above, javascript will insert a html field asking the user to be specific-->
			  <br/>
                <fieldset id="specsForDr" disabled="disabled">
                    <legend style="font-weight: bold; color:white"> Doctor/Specialist Details </legend>
                        <label for="fullNames">Enter full names including surname of your Doctor/Specialist</label>
                        <br />
                        <input type="text" name="Dr names" id="fullNames" required="required" placeholder="Enter full names">
                        <br />
                        <label for="cellphone">Cellphone number</label>
                        <br />
                        <input name="Dr cell" id="cellphone" type="tel" required="required" placeholder="Enter cellphone number">
                        <br />
                        <label for="telephone">Telephone number</label>
                        <br />
                        <input type="tel" name="Dr tel" id="telephone"  placeholder="Enter telephone number">
                        <br />
                        <label for="emailAddress">Email</label>
                        <br />
                        <input type="email" name="Dr email" id="emailAddress" placeholder="Enter email">
                        <br /> 
                        <label for="address">Physical Address.</label>
                        <br /> 
                        <input type="text" placeholder="Town" name="City/Town" id="address" required="required">
                        <br /> 
                        <input type="text" placeholder="Village/Suburb" name="Suburb/Village" required="required">
                        <br />
                        <input type="text" placeholder="Section/Street" name="Section/Street">
                        <br />
                        <input type="text" placeholder="Stand No." name="Stand" required="required">
                        <br /> 
                        <input type="text" placeholder="Postal address" name="Postal address" required="required"> 
                    </fieldset>
                   <br />
        </section>
        <br/>
        <button>Proceed</button>
    </fieldset>
</form>

<script>

//If the user has chronic illness, a field to specify the illnes should occur
$(".sick").hide(); //Initially this should be hidden since there's no selection made
function illness() {

try{
	let chronic = $("#chronic");
    if (chronic.val() == "Yes") {
		
		//This block executes if the user has chronic illness
		//This field will show, asking the user to specify the chronic illness
		
		$("#chronicSpecs").removeAttr("disabled");
		$(".sick").show(); 
    }
    else {
        $(".sick").hide();
		$("#chronicSpecs").attr("disabled", "disabled");
    }    
}
catch(err){
	console.log(err.message);
}

}

//If the user has to consult on a regular basis, a consultation period field should appear
$(".consultation").hide();	//Initially this is hidden since no slection has been made;
function consulting() {
try{
	let consult = $("#consult");
    if (consult.val() == "Yes") {
        //This block executes when the user has to consult a specialist on a regular
		//A field will appear asking the user how often they will consult
		
		$("#consultSpecs").removeAttr("disabled")
        $(".consultation").show();
    }
    else{
		$("#consultSpecs").attr("disabled", "disabled")
        $(".consultation").hide();
    }
}
catch(err){
	console.log(err.message);
}	
}
//This function will execute if a user has a dedicated health specialist
$(".DrSpecs").hide(); //This is hidden initiall since there is no selection made
function doc() {
try{
	let specialits = $("#specialist");
    if (specialits.val() == "Yes") {
		
		//If the user has a dedicated health specialist this block will execute
		//The field will show and ask the user to fill in the details of the specialist
		
        $("#specsForDr").removeAttr("disabled")
        $(".DrSpecs").show();
        
		}
    else{
		$("#specsForDr").attr("disabled", "disabled")
        $(".DrSpecs").hide();
    }
}
catch(err){
	console.log(err.message);
}
}

  <?php
	
	//Collection information from the personal details form
	//Making it available to every form
	
	$_SESSION['personal'] = $_POST;

  ?>

</script>
</body>
</html>