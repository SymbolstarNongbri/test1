function validateSignup() {
    var letter = /^[A-Za-z]+$/;

    var inpName = document.forms['frm-signup']['name'].value;
    var inpEmail = document.forms['frm-signup']['email'].value;
    var inpMobno = document.forms['frm-signup']['mob-no'].value;
    var inpPsw = document.forms['frm-signup']['psw'].value;
    var inpConfPsw = document.forms['frm-signup']['conf-psw'].value;

    if(inpName == "") {
       alert("Name must be filled out!");
        document.forms['frm-signup']['name'].focus();
        return false;
    }

    if(inpEmail == "") {
        alert("Email must be filled out!");
        document.forms['frm-signup']['email'].focus();
        return false;
    }

    if(inpMobno == "") {
        alert("Mobile Number must be filled out!");
        document.forms['frm-signup']['mob-no'].focus();
        return false;
    }

    if(inpPsw == "") {
        alert("Password must be filled out!");
        document.forms['frm-signup']['psw'].focus();
        return false;
    }

    if(inpConfPsw == "") {
        alert("Confirm Password must be filled out!");
        document.forms['frm-signup']['conf-psw'].focus();
        return false;
    }

    if(inpPsw != inpConfPsw) {
        alert("Confirm Password not equal to password!");
        document.forms['frm-signup']['conf-psw'].value = "";
        document.forms['frm-signup']['conf-psw'].focus();
        return false;
    }

// pattern

    if(!inpName.match(letter)) {
        alert("Name must contain only Alphabets");
        document.forms['frm-signup']['name'].focus();
        return false;
    } 

    if(!validateEmail(inpEmail)) {
        alert("Invalid email \nExample :  example@gmail.com");
        document.forms['frm-signup']['email'].focus();
        return false;
    }
      
    if(!validatePhone(inpMobno)) {
        alert("Invalid Indian Mobile Number \nExample :  +919856916217");
        document.forms['frm-signup']['mob-no'].focus();
        return false;
    }

    if(!validatePassword(inpPsw)) {
        alert("Invalid Password \n\nPassword must be atleast eight character \nAnd, contain Atleast one digit, small-letter, capital-letter \nExample: Ae123Ab@");
        document.forms['frm-signup']['psw'].value = "";
        document.forms['frm-signup']['conf-psw'].value = "";
        document.forms['frm-signup']['psw'].focus();
        return false;
    }
    
}

function validateSignin() {
    var inpEmail = document.forms['frm-signin']['email'].value;
    var inpPsw = document.forms['frm-signin']['psw'].value;

    if(!validateEmail(inpEmail)) {
        alert("Invalid email \nExample :  example@gmail.com");
        document.forms['frm-signin']['email'].focus();
        return false;
    }
    if(!validatePassword(inpPsw)) {
        alert("Invalid Password \n\nPassword must be atleast eight character \nAnd, contain Atleast one digit, small-letter, capital-letter \nExample: Ae123Ab@");
        document.forms['frm-signin']['psw'].value = "";
        document.forms['frm-signin']['psw'].focus();
        return false;
    }
}

function validateEmail(inpEmail) {
     var email = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$";
    
    if(inpEmail.match(email)) {
        return true;
    } else {
        return false;
    }
}

function validatePhone(inpPhone) {
    var phone = "[+91]+[0-9]{10}$";

    if(inpPhone.match(phone) && inpPhone.length==13) {
        return true;
    } else {
        return false;
    }
}

function validatePassword(inpPsw) {

    if (inpPsw.match(/[a-z]/g) && inpPsw.match( 
        /[A-Z]/g) && inpPsw.match( 
        /[0-9]/g) && inpPsw.match( 
        /[^a-zA-Z\d]/g) && inpPsw.length >= 8) {
            return true;
    }  else {
        return false;
    }
}