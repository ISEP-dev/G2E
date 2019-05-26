let popUpMaison         = document.getElementById('modal-add-maison');
let popUpZone           = document.getElementById('modal-add-zone');
let popUpArroseur       = document.getElementById('modal-add-arroseur');
let popUpDeleteHouse    = document.getElementById('modal-delete-maison');
let popUpDeleteZone     = document.getElementById('modal-delete-zone');
let popUpDeleteArroseur = document.getElementById('modal-delete-arroseur');
let popUpAddProgram     = document.getElementById('modal-add-program');
let popUpAddCapteur     = document.getElementById('modal-add-capteur');
let popUpDeleteCapteur  = document.getElementById('modal-delete-capteur');

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
        switch (event.target.getAttribute('id')) {
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
            case 'modal-add-program':
                popUpAddProgram.style.display = "none";
                break;
            case 'modal-add-capteur':
                popUpAddCapteur.style.display = "none";
                break;
            case 'modal-delete-capteur':
                popUpAddCapteur.style.display = "none";
                break;
        }
    });
    document.addEventListener("keydown", function (event) {
        if (event.defaultPrevented) {
            return;
        }
        if (event.key === "Escape") {
            popUpArroseur.style.display      = "none";
            popUpMaison.style.display        = "none";
            popUpZone.style.display          = "none";
            popUpDeleteHouse.style.display   = "none";
            popUpDeleteZone.style.display    = "none";
            popUpAddProgram.style.display    = "none";
            popUpAddCapteur.style.display    = "none";
            popUpDeleteCapteur.style.display = "none";
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

function addCapteur() {
    popUpAddCapteur.style.display = "block";
}

function deleteCapteur(element) {
    document.getElementById('delete-type-capt').value   = element.dataset.type.substring(0, 1);
    document.getElementById('delete-number-capt').value = element.dataset.type.substring(2);
    popUpDeleteCapteur.style.display                    = "block";
}

function onSelectHouseChange(element) {
    document.getElementById('form-house-select').submit();
    // let xHttp = new XMLHttpRequest();
    // xHttp.open("POST", "index.php?cible=habitation&fonction=accueil", true);
    // xHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // xHttp.send("house-select=" + element.options[element.selectedIndex].value);
}

function updateStatusArroseur(element) {
    let arroseurId = element.getAttribute("for").substring(element.getAttribute("for").indexOf('a') + 1);
    let zoneId     = element.getAttribute("for").substring(1, element.getAttribute("for").indexOf('-'));
    let checked    = document.getElementById(element.getAttribute("for")).checked;

    if (checked === true) {
        checked = 0;
        window.createNotification({
            positionClass: 'nfc-top-center',
            showDuration: 2500,
            theme: 'warning'
        })({
            message: 'Arroseur éteint'
        });
    } else {
        checked = 1;
        window.createNotification({
            positionClass: 'nfc-top-center',
            showDuration: 2500,
            theme: 'success'
        })({
            message: 'Arroseur allumé'
        });
    }
    let xHttp = new XMLHttpRequest();
    xHttp.open("POST", "index.php?cible=habitation&fonction=update-arroseur", true);
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
        window.createNotification({
            positionClass: 'nfc-top-center',
            showDuration: 2000,
            theme: 'success'
        })({
            message: 'Capteur ajouté'
        });
    } else {
        etatCapteur = 0;
        window.createNotification({
            positionClass: 'nfc-top-center',
            showDuration: 2000,
            theme: 'warning'
        })({
            message: 'Capteur supprimé'
        });
    }
    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "index.php?cible=habitation&fonction=add-capteur-to-arroseur", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("arroseur=" + idArroseur + "&capteur=" + idCapteur + "&state=" + etatCapteur);
}

function addProgram(idArroseur) {
    document.getElementById('arr-id-add-program').setAttribute('value', idArroseur);
    popUpAddProgram.style.display               = "block";
    document.getElementById("date-end").value   = new Date();
    document.getElementById("date-start").value = new Date();
}

function checkDatePorgramme() {
    let xHttp = new XMLHttpRequest();
    xHttp.open("POST", "index.php?cible=habitation&fonction=check-program-date", true);
    xHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xHttp.send();
    xHttp.addEventListener("readystatechange", function () {
        if (this.readyState === 4 && this.status === 200) {
            let numOfArroseur = this.responseText.count("}");
            let jsonObject    = JSON.parse(this.responseText);
            for (let i = 0; i < numOfArroseur; i++) {
                let etat     = jsonObject[i].etat;
                let zone     = jsonObject[i].zone;
                let arroseur = jsonObject[i].arroseur;
                console.log("zone: " + zone + ", arroseur: " + arroseur + ", etat: " + etat);
                if (etat === "on") {
                    console.log("Arroseur ON");
                    document.getElementById("z" + zone + "-a" + arroseur).checked = true;
                } else if (jsonObject.etat === "off") {
                    console.log("Arroseur OFF");
                    document.getElementById("z" + zone + "-a" + arroseur).checked = false;
                }
            }
        }
    });
}

// setInterval(checkDatePorgramme, 1000);

String.prototype.count = function (str) {
    return (this.length - this.replace(new RegExp(str, "g"), '').length) / str.length;
};

let btnsClose = document.getElementsByClassName('block-close');

for (let i = 0; i < btnsClose.length; i++) {
    let btnClose = btnsClose.item(i);
    btnClose.addEventListener("click", function () {
        console.log('test');
    });
}

function changePlaceholderCapteurName(element) {
    document.getElementById('name-capt').placeholder = element.options[element.selectedIndex].text;
    document.getElementById('name-capt').value       = element.options[element.selectedIndex].text;
    let xHttp                                        = new XMLHttpRequest();
    xHttp.open("POST", "index.php?cible=habitation&fonction=update-capteur-number", true);
    xHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xHttp.send("id_arr=" + element.dataset.id + "&type-capt=" + element.options[element.selectedIndex].value);
    xHttp.addEventListener("readystatechange", function () {
        if (this.readyState === 4 && this.status === 200) {
            let sum                                                     = (+this.responseText) + 1;
            document.getElementById('input-add-capteur-nb').value       = sum;
            document.getElementById('input-add-capteur-nb').placeholder = sum;
        }
    });
}
