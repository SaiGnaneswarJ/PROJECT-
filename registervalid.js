function clearErrors(){

    errors = document.getElementsByClassName('formerror');
    for(let item of errors)
    {
        item.innerHTML = "";
    }
}

function seterror(id, error){
    //sets error inside tag of id 
    element = document.getElementById(id);
    element.getElementsByClassName('formerror')[0].innerHTML = error;

}

function validateForm(){
    var returnval = true;
    clearErrors();

    //perform validation and if validation fails, set the value of returnval to false
    var username = document.forms['register']["username"].value;
      
    var userexp = /^[0-9A-Za-z]{6,15}$/;

    if (!userexp.test(username)) {
        seterror("username", "*Enter a valid username with 6 characters");
        returnval = false;
    }

    if (username.length<5){
        seterror("username", "*Length of name is too short");
        returnval = false;
    }

    if (username.length == 0){
        seterror("username", "*Enter your name");
        returnval = false;
    }

    var fname = document.forms['register']["fname"].value;

    var nameexp = /^[A-Za-z]{1,20}$/;

    if(!nameexp.test(fname)){
        seterror("fname","*First name should be in letters");
        returnval = false;
    }

    if (fname.length == 0){
        seterror("fname", "*Enter the firstname");
        returnval = false;
    }
     
    var lname = document.forms['register']["lname"].value;

    if(!nameexp.test(lname)){
        seterror("lname","*Last name should be in letters");
        returnval = false;
    }

    if (lname.length == 0){
        seterror("lname", "*Enter the lastname");
        returnval = false;
    }

    var email = document.forms['register']["email"].value;
    
    var emailexp = /^[^\s@]+@[^\s@]+\.[^\s@]{2,20}$/;

    if(!emailexp.test(email))
    {
        seterror("email","Enter the valid email");
    }
 
    if (email.length > 20){  
        seterror("email", "*Email length is too long");
        returnval = false;
    }

    if (email.length == 0){
        seterror("email", "*Enter the email");
        returnval = false;
    }

    var password = document.forms['register']["password"].value;

    var passexp = /^(?=.*?[0-9])(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[^0-9A-Za-z]).{6,15}$/;

    if (!passexp.test(password)) {
        seterror("password", "*password should contain capital letter,small letter,number,specialcharacter");
        returnval = false;
    }

    if (password.length < 6){
        seterror("password", "*Password should be atleast 6 characters long!");
        returnval = false;
    }
    

    if (password.length == 0){
        seterror("password", "*Create the password");
        returnval = false;
    }

    var confirmpassword = document.forms['register']["confirmpassword"].value;
    if (confirmpassword != password){
        seterror("confirmpassword", "*password is not matching");
        returnval = false;
    }

    if (confirmpassword.length == 0){
        seterror("confirmpassword", "*confirm the password");
        returnval = false;
    }

    return returnval;
}

