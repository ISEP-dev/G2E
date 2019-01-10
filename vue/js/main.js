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

let search                 = document.getElementById('search-client'),
    searchResult           = document.getElementById('result-search-client'),
    triangle               = document.getElementsByClassName('triangle-up')[0];
searchResult.style.display = "none";
triangle.style.display     = "none";

search.addEventListener("keyup", function () {
    if (search.value.length !== 0) {
        searchResult.style.display = "block";
        triangle.style.display     = "block"
    } else {
        searchResult.style.display = "none";
        triangle.style.display     = "none"
    }
    let xhr = new XMLHttpRequest();
    xhr.open('GET', 'modele/searchClient.php?term=' + search.value, true);
    xhr.addEventListener('readystatechange', function () {
        if (this.readyState === 4 && this.status === 200) {
            let result = JSON.parse(this.responseText);
            let buffer = "";
            for (let i = 0; i < result.length; i++) {
                let client = result[i];
                buffer += "<li class='dropdown-search-client'><a href='#"+client.link+"'>"+client.label+"</a></li>";
            }
            searchResult.innerHTML = buffer;
        }
    });
    xhr.send();
});