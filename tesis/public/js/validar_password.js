var pass = document.getElementById('password');
var pass_conf = document.getElementById('password_conf');

pass_conf.onkeyup = function () {
    let pass1 = pass.value;
    let pass2 = pass_conf.value;

    if (pass1) {
        if (pass1 == pass2) {
            pass_conf.className = "form-control has-feedback-left is-valid"
        } else {
            pass_conf.className = "form-control has-feedback-left is-invalid"
        }
    }
}

pass.onkeyup = function () {
    let pass1 = pass.value;
    let pass2 =pass_conf.value;

    if (pass2) {
        if (pass1 == pass2) {
            pass_conf.className = "form-control has-feedback-left is-valid"
        } else {
            pass_conf.className = "form-control has-feedback-left is-invalid"
        }
    }
}