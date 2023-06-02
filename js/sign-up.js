
function myFunctionMon() {
  var checkBoxMon = document.getElementById("Mon");
  var textMST = document.getElementById("textMST");
  var textMET = document.getElementById("textMET");
  var inputMST = document.getElementById("MonST");
  var inputMET = document.getElementById("MonET");
  if (checkBoxMon.checked == true){
    textMST.style.display = "block";
    textMET.style.display = "block";
    inputMST.style.display = "block";
    inputMET.style.display = "block";

  } else {
     textMST.style.display = "none";
     textMET.style.display = "none";
     inputMST.style.display = "none";
     inputMET.style.display = "none";
  }
}
function myFunctionTues() {
  var checkBoxTues = document.getElementById("Tues");
  var textTST = document.getElementById("textTST");
  var textTET = document.getElementById("textTET");
  var inputTST = document.getElementById("TuesST");
  var inputTET = document.getElementById("TuesET");
  if (checkBoxTues.checked == true){
    textTST.style.display = "block";
    textTET.style.display = "block";
    inputTST.style.display = "block";
    inputTET.style.display = "block";

  } else {
     textTST.style.display = "none";
     textTET.style.display = "none";
     inputTST.style.display = "none";
     inputTET.style.display = "none";
  }
}
function myFunctionWed() {
  var checkBoxWen = document.getElementById("Weds");
  var textWST = document.getElementById("textWST");
  var textWET = document.getElementById("textWET");
  var inputWST = document.getElementById("WedST");
  var inputWET = document.getElementById("WedET");
  if (checkBoxWen.checked == true){
    textWST.style.display = "block";
    textWET.style.display = "block";
    inputWST.style.display = "block";
    inputWET.style.display = "block";

  } else {
     textWST.style.display = "none";
     textWET.style.display = "none";
     inputWST.style.display = "none";
     inputWET.style.display = "none";
  }
}
function myFunctionThurs() {
  var checkBoxThu = document.getElementById("Thurs");
  var textThST = document.getElementById("textThST");
  var textThET = document.getElementById("textThET");
  var inputThST = document.getElementById("ThST");
  var inputThET = document.getElementById("ThET");
  if (checkBoxThu.checked == true){
    textThST.style.display = "block";
    textThET.style.display = "block";
    inputThST.style.display = "block";
    inputThET.style.display = "block";

  } else {
     textThST.style.display = "none";
     textThET.style.display = "none";
     inputThST.style.display = "none";
     inputThET.style.display = "none";
  }
}
function myFunctionFri() {
  var checkBoxFri = document.getElementById("Fri");
  var textFST = document.getElementById("textFST");
  var textFET = document.getElementById("textFET");
  var inputFST = document.getElementById("FST");
  var inputFET = document.getElementById("FET");
  if (checkBoxFri.checked == true){
    textFST.style.display = "block";
    textFET.style.display = "block";
    inputFST.style.display = "block";
    inputFET.style.display = "block";

  } else {
     textFST.style.display = "none";
     textFET.style.display = "none";
     inputFST.style.display = "none";
     inputFET.style.display = "none";
  }
}
function myFunctionSat() {
  var checkBoxSat = document.getElementById("Sat");
  var textSatST = document.getElementById("textSatST");
  var textSatET = document.getElementById("textSatET");
  var inputSatST = document.getElementById("SatST");
  var inputSatET = document.getElementById("SatET");
  if (checkBoxSat.checked == true){
    textSatST.style.display = "block";
    textSatET.style.display = "block";
    inputSatST.style.display = "block";
    inputSatET.style.display = "block";

  } else {
     textSatST.style.display = "none";
     textSatET.style.display = "none";
     inputSatST.style.display = "none";
     inputSatET.style.display = "none";
  }
}
function myFunctionSun() {
  var checkBoxSun = document.getElementById("Sun");
  var textSunST = document.getElementById("textSunST");
  var textSunET = document.getElementById("textSunET");
  var inputSunST = document.getElementById("SunST");
  var inputSunET = document.getElementById("SunET");
  if (checkBoxSun.checked == true){
    textSunST.style.display = "block";
    textSunET.style.display = "block";
    inputSunST.style.display = "block";
    inputSunET.style.display = "block";

  } else {
     textSunST.style.display = "none";
     textSunET.style.display = "none";
     inputSunST.style.display = "none";
     inputSunET.style.display = "none";
  }
}
function onlyOne(checkbox) {
    var checkboxes = document.getElementsByName('type')
    checkboxes.forEach((item) => {
        if (item !== checkbox) item.checked = false
    })
}
