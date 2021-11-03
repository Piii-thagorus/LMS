<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Education details</title>
    <script src="jquery-3.5.1.js"></script>
    <style>
        
        body{text-align: center;
        background-image: url("../pics/s1.jpg");
        background-size: 100%;
        }

          form{
        padding-right: 25%;
        padding-left: 25%;
        }

        h1{color: white;}

        label{font-weight: bold;
        color: white;
        font-size: 20px;}

        ::placeholder{color: white;}

        table tr td{
        border: 1px solid;
        width: 50%;
        background: #fbceb1;
        font-weight: bold;
        color: white;
        font-size: 22px;
        }

	#chosen span{color: red;
		padding-left: 0px;
		cursor: pointer;
		width: 1px;
	}
	
	#chosen span:hover{filter:grayscale(100%)}

      /*Input fields*/
      input[type=text],
      input[type=date],
      input[type=password],
      input[type=email],
      input[type=file],
      select
      {width: 70%;
      padding: 15px;
      border:none;
      //border-top: 5px solid orange;
      border-bottom: 5px solid #b0e0e6;
      border-radius: 50px;
      margin: 5px 0px 22px 0px;
      display: inline-block;
      word-wrap: break-word;
      color: white;
      background: transparent;}

      select {color: orange;
     background: transparent;}

      button{width:75%;
      background: orange;
      font-weight: bold;
      font-size: 20px;
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

      input[type=text]:focus,
      input[type=number]:focus,
      input[type=password]:focus,
      input[type=email]:focus,
      select:focus
      {border: none;
      border-bottom:5px solid;
      border-top: 5px solid}

     fieldset{
        border: none;
        border-left: 5px solid #b0e0e6;
        border-right: 5px solid orange;
        border-radius: 100px;}

    </style>
</head>
<body>


<form method="post" action="new.php">
    <fieldset>
    <legend>
        <h1 align="center">Eduction information</h1>
        <small style="color: red">A red star means the field is compulsory *</small>
    </legend>
    
    <br/>
    <label for="next">Which grade are you applying for?</label>
    <br/>
    <select id="next" name="Applying grade" required="required">
        <option value="" selected="selected">Select the grade you applying for</option>
        <option value="11">11</option>
        <option value="12">12</option>
    </select>
    <br/>
    <label for="term">Which term are you applying for?</label>
    <br/>
    <select name="Term" id="term" required="required">
        <option value="" selected="selected">Select the term you are applying for</option>
        <option value="Term 1">Term 1</option>
        <option value="Term 2">Term 2</option>
        <option value="Term 3">Term 3</option>
        <option value="Term 4">Term 4</option>
    </select>
    <br/>
    <label for="pass">Did you pass your previous grade?</label>
    <br/>
    <select name="Passed" id="pass" required="required">
        <option value="" selected="selected">Select if you passed your last grade or not</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
    </select>
    <br/>
    <label for="subjects">Select the subjects you are planning to study</label>
    <br/>
    <select id="subjects" name="Subjects" required="required" onchange="pushing();" >
        <option id="default" value="" selected="selected">Select your subjects</option>
        <option value="Maths">Mathematics</option>
        <option value="MathsLit">MathsLit</option>
        <option value="LS">LifeSciences</option>
        <option value="Geography">Geography</option>
        <option value="Physics">Physics</option>
        <option value="Acc">Accounting</option>
        <option value="Eco">Economics</option>
        <option value="Tourism">Tourism</option>
        <option value="Business">Business</option>
    </select>
    <br/>

    <table id="chosen" align="center">
        <tr><td>Isindebele</td></tr>
        <tr><td>English</td></tr>
        <tr><td>LO</td></tr>

    </table>
    <br/>
    <label for="report">Please upload your latest report card</label>
    <br/>
    <input type="file" name="Report" id="report" required="required">
    <br/>
    <label for="identity">Please upload your ID document/Card</label>
    <br/>
    <input type="file" name="id doc" id="identity" required="required">
    </fieldset>
    <button>Submit</button>
</form>


<script>

    $("#chosen").hide();

    var subjects = [];
    let table = $("#chosen tr td"); //First three compulsory subjects on the table...onfocus="this.selectedIndex = -1"
    
    for(let i =0; i < 3; i++){
    //adding the first three compulsory subjects to the array
    subjects.push(table.eq(i).text());
    }


    function pushing(){
        let sub = $("#subjects :selected").text();//currently selected value
        var s = subjects.join("; "); //converting the array to a string to set it as a value
        let def = $("#default").attr("value", s);//the default option gets a value of the converted array
        $("#subjects").val(s);

        if(subjects.length >= 7){
            
            alert("You can only have 7 subjects");
            return;
        }

		if(sub == "MathsLit"){
			if(subjects.includes("Mathematics")){
				alert("You cannot choose both "+sub+" and Mathematics");
				return;
			}
			if(subjects.includes("Physics")){
				alert("You cannot choose both "+sub+" and Physics");
				return;
			}
		}
		
		if(sub == "Physics"||sub == "Mathematics"){
				if(subjects.includes("MathsLit")){
					alert("You cannot choose both " + sub + " and MathsLit");
					return;
				}
		}
        
        
        if(subjects.includes(sub)){
            //checking if the currently selected value already exists in the array
             alert("Subject already chosen");
        }
        else{
            subjects.push(sub);//adding the selected value to the array
            
			//The cross is added for cancelling; if the user wants to cancel a subject 
			 //This is the cross with its id as the selected option
            let cross = "<span id='" + sub + "'align='right' onclick='erase()'>&#10008</span>";
            
			$("#chosen").append("<tr><td  >" + sub + cross + "</td></tr>" ); //adding the  subject to the table          
            $("#chosen").show();
            var s = subjects.join("; "); //converting the array to a string to set it as a value
            let def = $("#default").attr("value", s);//the default option gets a value of the converted array
            $("#subjects").val(s);    
        }
        
    }

  

    function erase(){
          let ele = event.target.id;
          $("#default").attr("value", " ") //Changiing the value to nothing
          let indexNo = subjects.indexOf(ele); //accessing the index of the option to be removed
          subjects.splice(indexNo, 1); //Removing it from the array, when the file is processed the removed value won't be part of the array
          $("#"+ele).parent().parent().remove(); //accessing the tr element and removing it
          
    }
    
    

    //adding red asterisk to required input
    var val = $("input");
    for(var x=0; x<val.length; x++) {
    let req = val.eq(x).attr("required");
    if (req == "required")//checkingh if there's a 'required' attribute 
    {
        let lbl = $("label");
        let i = 0;
        while(i<lbl.length){
        if(val.eq(x).attr("id") == lbl.eq(i).attr("for"))//checking if 'id' attribute maches 'for' attribute
        {
        lbl.eq(i).prepend("<div style='color:red;'>*</div>");}
        i++;
        }
    }
    }

   //adding a red star to elements with select type
   var selectElements = $("select");
    for(let x=0; x<selectElements.length; x++) {
    let req = selectElements.eq(x).attr("required");
    if (req == "required") {
        let lbl = $("label");
        let i = 0;
        while(i<lbl.length){
        if(selectElements.eq(x).attr("id") == lbl.eq(i).attr("for")){
        lbl.eq(i).prepend("<div style='color:red;'>*</div>");}
        i++;
        }
    }
    }
   
</script>

<?php



//This is done done when the guardians information is the same as the users 
 if($_SERVER["REQUEST_METHOD"]=="POST"){
	$_SESSION['guardian'] = $_POST;
	
	if($_POST['myaddr']=='Yes'){
	  
	  $myAddr = $_SESSION['personal']; //retrieve the users address
	  
	  //Equeating the guardians address with the users
	  $_SESSION['guardian']['Suburb/Village'] = $myAddr['Suburb/Village'];
	  $_SESSION['guardian']['Section/Street'] = $myAddr['Section/Street'];
	  $_SESSION['guardian']['Stand'] = $myAddr['Stand'];
	  $_SESSION['guardian']['Postal_address'] = $myAddr['Postal_address'];
	  unset($_SESSION['guardian']['myaddr']); //Deleting the variable. Won't be stored in the database
  }
 
 }
  ?>

</body>
</html>