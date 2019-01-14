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

function updateStatusArroseur(element) {
    let arroseurId = element.getAttribute("for").substring(element.getAttribute("for").indexOf('a') + 1);
    let zoneId     = element.getAttribute("for").substring(1, element.getAttribute("for").indexOf('-'));
    let checked;

    if (document.getElementById(element.getAttribute("for")).checked === true) {
        checked = 0;
    } else {
        checked = 1;
    }
    let xHttp = new XMLHttpRequest();
    xHttp.open("POST", "modele/updateArroseur.php", true);
    xHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xHttp.send("arroseur=" + arroseurId + "&zone=" + zoneId + "&state=" + checked);
}

function checkSeriallNumber(){
    var inputserial = document.getElementById("arr-num-serie");
    var patt = new RegExp("^DOM\d{5}$");
    var res = patt.test(inputserial);
    if(!res){
        inputserial.style.background="red";
    }
    else{
        inputserial.style.background="transparent";
    }
    
}