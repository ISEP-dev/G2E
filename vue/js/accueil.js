let btnAddPass    = document.getElementById('link-to-passwd');
let btnAddCgu     = document.getElementById('link-to-cgu');

let popUpAddPass    = document.getElementById('forget_passwd');
let popUpAddCgu = document.getElementById('cgu');

showPopup(btnAddPass , popUpAddPass);
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
            popUpAddCgu.style.display = "none";
        }
    });
}
