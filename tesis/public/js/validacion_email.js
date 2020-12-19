var email = document.getElementById('email');
var email_vali = document.getElementById('email_validacion');

email_vali.onkeyup = function () {
    let email1 = email.value;
    let email2 = email_vali.value;

    if (email1) {
        if (email1 == email2) {
            email_vali.className = "form-control has-feedback-left is-valid"
        } else {
            email_vali.className = "form-control has-feedback-left is-invalid"
        }
    }
}

email.onkeyup = function () {
    let email1 = email.value;
    let email2 = email_vali.value;

    if (email2) {
        if (email1 == email2) {
            email_vali.className = "form-control has-feedback-left is-valid"
        } else {
            email_vali.className = "form-control has-feedback-left is-invalid"
        }
    }
}