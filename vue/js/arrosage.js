let PopUpMaison   = document.getElementById('modal-add-maison');
let PopUpZone     = document.getElementById('modal-add-zone');
let PopUpArroseur = document.getElementById('modal-add-arroseur');

let btnAddHouse    = document.getElementById('add-house');
let btnAddZone     = document.getElementById('add-zone');
let btnAddArroseur = document.getElementById('add-arroseur');
let close          = document.getElementsByClassName('close');

btnAddHouse.addEventListener('click', function () {
    PopUpMaison.style.display = "block";
});

btnAddZone.addEventListener('click', function () {
    document.getElementById('modal-add-zone').style.display = "block";
});

btnAddArroseur.addEventListener('click', function () {
    PopUpArroseur.style.display = "block";
});

for (let i = 0; i < close.length; i++) {
    let btnClose = close.item(i);
    btnClose.addEventListener("click", function () {
        PopUpArroseur.style.display = "none";
        PopUpMaison.style.display   = "none";
        PopUpZone.style.display     = "none";
    });
}

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

let btnAddArroseurs = document.getElementsByClassName('add');
for (let i = 0; i < btnAddArroseurs.length; i++) {
    let bouton = btnAddArroseurs.item(i);
    bouton.addEventListener("click", function () {
        const idHouse            = bouton.id.substring(8);
        let xhttp                = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("test").innerHTML = idHouse;
            }
        };
        xhttp.open("POST", "index.php?cible=habitation&fonction=accueil", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("idHouse=" + idHouse);
        console.log(idHouse);
        PopUpArroseur.style.display = "block";
    });
}

function onSelectHouseChange() {
    document.getElementById('form-house-select').submit();
    // let selectedItem = document.getElementById('house-select').value;
    // let xhr = new XMLHttpRequest();
    // xhr.open("POST", "index.php?cible=Habitation&fonction=update-view", true);
    // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // xhr.send("&id_habit=" + selectedItem);
    // console.log(selectedItem);
}
