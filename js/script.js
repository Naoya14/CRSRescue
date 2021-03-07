function signupcheck() {
  var username = document.loginForm.username.value;
  var password = document.loginForm.password.value;

  if (username == null || username == '') {
    alert("userName can't be blank");
    return;
  } else if (password.length < 6) {
    alert('Password must be at least 6 characters long');
    return;
  } else {
    return document.loginForm.submit();
  }
}
