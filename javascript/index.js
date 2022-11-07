let loginform = document.getElementById("loginform");
let registrationform = document.getElementById("registrationform");
let callregistration = document.getElementById("callsregistration");
let calllogin = document.getElementById("calllogin");

callregistration.addEventListener('click', () =>{
    loginform.style.display = "none";
    registrationform.style.display = "block";
    localStorage.setItem("activeform","registration");
})

 calllogin.addEventListener('click', () =>{
    loginform.style.display = "block";
    registrationform.style.display = "none";
    localStorage.setItem("activeform","login");
})

//retain page state
function retainstate(arguments) {
    //body...
    let newstate = localStorage.getItem("activeform");
    console.log(newstate);
    if (newstate == "login"){
        loginform.style.display = "block";
        registrationform.style.display = "none";
    }else if (newstate == "registration"){
        loginform.style.display = "none";
    registrationform.style.display = "block";
    }else {
        loginform.style.display = "block";
    registrationform.style.display = "none";
    }
}
retainstate();