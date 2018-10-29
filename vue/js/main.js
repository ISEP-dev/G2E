var modalMaison   = document.getElementsByClassName('modal')[0];
var btnModalClose = document.getElementsByClassName('close')[0];
var btnModalOpen  = document.getElementById('test');

function test() {
    // alert("Hi !");
    //document.body.style.backgroundColor = "red";
}
function modalOpen(){
    modalMaison.style.display ="block";
}
function modalClose() {
    modalMaison.style.display = "none";
}
btnModalOpen.addEventListener('click', modalOpen);
btnModalClose.addEventListener('click', modalClose);
