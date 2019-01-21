let popUpCeder = document.getElementById('modal-ceder-maison');

function cederMaison(idMaison) {
    popUpCeder.style.display = "block";
    document.getElementById('id-maison-ceder').setAttribute('value', idMaison.toString());
}

modalEscape();

function modalEscape() {
    document.addEventListener("click", function (event) {
        switch (event.target.id) {
            case 'modal-ceder-maison':
                popUpCeder.style.display = "none";
                break;
        }
    });
    document.addEventListener("keydown", function (event) {
        if (event.defaultPrevented) {
            return;
        }
        if (event.keyCode === 27) {
            popUpCeder.style.display = "none";
        }
    });
}

function resiliation() {
    if (confirm("Confirmer votre résiliation")) {
        alert("résilié");
    } else {
        alert("abandonné");
    }
}

function showHouseInfo(idMaison) {
    if (idMaison !== null) {
        let xHttp = new XMLHttpRequest();
        xHttp.open("POST", "index.php?cible=habitation&fonction=get-house-info", true);
        xHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xHttp.send("idmaison=" + idMaison.toString());
        xHttp.addEventListener("readystatechange", function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("info-maison").innerHTML = this.responseText;
            }
        });
    } else {
        document.getElementById("info-maison").innerHTML = "";
    }
}