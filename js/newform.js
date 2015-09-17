/* set global variable i */

var i=0; 
var j=0;
var maxOptions = 4; // the counter start at 0, total is 4

function increment(){
	j=0;
	i +=1;                         /* function for automatic increament of feild's "Name" attribute*/ 
	
	/*
	if(i>0){
		document.getElementById("form-submit").className = "text-center";
	}
	*/
}
function incrementJ(){
	j +=1; /* function for automatic increament of feild's "Name" attribute for radio buttons and checkboxes*/	
}

/* 
---------------------------------------------

function to remove fom elements dynamically
---------------------------------------------

*/

function removeElement(parentDiv, childDiv) {

	if (childDiv == parentDiv) {
		alert("The parent div cannot be removed.");
	} else if (document.getElementById(childDiv)) {
		var child = document.getElementById(childDiv);
		var parent = document.getElementById(parentDiv);
		parent.removeChild(child);
	} else {
		alert("Child div has already been removed or does not exist.");
		return false;
	}

	var totalOptions = (document.getElementById(parentDiv)
			.getElementsByTagName('input').length) / 2;
	console.log("totalOptions " + totalOptions);
	if (totalOptions <= maxOptions) {

		var div = document.getElementById("addOptionContainer_" + i);
		var spans = div.getElementsByTagName("span");
		var addOptionSpanID = spans[spans.length - 1].id;
		var thisElement = document.getElementById(addOptionSpanID);
		console.log("addOptionSpanID " + addOptionSpanID);
		thisElement.className = "glyphicon glyphicon-plus";
	}
}

function formElement(type) {
	
	increment();
	var needsDemo=false;
	
	var r = document.createElement('span');
	
	/*****************First Element*******************/
	var formGroupOne = document.createElement("div");
	formGroupOne.setAttribute("class", "form-group");	
	
	var questionLabel = document.createElement("label");
	questionLabel.setAttribute("class", "col-sm-4 control-label");	
	questionLabel.innerHTML = "Question title";
	questionLabel.setAttribute("for", "questionElement_" + i);
	
	var questionContainer = document.createElement("div");
	questionContainer.setAttribute("class", "col-md-4 col-xs-3");
	
	var question = document.createElement("INPUT");
	question.setAttribute("type", "text");
	question.setAttribute("class", "form-control");
	question.setAttribute("Name", "questionElement[]");
	question.setAttribute("id", "questionElement_" + i);
	question.setAttribute("required", "required");
	
	/*****************Second Element*******************/
	var formGroupTwo = document.createElement("div");
	formGroupTwo.setAttribute("class", "form-group");	
	
	var helpTextLabel = document.createElement("label");
	helpTextLabel.setAttribute("class", "col-sm-4 control-label");	
	helpTextLabel.innerHTML = "Help text";
	helpTextLabel.setAttribute("for", "helpElement_" + i);
	
	var helpTextContainer = document.createElement("div");
	helpTextContainer.setAttribute("class", "col-md-4 col-xs-3");
		
	var helpText = document.createElement("INPUT");	
	helpText.setAttribute("type", "text");
	helpText.setAttribute("class", "form-control");
	helpText.setAttribute("Name", "helpElement[]");
	helpText.setAttribute("id", "helpElement_" + i);
	/*********************************************************/
	
	if(type == "time" || type == "date" || type=="paragraph"){
		needsDemo = true;		
		/*****************Demo Element*******************/
		var demoElement = document.createElement("div");
		demoElement.setAttribute("class", "form-group");	
		
		var demoLabel = document.createElement("label");
		demoLabel.setAttribute("class", "col-sm-4 control-label");	
		demoLabel.innerHTML = "Demo";
		
		
		var demoContainer = document.createElement("div");
		demoContainer.setAttribute("class", "col-md-4 col-xs-3");
		
		if(type == "time"){
			var d = new Date(),
		    h = (d.getHours()<10?'0':'') + d.getHours(),
		    m = (d.getMinutes()<10?'0':'') + d.getMinutes();
			
			var currentTime = h + ':' + m;
			
			demoContainer.innerHTML="<input type='time' class='form-control' value='"+ currentTime +"'>";
		} else if(type == "date"){
			var currentDate = new Date();
			 var dd = currentDate.getDate();
			 var mm = currentDate.getMonth()+1; //January is 0!

			 var yyyy = currentDate.getFullYear();
			 if(dd<10){
			    dd='0'+dd
			 } 
			 if(mm<10){
			    mm='0'+mm
			 } 
			 
			 var today = yyyy+'-'+mm+'-'+dd;	
			demoContainer.innerHTML="<input type='date' class='form-control' value='"+ today +"'>";
		} else if(type == "paragraph"){
			demoContainer.innerHTML="<textarea class='form-control input-sm' rows='3' disabled>&#10;&#13;Their longer answer</textarea>";
			
		}
	}
	/*****************Third Element*******************/
	var formGroupThree = document.createElement("div");
	formGroupThree.setAttribute("class", "form-group last-group");	
	
	
	var emptyLabel = document.createElement("div");
	emptyLabel.setAttribute("class", "col-sm-4 control-label");	
	
	
	var requiredContainer = document.createElement("div");
	requiredContainer.setAttribute("class", "col-md-4 col-xs-3 checkbox");	
	
	var requiredlabel = document.createElement("label");
		
	var removeButton = document.createElement("span");	
	removeButton.setAttribute("class", "glyphicon glyphicon-bin pull-right");
	removeButton.setAttribute("aria-hidden", "true");
	removeButton.setAttribute("onclick", "removeElement('myForm','id_" + i + "')");
	
		
	formGroupOne.appendChild(questionLabel);
	questionContainer.appendChild(question);
	formGroupOne.appendChild(questionContainer);
	
	formGroupTwo.appendChild(helpTextLabel);
	helpTextContainer.appendChild(helpText);
	formGroupTwo.appendChild(helpTextContainer);
	
	if(needsDemo){
	//Demo
		demoElement.appendChild(demoLabel);
		demoElement.appendChild(demoContainer);	
	}
	
	//requiredlabel.innerHTML = "<input type='checkbox' name='required_"+ i +"' value='required_"+ i +"'> Required question";	
	requiredlabel.innerHTML = "<input type='hidden' name='requiredFieldID[]' value='"+ i +"'>" +
							  "<input type='hidden' name='requiredField"+ i +"' value='0'>" +
							  "<input type='checkbox' name='requiredField"+ i +"' value='1'> Required question";
	requiredContainer.appendChild(requiredlabel);
	
		
	formGroupThree.appendChild(emptyLabel);
	formGroupThree.appendChild(requiredContainer);
	
	r.appendChild(removeButton);
	r.appendChild(formGroupOne);
	r.appendChild(formGroupTwo);
	if(needsDemo){
		r.appendChild(demoElement);
	}
	r.appendChild(formGroupThree);
	
	r.setAttribute("id", "id_" + i);
	r.innerHTML = r.innerHTML + "<input type='hidden' name='questionType[]' value='" + type + "'>";
	document.getElementById("myForm").appendChild(r);
}


function multipleChoice(optionsType) {
	
	increment();
	//var randomNumber = (Math.floor(Date.now() / 1000)) + (Math.floor((Math.random() * 100) + 1));
	var r = document.createElement('span');
	
	/*****************First Element*******************/
	var formGroupOne = document.createElement("div");
	formGroupOne.setAttribute("class", "form-group");	
	
	var questionLabel = document.createElement("label");
	questionLabel.setAttribute("class", "col-sm-4 control-label");	
	questionLabel.innerHTML = "Question title";
	questionLabel.setAttribute("for", "questionElement_" + i);
	
	var questionContainer = document.createElement("div");
	questionContainer.setAttribute("class", "col-md-4 col-xs-3");
	
	var question = document.createElement("INPUT");
	question.setAttribute("type", "text");
	question.setAttribute("class", "form-control");
	//question.setAttribute("Name", "questionElement_" + i);
	question.setAttribute("Name", "questionElement[]");
	question.setAttribute("id", "questionElement_" + i);
	question.setAttribute("required", "required");
	
	
	
	/*****************Second Element*******************/
	var formGroupTwo = document.createElement("div");
	formGroupTwo.setAttribute("class", "form-group");	
	
	var helpTextLabel = document.createElement("label");
	helpTextLabel.setAttribute("class", "col-sm-4 control-label");	
	helpTextLabel.innerHTML = "Help text";
	helpTextLabel.setAttribute("for", "helpElement_" + i);
	
	var helpTextContainer = document.createElement("div");
	helpTextContainer.setAttribute("class", "col-md-4 col-xs-3");
		
	var helpText = document.createElement("INPUT");	
	helpText.setAttribute("type", "text");
	helpText.setAttribute("class", "form-control");
	//helpText.setAttribute("Name", "helpElement_" + i);
	helpText.setAttribute("Name", "helpElement[]");
	helpText.setAttribute("id", "helpElement_" + i);
	
	/*****************options Element*******************/
	var optionsElements = document.createElement("div");
	optionsElements.setAttribute("class", "form-group");
	optionsElements.setAttribute("id", "options-place_" + i);	
	
	/*****************Demo Element add a new option*******************/
	var demoElement = document.createElement("div");
	demoElement.setAttribute("class", "form-group");
	demoElement.setAttribute("id", "addOptionContainer_" + i);
	
	var demoLabel = document.createElement("label");
	demoLabel.setAttribute("class", "col-sm-4 control-label");	
	demoLabel.innerHTML = "<span title='You can add maximum of 4 options' class='glyphicon glyphicon-plus' " +
			"onClick=addOptions('options-place_"+ i +"','"+ optionsType +"') aria-hidden='true' id='addOption_"+ i +"'></span>";
	
	/*****************Third Element*******************/
	var formGroupThree = document.createElement("div");
	formGroupThree.setAttribute("class", "form-group last-group");	
	
	var emptyLabel = document.createElement("div");
	emptyLabel.setAttribute("class", "col-sm-4 control-label");	
	
	var requiredContainer = document.createElement("div");
	requiredContainer.setAttribute("class", "col-md-4 col-xs-3 checkbox");	
	
	var requiredlabel = document.createElement("label");
	
	var removeButton = document.createElement("span");	
	removeButton.setAttribute("class", "glyphicon glyphicon-bin pull-right");
	removeButton.setAttribute("aria-hidden", "true");
	removeButton.setAttribute("onclick", "removeElement('myForm','id_" + i + "')");
	
		
	formGroupOne.appendChild(questionLabel);
	questionContainer.appendChild(question);
	formGroupOne.appendChild(questionContainer);
	
	formGroupTwo.appendChild(helpTextLabel);
	helpTextContainer.appendChild(helpText);
	formGroupTwo.appendChild(helpTextContainer);
	
	//Demo
	demoElement.appendChild(demoLabel);
	
	//requiredlabel.innerHTML = "<input type='checkbox' name='required_"+ i +"' value='required_"+ i +"'> Required question";
	requiredlabel.innerHTML = "<input type='hidden' name='requiredFieldID[]' value='"+ i +"'>" +
							  "<input type='hidden' name='requiredField"+ i +"' value='0'>" +
							  "<input type='checkbox' name='requiredField"+ i +"' value='1'> Required question";
	
	requiredContainer.appendChild(requiredlabel);
		
	formGroupThree.appendChild(emptyLabel);
	formGroupThree.appendChild(requiredContainer);
	
	r.appendChild(removeButton);
	r.appendChild(formGroupOne);
	r.appendChild(formGroupTwo);
	r.appendChild(optionsElements);
	r.appendChild(demoElement);
	r.appendChild(formGroupThree);
	
	r.setAttribute("id", "id_" + i);
	r.innerHTML = r.innerHTML + "<input type='hidden' name='questionType[]' value='" + optionsType + "'>";
	document.getElementById("myForm").appendChild(r);
}

// Add options for radio buttons or checkbox
function addOptions(parentDiv, optionsType) {

	incrementJ();
	/*
	var div = document.getElementById("addOptionContainer_" + i);
	var spans = div.getElementsByTagName("span");
	var addOptionSpanID = spans[spans.length -1].id;
	*/
	
	var totalOptions = ((document.getElementById(parentDiv).getElementsByTagName('input').length) / 2) + 1;
	// there is 2 input tag for each option. One is the radio button or checkbox and the other one is textbox
	//Why +1 ? because at this line, it has not been created yet

	var optionContainer = document.createElement("div");
	optionContainer.setAttribute("class", "form-group");
	optionContainer.setAttribute("id", "optionContainer_" + i + j);

	var optionLabel = document.createElement("label");
	optionLabel.setAttribute("class", "col-sm-4 control-label");
	if(optionsType == "radio"){
		optionLabel.innerHTML = "<input type='radio' name='" + parentDiv + "'>";
	} else {
		optionLabel.innerHTML = "<input type='checkbox'>";
	}
	optionLabel.setAttribute("for", "option_" + j);

	var optionTextContainer = document.createElement("div");
	optionTextContainer.setAttribute("class", "col-md-4 col-xs-3");

	//if (totalOptions > maxOptions) {
		
		//alert("The max number of option is 4!");
		/*
		hideElement(addOptionSpanID);
		var emptyLabel = document.createElement("label");
		emptyLabel.setAttribute("class", "col-sm-4 control-label");
		optionContainer.appendChild(emptyLabel);
		optionTextContainer.innerHTML = "<p class='text-info small'>You are only allow to add maximumm of 4 options.</p>";
		optionContainer.appendChild(optionTextContainer);
		document.getElementById(parentDiv).appendChild(optionContainer);
		*/
	//} else {
		
	if(totalOptions <= maxOptions){
		var removeButton = document.createElement("span");
		removeButton.setAttribute("class", "glyphicon glyphicon-bin");
		removeButton.setAttribute("aria-hidden", "true");
		removeButton.setAttribute("onclick", "removeElement('" + parentDiv + "','optionContainer_" + i + j + "')");

		optionContainer.appendChild(optionLabel); //
		//optionTextContainer.innerHTML = "<input type='text' class='form-control required' name='option_"+ j + "' id='option_"+ j + "' placeholder='This text will be show in the final form' required>";
		optionTextContainer.innerHTML = "<input type='text' class='form-control required' name='multiOption_"+ i + "[]' id='option_"+ j + "' placeholder='This text will be show in the final form' required>";
		optionContainer.appendChild(optionTextContainer); //
		optionContainer.appendChild(removeButton);
		document.getElementById(parentDiv).appendChild(optionContainer);
	}
	
	if (totalOptions >= maxOptions) {
		/*
		var div = document.getElementById("addOptionContainer_" + i);
		var spans = div.getElementsByTagName("span");
		var addOptionSpanID = spans[spans.length -1].id;
		
		var optionAdder = document.getElementById(addOptionSpanID);
		optionAdder.setAttribute('title', 'Maximum reached');
		optionAdder.setAttribute('data-toggle', 'popover');
		optionAdder.setAttribute('ata-placement', 'bottom');
		optionAdder.setAttribute('data-content', 'Reached maximum amount of options');
		*/
		
		alert("The max number of option is 4!");
	}
}

function hideElement(ElementID){
	var thisElement = document.getElementById(ElementID);
	thisElement.className = thisElement.className + " invisible";
}


/*
-----------------------------------------------------------------------------

functions  that will be called upon, when user click on the Reset Button

------------------------------------------------------------------------------
*/
function resetElements() {
	document.getElementById('myForm').innerHTML = '';
	//hideElement('form-submit');
	i = 0;
}