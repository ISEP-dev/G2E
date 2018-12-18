let PopUpCeder  = document.getElementById('modal-ceder-maison');
let btnCeder  = document.getElementById('ceder-maison');

let closeCeder = document.getElementsByClassName('close');
for (let i = 0; i < closeCeder.length; i++) {
    let btnClose = closeCeder.item(i);
    btnClose.addEventListener("click", function () {
        PopUpCeder.style.display = "none";
    });
}

btnCeder.addEventListener("click", function(){
    PopUpCeder.style.display = "block";
});

function resiliation() {
    confirm("Confirmer votre résiliation");
}
