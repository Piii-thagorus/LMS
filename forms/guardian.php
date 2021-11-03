<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Parent/Guardian details</title>
    <script src="jquery-3.5.1.js"></script>
    <style>
        
         body{text-align: center;
        background-image: url("../pics/p.jpg");
        background-size: 100%;
        color: white;}

        form{
        padding-right: 25%;
        padding-left: 25%;
        }

        label{font-weight: bold;}

     label{font-weight: bold;
      font-size: 20px;
      color: white;}

      ::placeholder{color: white;}
      
    
        table tr td{
        border: 1px solid;
        width: 50%;
        background: #fbceb1;
        font-weight: bold;
        color: white;
        font-size: 22px;
        }

      /*Input fields*/
      input[type=text],
      input[type=date],
      input[type=password],
      input[type=email],
      select
      {width: 70%;
      padding: 15px;
      color: white;
      border:none;
      border-top: 5px solid orange;
      border-bottom: 5px solid #b0e0e6;
      border-radius: 50px;
      margin: 5px 0px 22px 0px;
      display: inline-block;
      word-wrap: break-word;
      background: transparent;}
	  
	  input[type=radio]{
		  
	  }

      select {color: orange;
     background: transparent;}

      input[type=submit],
      button{width:50%;
      background: orange;
      font-weight: bold;
      font-size: 25px;
      border: 1px solid orange;
      border-radius: 100px;
      color:white;
      cursor: pointer;}

     input[type=submit]:hover,
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

    body{text-align: center;}
	
	h3{
		color: orange;
		font-size: 17px;
	}

     fieldset{
        border: none;
        border-left: 5px solid #b0e0e6;
        border-right: 5px solid orange;
        border-radius: 100px;}

        fieldset legend span:hover{filter:grayscale(100%);}
        
   
    span{
        border-radius: 10px;
        background: red;
        color: white;
        font-weight: bold;
        font-size: 25px;
        width: 100%;
        cursor: pointer;
    }    
        
    </style>

</head>
<body>


<form method="post" action="education.php" id="guardian">
    <Section id="firstForm">
    <fieldset >
    <legend>
        <h1 align="center">Parent/Guardian information</h1>
        <small style="color: red">A red star means the field is compulsory *</small>
    </legend>
    <label for="full_name">Full name</label>
    <br/>
    <input type="text" name="names[]" id="full_name" required="required" placeholder="Enter full name">
    <br/>
    <label for="surname">Surname</label>
    <br>
    <input type="text" name="surname[]" id="surname" required="required" placeholder="Enter surname">
    <br/>
    <label for="title">Title</label>
    <br/>
    <select name="title[]" id="title" required="required">
        <option selected="selected" value="">Title</option>
        <option value="Mr">Mr.</option>
        <option value="Mrs">Mrs.</option>
        <option value="Miss">Miss.</option>
        <option value="Dr">Dr.</option>
        <option value="Prof">Prof.</option>
        <option value="Sir">Sir</option>
    </select>
    <br/>
    <label for="relationship">Relationship with parent/guardian?</label>
    <br/>
    <select id="relationship" name="relationship[]" required="required">
        <option selected="selected" value="">Select Relationship</option>
        <option value="Mother">Mother</option>
        <option value="Father">Father</option>
        <option value="Grandmother">Grandmother</option>
        <option value="Grandfather">GrandFather</option>
        <option value="Sibling">Sibling</option>
        <option value="Other">Other</option>
    </select>
    <br/>
    <label for="marital">Marital status</label>
    <br/>
    <select name="maritalStatus[]" id="marital" required="required">
        <option selected="selected" value="">Select Marital status</option>
        <option value="Married">Married</option>
        <option value="Divorced">Divorced</option>
        <option value="Widow">Widow</option>
        <option value="Widower">Widower</option>
        <option value="Not married">Not married</option>
    </select>
    <br/>
    <label for="employed">Parent/Guardian employed?</label>
    <br/>
    <select id="employed" name="employed[]" required="required">
        <option value="" selected="selected">Select employment status</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
        <option value="Pentioner">Pentioner</option>
    </select>
    <br/>
    <label for="numbers">Phone numbers</label>
    <br/>
    <input type="text" id="numbers" name="cell[]" required="required" placeholder="Enter phone numbers">
    <br/>
    <label for="work">Work number</label>
    <br/>
    <input type="text" name="wor[]" id="work"  placeholder="Enter work number">
    <br/>
    <label for="address">Physical Address.</label>
    <br/>
	<h3>I have the same address as this guardian</h3>
	<select name="myaddr[]" required="required" class="Same_as_mine" onchange="sameAddress(this)">
	<option  value="Yes" selected="selected" >Yes</option>
	<option value="No" >No</option>
	</select>
	<br/>
	<br/>
    <input type="text" placeholder="Town" name="city/town[]" id="address" required="required" class="address">
    <br/>
    <input type="text" placeholder="Village/Suburb" name="suburb/village[]" required="required" class="address">
    <input type="text" placeholder="Section" name="section/street[]" class="address">
    <input type="text" placeholder="Stand No." name="stand[]" required="required" class="address">
    <input type="text" placeholder="Postal address" name="postalAddress[]" required="required" class="address">
    <br/>
    </fieldset>
    </section>

    <section id="2ndForm">
    <!--Another form will be added if user has more than parent/guardian-->
	<fieldset disabled="disabled">
    <legend>
        <span class="cancel" onclick="remove(this)">Remove Parent</span>
        <h1 align="center">Parent/Guardian information (2)</h1>
        <small style="color: red">A red star means the field is compulsory *</small>
    </legend>
    <label for="full_name">Full name</label>
    <br/>
    <input type="text" name="names[]" id="full_name" required="required" placeholder="Enter full name">
    <br/>
    <label for="surname">Surname</label>
    <br>
    <input type="text" name="surname[]" id="surname" required="required" placeholder="Enter surname">
    <br/>
    <label for="title">Title</label>
    <br/>
    <select name="title[]" id="title" required="required">
        <option selected="selected" value="">Title</option>
        <option value="Mr">Mr.</option>
        <option value="Mrs">Mrs.</option>
        <option value="Miss">Miss.</option>
        <option value="Dr">Dr.</option>
        <option value="Prof">Prof.</option>
        <option value="Sir">Sir</option>
    </select>
    <br/>
    <label for="relationship">Relationship with parent/guardian?</label>
    <br/>
    <select id="relationship" name="relationship[]" required="required">
        <option selected="selected" value="">Select Relationship</option>
        <option value="Mother">Mother</option>
        <option value="Father">Father</option>
        <option value="Grandmother">Grandmother</option>
        <option value="Grandfather">GrandFather</option>
        <option value="Sibling">Sibling</option>
        <option value="Other">Other</option>
    </select>
    <br/>
    <label for="marital">Marital status</label>
    <br/>
    <select name="maritalStatus[]" id="marital" required="required">
        <option selected="selected" value="">Select Marital status</option>
        <option value="Married">Married</option>
        <option value="Divorced">Divorced</option>
        <option value="Widow">Widow</option>
        <option value="Widower">Widower</option>
        <option value="Not married">Not married</option>
    </select>
    <br/>
    <label for="employed">Parent/Guardian employed?</label>
    <br/>
    <select id="employed" name="employed[]" required="required">
        <option value="" selected="selected">Select employment status</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
        <option value="Pentioner">Pentioner</option>
    </select>
    <br/>
    <label for="numbers">Phone numbers</label>
    <br/>
    <input type="text" id="numbers" name="cell[]" required="required" placeholder="Enter phone numbers">
    <br/>
    <label for="work">Work number</label>
    <br/>
    <input type="text" name="wor[]" id="work"  placeholder="Enter work number">
    <br/>
    <label for="address">Physical Address.</label>
    <br/>
	<h3>I have the same address as this guardian</h3>
	<select name="myaddr[]" required="required" class="Same_as_mine" onchange="sameAddress(this)">
	<option  value="Yes" selected="selected">Yes</option>
	<option value="No">No</option>
	</select>
	<br/>
	<br/>
    <input type="text" placeholder="Town" name="city/town[]" id="address" required="required" class="address">
    <br/>
    <input type="text" placeholder="Village/Suburb" name="suburb/village[]" required="required" class="address">
    <input type="text" placeholder="Section" name="section/street[]" class="address">
    <input type="text" placeholder="Stand No." name="stand[]" required="required" class="address">
    <input type="text" placeholder="Postal address" name="postalAddress[]" required="required" class="address">
    <br/>
    </fieldset>
    </section>
    
    <section id="3rdForm">
    <!--Another form will be added if user has more than parent/guardian-->
	<fieldset disabled="disabled">
    <legend>
        <span class="cancel" onclick="remove(this)">Remove Parent</span>
        <h1 align="center">Parent/Guardian information (3)</h1>
        <small style="color: red">A red star means the field is compulsory *</small>
    </legend>
    <label for="full_name">Full name</label>
    <br/>
    <input type="text" name="names[]"  id="full_name" required="required" placeholder="Enter full name">
    <br/>
    <label for="surname">Surname</label>
    <br>
    <input type="text" name="surname[]" id="surname" required="required" placeholder="Enter surname">
    <br/>
    <label for="title">Title</label>
    <br/>
    <select name="title[]" id="title" required="required">
        <option selected="selected" value="">Title</option>
        <option value="Mr">Mr.</option>
        <option value="Mrs">Mrs.</option>
        <option value="Miss">Miss.</option>
        <option value="Dr">Dr.</option>
        <option value="Prof">Prof.</option>
        <option value="Sir">Sir</option>
    </select>
    <br/>
    <label for="relationship">Relationship with parent/guardian?</label>
    <br/>
    <select id="relationship" name="relationship[]" required="required">
        <option selected="selected" value="">Select Relationship</option>
        <option value="Mother">Mother</option>
        <option value="Father">Father</option>
        <option value="Grandmother">Grandmother</option>
        <option value="Grandfather">GrandFather</option>
        <option value="Sibling">Sibling</option>
        <option value="Other">Other</option>
    </select>
    <br/>
    <label for="marital">Marital status</label>
    <br/>
    <select name="maritalStatus[]" id="marital" required="required">
        <option selected="selected" value="">Select Marital status</option>
        <option value="Married">Married</option>
        <option value="Divorced">Divorced</option>
        <option value="Widow">Widow</option>
        <option value="Widower">Widower</option>
        <option value="Not married">Not married</option>
    </select>
    <br/>
    <label for="employed">Parent/Guardian employed?</label>
    <br/>
    <select id="employed" name="employed[]" required="required">
        <option value="" selected="selected">Select employment status</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
        <option value="Pentioner">Pentioner</option>
    </select>
    <br/>
    <label for="numbers">Phone numbers</label>
    <br/>
    <input type="text" id="numbers" name="cell[]" required="required" placeholder="Enter phone numbers">
    <br/>
    <label for="work">Work number</label>
    <br/>
    <input type="text" name="wor[]" id="work"  placeholder="Enter work number">
    <br/>
    <label for="address">Physical Address.</label>
    <br/>
	<h3>I have the same address as this guardian</h3>
	<select name="myaddr[]" required="required" class="Same_as_mine" onchange="sameAddress(this)">
	<option  value="Yes" selected="selected">Yes</option>
	<option value="No">No</option>
	</select>
	<br/>
	<br/>
    <input type="text" placeholder="Town" name="city/town[]" id="address" required="required" class="address">
    <br/>
    <input type="text" placeholder="Village/Suburb" name="suburb/village[]" required="required" class="address">
    <input type="text" placeholder="Section" name="section/street[]" class="address">
    <input type="text" placeholder="Stand No." name="stand[]" required="required" class="address">
    <input type="text" placeholder="Postal address" name="postalAddress[]" required="required" class="address">
    <br/>
    </fieldset>
    </section>
    
    <section id="4thForm">
    <!--Another form will be added if user has more than parent/guardian-->
	<fieldset disabled="disabled">
    <legend>
        <span class="cancel" onclick="remove(this)">Remove Parent</span>
        <h1 align="center">Parent/Guardian information (4)</h1>
        <small style="color: red">A red star means the field is compulsory *</small>
    </legend>
    <label for="full_name">Full name</label>
    <br/>
    <input type="text" name="names[]" id="full_name" required="required" placeholder="Enter full name">
    <br/>
    <label for="surname">Surname</label>
    <br>
    <input type="text" name="surname[]" id="surname" required="required" placeholder="Enter surname">
    <br/>
    <label for="title">Title</label>
    <br/>
    <select name="title[]" id="title" required="required">
        <option selected="selected" value="">Title</option>
        <option value="Mr">Mr.</option>
        <option value="Mrs">Mrs.</option>
        <option value="Miss">Miss.</option>
        <option value="Dr">Dr.</option>
        <option value="Prof">Prof.</option>
        <option value="Sir">Sir</option>
    </select>
    <br/>
    <label for="relationship">Relationship with parent/guardian?</label>
    <br/>
    <select id="relationship" name="relationship[]" required="required">
        <option selected="selected" value="">Select Relationship</option>
        <option value="Mother">Mother</option>
        <option value="Father">Father</option>
        <option value="Grandmother">Grandmother</option>
        <option value="Grandfather">GrandFather</option>
        <option value="Sibling">Sibling</option>
        <option value="Other">Other</option>
    </select>
    <br/>
    <label for="marital">Marital status</label>
    <br/>
    <select name="maritalStatus[]" id="marital" required="required">
        <option selected="selected" value="">Select Marital status</option>
        <option value="Married">Married</option>
        <option value="Divorced">Divorced</option>
        <option value="Widow">Widow</option>
        <option value="Widower">Widower</option>
        <option value="Not married">Not married</option>
    </select>
    <br/>
    <label for="employed">Parent/Guardian employed?</label>
    <br/>
    <select id="employed" name="employed[]" required="required">
        <option value="" selected="selected">Select employment status</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
        <option value="Pentioner">Pentioner</option>
    </select>
    <br/>
    <label for="numbers">Phone numbers</label>
    <br/>
    <input type="text" id="numbers" name="cell[]" required="required" placeholder="Enter phone numbers">
    <br/>
    <label for="work">Work number</label>
    <br/>
    <input type="text" name="wor[]" id="work"  placeholder="Enter work number">
    <br/>
    <label for="address">Physical Address.</label>
    <br/>
	<h3>I have the same address as this guardian</h3>
	<select name="myaddr[]" required="required" class="Same_as_mine" onchange="sameAddress(this)">
	<option  value="Yes" selected="selected">Yes</option>
	<option value="No">No</option>
	</select>
	<br/>
	<br/>
    <input type="text" placeholder="Town" name="city/town[]" id="address" required="required" class="address">
    <br/>
    <input type="text" placeholder="Village/Suburb" name="suburb/village[]" required="required" class="address">
    <input type="text" placeholder="Section" name="section/street[]" class="address">
    <input type="text" placeholder="Stand No." name="stand[]" required="required" class="address">
    <input type="text" placeholder="Postal address" name="postalAddress[]" required="required" class="address">
    <br/>
    </fieldset>
    </section>

</form>
<button onclick="another()"  class="add">&#43 Relationship</button> <!--onclick="another()"-->
 <br class="add"/>
    <br/>
    <input form="guardian" type="submit">

</body>
<script>

$("#2ndForm").hide();
$("#3rdForm").hide();
$("#4thForm").hide();

//_______________________Check for empty fields__________________________

function checkEmpty(field){
        //Field will be the fieldset of the elements that are being checked
    
        var x = true; //X will be returned
        
        //inputs are all the input fields of the fieldset that are required and not disabled
        var inputs = $(field).find('input[required=required][disabled!=disabled]');
        
        var i = 0;
        while(i < inputs.length){
            if(inputs.eq(i).val() === ""){
                
                //If the input is empty then it should be focused on alerting the user
                inputs.eq(i).focus();
                
                //x will be false since there is an empty field found
                x = false
                
                break;
                return x 
            }
            i++
        }
        if(x){
            //If there's an empty input field then this block should not execute
            
            //Selects are all the select fields of the fieldset that are required and not disabled
            var selects = $(field).find('select[required=required][disabled!=disabled]');
            
            var i = 0;
            while(i < selects.length){
                
                if(selects.eq(i).val() === ""){
                    
                    //If the select option is empty then it should be focused on alerting the user
                    selects.eq(i).focus()
                    
                    //x will be false since there is an empty field found
                    x = false
                    break;
                    return x 
                }
                i++
            }
        }
       
        return x;
    }
//_______________________Check for empty fields__________________________

function another(){

//This function adds another fieldset for the guardian on a user's click
//There can only be 4 fieldsets in total and initially they are all hidden except for the first one


try{
    
    
	if($("#2ndForm").is(":hidden")){
        //This code executes if the second fieldset is hidden and user wants to add it
        
        if(checkEmpty($("#firstForm"))){
            //If there are no empty fields from the previous fieldset then this code executes
            
            //The second fieldset will be shown and enabled
            $("#2ndForm").show();  
            $("#2ndForm").find("fieldset").removeAttr("disabled");
        }
        else{
            
            //If  there are any empty fields the user will be alerted, then the code returns
            alert("Please fill the first form")
        }
		return;
	}
	
    else if($("#3rdForm").is(":hidden")){
        //This code executes if the third fieldset is hidden and the user wants to add it
        
		if(checkEmpty($("#2ndForm"))){
            //If there are no empty fields from the previous fieldset then this code executes
            
            //The third fieldset will be shown and enabled
            $("#3rdForm").show();
            $("#3rdForm").find("fieldset").removeAttr("disabled")
        }
        else{
            
            //If there are empty fields the user will be alerted
            alert("Please fill the second form")
        }
		return;
	}
	else{
        //If the 4th fieldset is the only one hidden then this code executes
        
        if(checkEmpty($("#3rdForm"))){
            //If there are no empty fields from the previous fieldset then this code executes
            
            //The fourth fieldset will be shown and enabled
            $("#4thForm").show();
            $("#4thForm").find("fieldset").removeAttr("disabled")
        }
        else{
            
            //If there are empty fields the user will be alerted
            alert("Please fill the third form")
        }
        return;
	}
}
catch(err){
	console.log(err.message);
}
	
}
    
//__________This function removes fieldsets on user's commands__________
/*
If there are other fieldsets after the fieldset that is removed. The values after the fieldsets should move on level up
E.g if fieldset 2 is removed the values of fieldset 3 go to field set 2 and the values of fieldset 4 go to fieldset 3
then fieldset 4 is removed
*/

function remove(ele){
    
    function firstImport(f1, f2){
        
        //f1 is the fieldset the values are transported to
        //f2 is the fieldset the values are transported from
        var x = 0;
        for(x; x < f1.length; x++){
            
            if(f2.parent().parent().is(":hidden")){
                //If f2 is hidden it means it has no values
                //The f1 will be empty then hidden
                
                f1Parent = f1.parent().parent().attr("id")
                $("#"+f1Parent).hide();
                f1.parent().attr("disabled", "disabled");
                f1.eq(x).val("")
                
            }
            else{
                //If f2 is not hidden then it has values
                //The transporting of values will take place
                
                f1.eq(x).val(f2.eq(x).val());
                f2.eq(x).val("")
            }    
        }
        
        
    }
    //sectionParent is the section tag of the element that has been clicked
    var sectionParent = $(ele).parent().parent().parent();
    
    //nxtSiblings are the section tags after sectionParent
    var nxtSiblings = sectionParent.nextAll();
    
    //totSiblings is the total number of nxtSiblings
    var totSiblings = nxtSiblings.length;
    
    
    if(totSiblings == 0){
        //If there's are no siblings then this block will execute
        sectionParent.find("fieldset").attr("disabled", "disabled")
        sectionParent.hide();
        return
    }
    else{
        
        var i = 0;
        while(i < totSiblings){
           
           
         if(i == totSiblings-1){
             
             //This will hide the last element since there are no siblings after it
            nxtSiblings.eq(i).hide()
            nxtSiblings.eq(i).attr("disabled", "disabled");
            return;
        }
        
        if(i == 0){
            
            //sectionParent is not included in nxtSiblings
            //so the first nxtSiblings should transport its values to sectionParent
        
            //First transporting the input fields
            var inputs1 = sectionParent.find("input");
            var inputs2 = nxtSiblings.eq(i).find("input");
            firstImport(inputs1,inputs2);
            
            //Then transport the select fields
            var inputs1 = sectionParent.find("select");
            var inputs2 = nxtSiblings.eq(i).find("select");
            firstImport(inputs1,inputs2);
            
            //Check for the sameAddress condition on the fieldset that recieved values
            sameAddress($("#" + sectionParent.attr("id") + " .Same_as_mine"))
            
        }
        
            
            //First transport the input fields    
            var inputs1 = nxtSiblings.eq(i).find("input");
            var inputs2 = nxtSiblings.eq(i+1).find("input");
            firstImport(inputs1,inputs2);
            
            //Then transport the select elements
            var inputs1 = nxtSiblings.eq(i).find("select");
            var inputs2 = nxtSiblings.eq(i+1).find("select");
            firstImport(inputs1,inputs2);
            
            //Check for the sameAddress condition on the fieldset that recieved values
            sameAddress($("#" + nxtSiblings.eq(i).attr("id") + " .Same_as_mine"))
            
            //alert(inputs1.parent().parent().attr());
            
        
       
        i++
        }
    }

}

//_______Check if the user has the same address as the guardian_________	
/*
If the user has the same address as the guardian then the address fields should be disabled
and made greyscale

The default value is that they have the same address so the address fields are hidden and grey
*/


$(".address").css('filter', 'grayscale(100%)');
$(".address").attr("disabled", "disabled");

function sameAddress(select){
try{
    
    //The id of the section tag the 'select' is in will be stored in section
    let section = $(select).parent().parent().attr("id")
    
    //check will be the the value of "Same_as_mine" under section
    let check = $("#" + section + " #Same_as_mine");
	
    if($(select).val()=="No"){
        //If the addresses are not the same the the address fields will be enabled and have default colours
		$("#" + section + " .address").removeAttr("disabled");
		$("#" + section + " .address").css('filter', 'grayscale(0%)');
        
	}
	else{
        
		$("#" + section + " .address").attr("disabled", "disabled");
		$("#" + section + " .address").css('filter', 'grayscale(100%)');
	}
}
catch(err){
    console.log(err.message);
}
}


	

	
	
<?php  
  $_SESSION['medical'] = $_POST;
?>

</script>
</html>