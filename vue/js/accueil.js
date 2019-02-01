let btnAddPass = document.getElementById('link-to-passwd');
let btnAddCgu  = document.getElementById('link-to-cgu');

let popUpAddPass = document.getElementById('forget_passwd');
let popUpAddCgu  = document.getElementById('cgu');

showPopup(btnAddPass, popUpAddPass);
showPopup(btnAddCgu, popUpAddCgu);
modalEscape();

function showPopup(BtnId, PopUpId) {
    BtnId.addEventListener('click', function () {
        PopUpId.style.display = "block";
    });
}

function modalEscape() {
    document.addEventListener('click', function (event) {
        switch (event.target.id) {
            case 'forget_passwd':
                popUpAddPass.style.display = "none";
                break;
            case 'cgu':
                popUpAddCgu.style.display = "none";
                break;
        }
    });
    document.addEventListener("keydown", function (event) {
        if (event.defaultPrevented) {
            return;
        }
        if (event.keyCode === 27) {
            popUpAddPass.style.display = "none";
            popUpAddCgu.style.display  = "none";
        }
    });
}

let psswd       = document.getElementById('password-utilisateur');
let psswdCheck  = document.getElementById('password-utilisateur2');
// At least 1 lowercase, 1 uppercase, 1 numeric, and 8 character
var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})");

psswd.addEventListener("keyup", function () {
    let res = strongRegex.test(this.value);
    if (res) {
        this.style.borderColor = "#72F695";
        this.style.borderWidth = "2px";
    } else {
        this.style.borderColor = "#FA6A6A";
        this.style.borderWidth = "2px";
    }
});
psswdCheck.addEventListener("keyup", function () {
    if (this.value === psswd.value || this.value === null) {
        this.style.borderColor = "#72F695";
        this.style.borderWidth = "2px";
    } else {
        this.style.borderColor = "#FA6A6A";
        this.style.borderWidth = "2px";
    }
});