// Variables

// Functions
// --Show/Hide password
function ShowPass() {
    var x = document.getElementById("SignUp_Pass_Input");

    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }

}