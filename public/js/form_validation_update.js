//Grabbing form field values
var form = document.getElementById("updateForm");
var updateFormButton = document.getElementById("updateFormButton");

var fullName = form.name;
var email = form.email;
var kpl = form.keyProgrammingLanguage;
var education = form.education;
var profile = form.profile;
var links = form.URLlinks;

var errors = document.getElementById("formErrorMessages");

// Setting event listeners
updateFormButton.onclick = function(){
    return checkIFValuesAreEmpty();
}



function checkIFValuesAreEmpty(){
    errors  = ""
    if (fullName.value.length == 0){
        errors += "You need to provide a full name"
        return produceError();
    }
    if (email.value.length == 0){
        errors += "You need to provide an email"
        return produceError();
    }
    if (kpl.value.length == 0){
        errors += "You need to provide a key programming language"
        return produceError();
    }
    if (education.value.length == 0){
        errors += "You need to provide an education"
        return produceError();
    }
    if (links.value.length == 0){
        errors += "You need to provide at least one link"
        return produceError();
    }
    if (profile.value.length == 0){
        errors += "You need to provide a profile"
        return produceError();
    }
    return true;
}

function produceError(){
    alert(errors);
    return false;
}