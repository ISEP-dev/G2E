function toggleDropdown(id) {
    document.getElementById(id).classList.toggle('show');
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
