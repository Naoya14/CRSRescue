function signupcheck() {
  var username = document.signup.username.value;
  var password = document.signup.password.value;
  var name = document.signup.name.value;

  if (username == null || username == '') {
    alert("userName can't be blank");
    return;
  } else if (password.length < 6) {
    alert('Password must be at least 6 characters long');
    return;
  } else if (name == null || name == '') {
    alert("userName can't be blank");
    return;
  } else {
    return document.signup.submit();
  }
}

function recordstaffcheck() {
  var username = document.recordstaff.username.value;
  var password = document.recordstaff.password.value;
  var name = document.recordstaff.name.value;

  if (username == null || username == '') {
    alert("userName can't be blank");
    return;
  } else if (password.length < 6) {
    alert('Password must be at least 6 characters long');
    return;
  } else if (name == null || name == '') {
    alert("userName can't be blank");
    return;
  } else {
    return document.recordstaff.submit();
  }
}

function loginCheck() {
  var username = document.volunteerLogin.username.value;
  var password = document.volunteerLogin.password.value;

  if (username == null || username == '') {
    alert("userName can't be blank");
    return;
  } else if (password.length < 6) {
    alert('Password must be at least 6 characters long');
    return;
  } else {
    return document.volunteerLogin.submit();
  }
}
