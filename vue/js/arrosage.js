let PopUpMaison   = document.getElementById('add-maison');
let PopUpArroseur = document.getElementById('add-arroseur');
let btnAddHouse   = document.getElementById('add-house-userID');

let close = document.getElementsByClassName('close');
for (let i = 0; i < close.length; i++) {
    let btnClose = close.item(i);
    btnClose.addEventListener("click", function () {
        PopUpArroseur.style.display = "none";
        PopUpMaison.style.display   = "none";
    });
}

/*
 * Ouverture et fermeture du popup d'ajout de maison et d'arroseurs
 */
btnAddHouse.addEventListener('click', function () {
    PopUpMaison.style.display = "block";
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