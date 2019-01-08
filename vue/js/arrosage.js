let PopUpMaison   = document.getElementById('modal-add-maison');
let PopUpZone     = document.getElementById('modal-add-zone');
let PopUpArroseur = document.getElementById('modal-add-arroseur');

let btnAddHouse = document.getElementById('add-house');
let btnAddZone  = document.getElementById('add-zone');

function onSelectPlanteChangeArroseurInfo() {
    document.getElementById('form-plante-select-arr').submit();
}

showPopup(btnAddHouse, PopUpMaison);
showPopup(btnAddZone, PopUpZone);
modalEscape();

function showPopup(BtnId, PopUpId) {
    BtnId.addEventListener('click', function () {
        PopUpId.style.display = "block";
    });
}

function modalEscape() {
    document.addEventListener("click", function (event) {
        switch (event.target.id) {
            case 'modal-add-maison':
                PopUpMaison.style.display = "none";
                break;
            case 'modal-add-zone':
                PopUpZone.style.display = "none";
                break;
            case 'modal-add-arroseur':
                PopUpArroseur.style.display = "none";
                break;
        }
    });
    document.addEventListener("keydown", function (event) {
        if (event.defaultPrevented) {
            return;
        }
        if (event.keyCode === 27) {
            PopUpArroseur.style.display = "none";
            PopUpMaison.style.display   = "none";
            PopUpZone.style.display     = "none";
        }
    });
}


function addArroseur(element) {
    document.getElementById('zone-id').setAttribute('value', element.id.substring(14));
    PopUpArroseur.style.display = "block";
}

function onSelectHouseChange() {
    document.getElementById('form-house-select').submit();
}
