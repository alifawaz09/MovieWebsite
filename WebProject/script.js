
const password = document.getElementById('password');
const password2= document.getElementById('password2');
const email = document.getElementById("email");
const username = document.getElementById("username");

const togglePassword = document.querySelector('#togglePassword');
const togglePassword2 = document.querySelector('#togglePassword2');
const submit = document.querySelector("#submit");

let caution = document.getElementById("caution");
let caution2 = document.getElementById("caution2");
let cautionUser = document.getElementById("cautionUser");
let cautionEmail = document.getElementById("cautionEmail");


submit.addEventListener("click", checkIfEmpty);

function checkIfEmpty(){
  if(username.value === "" || email.value === "" || password.value === "" || password2.value === ""){
    alert("One or more empty field");
  }
}


togglePassword.addEventListener('click', function (e) {
   // toggle the type attribute
   const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
   password.setAttribute('type', type);
   // toggle the eye slash icon
   this.classList.toggle('fa-eye-slash');
});


togglePassword2.addEventListener('click', function (e) {
   // toggle the type attribute
   const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
   password2.setAttribute('type', type);
   // toggle the eye slash icon
   this.classList.toggle('fa-eye-slash');
});




password.addEventListener('change', checkInput);
function checkInput(){
  if(password.value.length < 8){
    caution.innerHTML = "Password should be more than 8 characters" ;
  }
  else if (password.value.search(/[a-z]/) === -1)  {
    caution.innerHTML ="Your password needs a lower case letter";
  }
  else if (password.value.search(/[A-Z]/) == -1) {
    caution.innerHTML ="Your password needs a lower case letter";

  }
  else{
    caution.innerHTML = "";
  }
}

password2.addEventListener('change', checkIfMatch);



function checkIfMatch(){
  if(password.value !== password2.value){
    caution2.innerHTML = "Passwords don't match!";
  }
  else{
    caution2.innerHTML = "";
  }
}




////////////////////////////////////////////////
