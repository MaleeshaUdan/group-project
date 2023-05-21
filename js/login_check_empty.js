function validateForm() {
  var username = document.forms["login"]["user"].value;
  var password = document.forms["login"]["pass"].value;
  if (username == "" || password == "") {
    alert("Username and password cannot be empty");
    document.forms["login"]["user"].value = "";
    document.forms["login"]["pass"].value = "";
    return false;
  }
  return true;
}
