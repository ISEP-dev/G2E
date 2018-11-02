var modalMaison   = document.getElementsByClassName('modal')[0];
var btnModalClose = document.getElementsByClassName('close')[0];
var btnOpenHouse  = document.getElementById('add-house-userID');

function test() {
    // alert("Hi !");
    //document.body.style.backgroundColor = "red";
}
function openAddHouse(){
    modalMaison.style.display ="block";
}
function closeAddHouse() {
    modalMaison.style.display = "none";
}
btnOpenHouse.addEventListener('click', openAddHouse);
btnModalClose.addEventListener('click', closeAddHouse);
