$('input[type="submit"]').mousedown(function(){
  $(this).css('background', '#2ecc71');
});
$('input[type="submit"]').mouseup(function(){
  $(this).css('background', '#1abc9c');
});

$('#loginform').click(function(){
  $('.login').fadeToggle('slow');
  $(this).toggleClass('green');
});

$('#Registerform').click(function(){
  $('.signup').fadeToggle('slow');
  $(this).toggleClass('green');
});


$(document).mouseup(function (e)
{
    var container = $(".login");

    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        container.hide();
        $('#loginform').removeClass('green');
    }
});

$(document).mouseup(function (e)
{
    var container = $(".signup");

    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        container.hide();
        $('#Registerform').removeClass('green');
    }
});


function validateForm() {
    var x = document.forms["myForm"]["fname"].value;
    if (x == null || x == "") {
		document.getElementById("fnameError").innerHTML="please enter your name";
        return false;
    }
     else document.getElementById("fnameError").innerHTML="";
     return validateForm2();
}

function validateForm2() {
    var x = document.forms["myForm"]["pass"].value;
    if (x == null || x == "") {
		document.getElementById("passError").innerHTML="please enter Pass";
        return false;
    }
      else
         document.getElementById("passError").innerHTML="";
    return true;
}

function validateForm4() {
    var x = document.forms["MyForm"]["fname"].value;
    if (x == null || x == "") {
		document.getElementById("FnameError").innerHTML="please enter your name";
        return false;
    }

    else
      document.getElementById("FnameError").innerHTML="";



    var i=0,p;
    var char="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    while(i < x.length)
    {
      p = char.indexOf(x.charAt(i));
        if (p <0){
          document.getElementById("FnameError").innerHTML="Characters only";
            return false;
          }
                i ++;
    }
return validateForm5();
}

function validateForm5() {
  var x = document.forms["MyForm"]["lEmail"].value;
if (x == null || x == "") {
document.getElementById("lEmailError").innerHTML="please enter Your Gmail";
   return false;
}
else document.getElementById("lEmailError").innerHTML="";


var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(x.match(mailformat))
{
return validateForm6();
}
else
{
document.getElementById("lEmailError").innerHTML="isn't vaild";
 return false;
}

}


function validateForm6() {
  var x = document.forms["MyForm"]["phone"].value;
if (x == null || x == "") {
document.getElementById("phoneError").innerHTML="please enter Phone Number";
    return false;
}
  else document.getElementById("phoneError").innerHTML="";

var phoneno = /^\d{10}$/;
if(x.match(phoneno))
{
return validateForm7();
}
else
{
document.getElementById("phoneError").innerHTML="isn't vaild";
return false;
}


}

function validateForm7() {
    var x = document.forms["MyForm"]["pass"].value;
    if (x == null || x == "") {
		document.getElementById("PassError").innerHTML="please enter Pass";
        return false;
    }
      else{document.getElementById("PassError").innerHTML="";
       return true;}
}
