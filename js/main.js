const container = document.querySelector(".container"),
  pwShowHide = document.querySelectorAll(".showHidePw"),
  pwFields = document.querySelectorAll(".password");

//   js code to show/hide password and change icon
pwShowHide.forEach((eyeIcon) => {
  eyeIcon.addEventListener("click", () => {
    pwFields.forEach((pwField) => {
      if (pwField.type === "password") {
        pwField.type = "text";
        pwShowHide.forEach((icon) => {
          icon.classList.replace("uil-eye-slash", "uil-eye");
        });
      } else {
        pwField.type = "password";
        pwShowHide.forEach((icon) => {
          icon.classList.replace("uil-eye", "uil-eye-slash");
        });
      }
    });
  });
});

function isEmail() {
  var check = 0;
  var emailStr = document.getElementById("email").value;
  var emailPat = /^(.+)@(.+)$/;
  var specialChars = '\\(\\)<>@,;:\\\\\\"\\.\\[\\]';
  var validChars = "[^\\s" + specialChars + "]";
  var quotedUser = '("[^"]*")';
  var ipDomainPat = /^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/;
  var atom = validChars + "+";
  var word = "(" + atom + "|" + quotedUser + ")";
  var userPat = new RegExp("^" + word + "(\\." + word + ")*$");
  var domainPat = new RegExp("^" + atom + "(\\." + atom + ")*$");
  var matchArray = emailStr.match(emailPat);
  if (matchArray == null) {
    document.getElementById("warning").style =
      "right: 0;cursor: pointer;padding: 10px;color:#e74c3c;display:block;";
    document.getElementById("email").style = "border-bottom-color:#e74c3c";
    return false;
  }
  var user = matchArray[1];
  var domain = matchArray[2];
  // See if "user" is valid
  if (user.match(userPat) == null) {
    document.getElementById("warning").style =
      "right: 0;cursor: pointer;padding: 10px;color:#e74c3c;display:block;";
    document.getElementById("email").style = "border-bottom-color:#e74c3c";
    return false;
  }
  var IPArray = domain.match(ipDomainPat);
  if (IPArray != null) {
    // this is an IP address
    for (var i = 1; i <= 4; i++) {
      if (IPArray[i] > 255) {
        document.getElementById("warning").style =
          "right: 0;cursor: pointer;padding: 10px;color:#e74c3c;display:block;";
        document.getElementById("email").style = "border-bottom-color:#e74c3c";
        return false;
      }
    }
    return true;
  }
  var domainArray = domain.match(domainPat);
  if (domainArray == null) {
    document.getElementById("warning").style =
      "right: 0;cursor: pointer;padding: 10px;color:#e74c3c;display:block;";
    document.getElementById("email").style = "border-bottom-color:#e74c3c";
    return false;
  }

  var atomPat = new RegExp(atom, "g");
  var domArr = domain.match(atomPat);
  var len = domArr.length;

  if (
    domArr[domArr.length - 1].length < 2 ||
    domArr[domArr.length - 1].length > 3
  ) {
    document.getElementById("warning").style =
      "right: 0;cursor: pointer;padding: 10px;color:#e74c3c;display:block;";
    document.getElementById("email").style = "border-bottom-color:#e74c3c";
    return false;
  }

  // Make sure there's a host name preceding the domain.
  if (len < 2) {
    document.getElementById("warning").style =
      "right: 0;cursor: pointer;padding: 10px;color:#e74c3c;display:block;";
    document.getElementById("email").style = "border-bottom-color:#e74c3c";
    return false;
  }
  // If we've gotten this far, everything's valid!
  return true;
}

