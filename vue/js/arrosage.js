let popUpMaison         = document.getElementById('modal-add-maison');
let popUpZone           = document.getElementById('modal-add-zone');
let popUpArroseur       = document.getElementById('modal-add-arroseur');
let popUpDeleteHouse    = document.getElementById('modal-delete-maison');
let popUpDeleteZone     = document.getElementById('modal-delete-zone');
let popUpDeleteArroseur = document.getElementById('modal-delete-arroseur');

let btnAddHouse    = document.getElementById('add-house');
let btnAddZone     = document.getElementById('add-zone');
let btnDeleteHouse = document.getElementById('delete-maison');

if (typeof btnAddHouse !== "undefined") {
    showPopup(btnAddHouse, popUpMaison);
}
showPopup(btnAddZone, popUpZone);
showPopup(btnDeleteHouse, popUpDeleteHouse);
modalEscape();

function showPopup(BtnId, PopUpId) {
    BtnId.addEventListener('click', function () {
        PopUpId.style.display = "block";
    });
}

closePopup(document.getElementsByClassName('close'));

function closePopup(nbBtnClass) {
    for (let i = 0; i < nbBtnClass.length; i++) {
        let btnClose = nbBtnClass.item(i);
        btnClose.addEventListener("click", function () {
            // Close button need to be 4 child from modalId
            document.getElementById(btnClose.parentNode.parentNode.parentNode.parentNode.id).style.display = "none";
        });
    }
}


function modalEscape() {
    document.addEventListener("click", function (event) {
        switch (event.target.id) {
            case 'modal-add-maison':
                popUpMaison.style.display = "none";
                break;
            case 'modal-add-zone':
                popUpZone.style.display = "none";
                break;
            case 'modal-add-arroseur':
                popUpArroseur.style.display = "none";
                break;
            case 'modal-delete-maison':
                popUpDeleteHouse.style.display = "none";
                break;
            case 'modal-delete-zone':
                popUpDeleteZone.style.display = "none";
                break;
        }
    });
    document.addEventListener("keydown", function (event) {
        if (event.defaultPrevented) {
            return;
        }
        if (event.keyCode === 27) {
            popUpArroseur.style.display    = "none";
            popUpMaison.style.display      = "none";
            popUpZone.style.display        = "none";
            popUpDeleteHouse.style.display = "none";
            popUpDeleteZone.style.display  = "none";
        }
    });
}

function deleteZone(element) {
    document.getElementById("zone-id-delete-zone").setAttribute('value', element.dataset.idzone);
    popUpDeleteZone.style.display = "block";
}

function deleteArroseur(element) {
    document.getElementById("arr-id-delete-arr").setAttribute('value', element.dataset.idarr);
    popUpDeleteArroseur.style.display = "block";
}

function addArroseur(element) {
    document.getElementById('zone-id-add-arr').setAttribute('value', element.id.substring(14));
    popUpArroseur.style.display = "block";
}

function onSelectHouseChange(element) {
    document.getElementById('form-house-select').submit();
    // let xHttp = new XMLHttpRequest();
    // xHttp.open("POST", "modele/changeHouse.php", true);
    // xHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // xHttp.send("house-select=" + element.options[element.selectedIndex].value);
}

function updateStatusArroseur(element) {
    let arroseurId = element.getAttribute("for").substring(element.getAttribute("for").indexOf('a') + 1);
    let zoneId     = element.getAttribute("for").substring(1, element.getAttribute("for").indexOf('-'));
    let checked    = document.getElementById(element.getAttribute("for")).checked;

    if (checked === true) {
        checked = 0;
    } else {
        checked = 1;
    }
    let xHttp = new XMLHttpRequest();
    xHttp.open("POST", "modele/updateArroseur.php", true);
    xHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xHttp.send("arroseur=" + arroseurId + "&zone=" + zoneId + "&state=" + checked);
}

function checkSeriallNumber() {
    let element = document.getElementById("arr-num-serie");
    let patt    = new RegExp("^DOM\\d{5}$");
    let res     = patt.test(element.value);
    if (!res) {
        element.style.background = "#FA6A6A";
    } else {
        element.style.background = "#72F695";
    }

}

function updateAvailableCapteurArroseur(element) {
    let idArroseur  = document.getElementById("id-arr").dataset.idarr;
    let idCapteur   = element.id.substring(17);
    let etatCapteur = element.checked;
    if (etatCapteur === true) {
        etatCapteur = 1;
    } else {
        etatCapteur = 0;
    }
    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "modele/addCapteurToArroseur.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("arroseur=" + idArroseur + "&capteur=" + idCapteur + "&state=" + etatCapteur);
}