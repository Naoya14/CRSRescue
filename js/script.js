function signupcheck() {
  var username = document.signup.username.value;
  var password = document.signup.password.value;

  if (username == null || username == '') {
    alert("userName can't be blank");
    return;
  } else if (password.length < 6) {
    alert('Password must be at least 6 characters long');
    return;
  } else {
    return document.signup.submit();
  }
}
