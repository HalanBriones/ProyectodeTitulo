var pass = document.getElementById('pass1');
var pass_conf = document.getElementById('pass2');

pass_conf.onkeyup = function () {
    let p1 = pass.value;
    let p2 = pass_conf.value;

    if (p1) {
        if (p1 == p2) {
            pass_conf.className = "form-control has-feedback-left is-valid"
        } else {
            pass_conf.className = "form-control has-feedback-left is-invalid"
        }
    }
}

pass.onkeyup = function () {
    let p1 = pass.value;
    let p2 = pass_conf.value;

    if (p2) {
        if (p1 == p2) {
            pass_conf.className = "form-control has-feedback-left is-valid"
        } else {
            pass_conf.className = "form-control has-feedback-left is-invalid"
        }
    }
}
