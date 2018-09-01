var fName = document.getElementById("fName");
var phone = document.getElementById("phone");
var pass = document.getElementById("pass");
var passConf = document.getElementById("passConf");

var nameChar = document.getElementById("nameChar");
var nameLng = document.getElementById("nameLng");
var spaces = document.getElementById("spaces");

var phoneNum = document.getElementById("phoneNum");
var phoneLng = document.getElementById("phoneLng");

var passLChar = document.getElementById("passLChar");
var pasUChar = document.getElementById("pasUChar");
var passNum = document.getElementById("passNum");
var passLng = document.getElementById("passLng");

var match = document.getElementById("match");

var namFlag = false ;
var phonFlag = false ;
var passFlag = false ;
var confFlag = false ;

fName.onfocus = function() {
	document.getElementById("nameMess").style.display = "block";
	document.getElementById("phoneMess").style.display = "none";
	document.getElementById("passMess").style.display = "none";
	document.getElementById("passConMess").style.display = "none";
}

phone.onfocus = function() {
	document.getElementById("nameMess").style.display = "none";
	document.getElementById("phoneMess").style.display = "block";
	document.getElementById("passMess").style.display = "none";
	document.getElementById("passConMess").style.display = "none";
}

pass.onfocus = function() {
	document.getElementById("nameMess").style.display = "none";
	document.getElementById("phoneMess").style.display = "none";
	document.getElementById("passMess").style.display = "block";
	document.getElementById("passConMess").style.display = "none";
}

passConf.onfocus = function() {
	document.getElementById("nameMess").style.display = "none";
	document.getElementById("phoneMess").style.display = "none";
	document.getElementById("passMess").style.display = "none";
	document.getElementById("passConMess").style.display = "block";
}

fName.onblur = function() {
  document.getElementById("nameMess").style.display = "none";
}

phone.onblur = function() {
  document.getElementById("phoneMess").style.display = "none";
}

pass.onblur = function() {
  document.getElementById("passMess").style.display = "none";
}

passConf.onblur = function() {
  document.getElementById("passConMess").style.display = "none";
}

fName.onkeyup = function() {
  var lowerCaseLetters = /[a-z]/g;
  var upperCaseLetters = /[A-Z]/g;
  var numbers = /[0-9]/g;
  if((fName.value.match(lowerCaseLetters) || fName.value.match(upperCaseLetters)) && !fName.value.match(numbers)) { 
    nameChar.classList.remove("invalid");
    nameChar.classList.add("valid");
    namFlag = true ;
  } else {
    nameChar.classList.remove("valid");
    nameChar.classList.add("invalid");
    namFlag = false ;
}

if(fName.value.length <= 30 && fName.value.length > 0) {
    nameLng.classList.remove("invalid");
    nameLng.classList.add("valid");
    namFlag = true ;
  } else {
    nameLng.classList.remove("valid");
    nameLng.classList.add("invalid");
    namFlag = false ;
  }
 if (confFlag && passFlag && namFlag && phonFlag) {
		document.getElementById("addButt").disabled = false;
} else {
	document.getElementById("addButt").disabled = true;

}
if(fName.value.match(" ")) {
    spaces.classList.remove("valid");
    spaces.classList.add("invalid");
    namFlag = false ;
  } else {
    spaces.classList.remove("invalid");
    spaces.classList.add("valid");
    namFlag = true ;
  }
}

phone.onkeyup = function() {
  var numbers = /[0-9]/g;
  if(phone.value.match(numbers)) { 
    phoneNum.classList.remove("invalid");
    phoneNum.classList.add("valid");
    phonFlag = true ;
  } else {
    phoneNum.classList.remove("valid");
    phoneNum.classList.add("invalid");
    phonFlag = false ;
}

if(phone.value.length == 10) {
    phoneLng.classList.remove("invalid");
    phoneLng.classList.add("valid");
    phonFlag = true ;
  } else {
    phoneLng.classList.remove("valid");
    phoneLng.classList.add("invalid");
    phonFlag = false ;
  }

 if (confFlag && passFlag && namFlag && phonFlag) {
		document.getElementById("addButt").disabled = false;
} else {
	document.getElementById("addButt").disabled = true;

}

}

pass.onkeyup = function() {
  var lowerCaseLetters = /[a-z]/g;
  if(pass.value.match(lowerCaseLetters)) { 
    passLChar.classList.remove("invalid");
    passLChar.classList.add("valid");
    passFlag = true ;
  } else {
    passLChar.classList.remove("valid");
    passLChar.classList.add("invalid");
    passFlag = false ;
}

  var upperCaseLetters = /[A-Z]/g;
  if(pass.value.match(upperCaseLetters)) { 
    pasUChar.classList.remove("invalid");
    pasUChar.classList.add("valid");
    passFlag = true ;
  } else {
    pasUChar.classList.remove("valid");
    pasUChar.classList.add("invalid");
    passFlag = false ;
  }

  var numbers = /[0-9]/g;
  if(pass.value.match(numbers)) { 
    passNum.classList.remove("invalid");
    passNum.classList.add("valid");
    passFlag = true ;
  } else {
    passNum.classList.remove("valid");
    passNum.classList.add("invalid");
    passFlag = false ;
  }

  if(pass.value.length >= 8) {
    passLng.classList.remove("invalid");
    passLng.classList.add("valid");
    passFlag = true ;
  } else {
    passLng.classList.remove("valid");
    passLng.classList.add("invalid");
    passFlag = false ;
  }

  if (confFlag && passFlag && namFlag && phonFlag) {
		document.getElementById("addButt").disabled = false;
} else {
	document.getElementById("addButt").disabled = true;

}
}

passConf.onkeyup = function() {
	var pass1 = pass.value ;
	var passL = pass.value.length ;
  if(passConf.value.match(pass1)) {
    match.classList.remove("invalid");
    match.classList.add("valid");
    confFlag = true ;
  } else {
    match.classList.remove("valid");
    match.classList.add("invalid");
    confFlag = false ;
  }

  if (confFlag && passFlag && namFlag && phonFlag) {
		document.getElementById("addButt").disabled = false;
	} else {
		document.getElementById("addButt").disabled = true;

	}

}