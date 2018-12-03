let PopUpMaison         = document.getElementById('add-maison');
let PopUpArroseur       = document.getElementById('add-arroseur');
let btnPopupCloseMaison = document.getElementById('close-maison');
let btnPopupCloseArr    = document.getElementById('close-arr');
let btnAddHouse         = document.getElementById('add-house-userID');
let btnAddArroseur      = document.getElementById('add-arr-3');

function test() {
    // alert("Hi !");
    //document.body.style.backgroundColor = "red";
}

/*
 * Ouverture et fermeture du popup d'ajout de maison
 */
btnAddHouse.addEventListener('click', function () {
    PopUpMaison.style.display = "block";
});
btnAddArroseur.addEventListener('click', function () {
    PopUpArroseur.style.display = "block";
});
btnPopupCloseMaison.addEventListener('click', function () {
    PopUpMaison.style.display = "none";
});
btnPopupCloseArr.addEventListener('click', function () {
    PopUpArroseur.style.display = "none";
});

function toggleDropdown(id){
    document.getElementById(id).classList.toggle('show');
}
// window.onclick = function(event) {
//     if (!event.target.matches('.btn-dropdown')) {
//         var dropdowns = document.getElementsByClassName("dropdown-content");
//         var i;
//         for (i = 0; i < dropdowns.length; i++) {
//             var openDropdown = dropdowns[i];
//             if (openDropdown.classList.contains('show')) {
//                 openDropdown.classList.remove('show');
//             }
//         }
//     }
// }
