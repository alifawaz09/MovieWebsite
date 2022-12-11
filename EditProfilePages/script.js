function enable(id){
  document.getElementById(id).readOnly = false;
  document.getElementById(id).style.backgroundColor = "#DAA520";
  document.getElementById(id).style.color = "#000";
}


const togglePassword = document.querySelector('#togglePassword');

togglePassword.addEventListener('click', function (e) {
  // toggle the type attribute
  const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
  password.setAttribute('type', type);
  // toggle the eye slash icon
  this.classList.toggle('fa-eye-slash');
});
