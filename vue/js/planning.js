let dateSelect         = document.getElementById('calendrier');
dateSelect.valueAsDate = new Date();


/*let search       = document.getElementById('search-client'),
    searchResult = document.getElementById('result-search-client'),
    triangle     = document.getElementsByClassName('triangle-up')[0];
if (searchResult !== null) {
    searchResult.style.display = "none";
}
if (triangle !== null) {
    triangle.style.display = "none";
}

search.addEventListener("keyup", function () {
    if (search.value.length !== 0) {
        searchResult.style.display = "block";
        triangle.style.display     = "block"
    } else {
        searchResult.style.display = "none";
        triangle.style.display     = "none"
    }
    let xhr = new XMLHttpRequest();
    //xhr.open('GET', 'modele/searchClient.php?term=' + search.value, true);
    xhr.addEventListener('readystatechange', function () {
        if (this.readyState === 4 && this.status === 200) {
            let result = JSON.parse(this.responseText);
            let buffer = "";
            for (let i = 0; i < result.length; i++) {
                let client = result[i];
                buffer += "<li class='dropdown-search-client'><a href='#" + client.link + "'>" + client.label + "</a></li>";
            }
            searchResult.innerHTML = buffer;
        }
    });
    xhr.send();
});*/

dateSelect.addEventListener("change", function () {
    console.log(dateSelect.value);
    let xhr = new XMLHttpRequest();
    xhr.open('POST', "index.php?cible=planning&fonction=get-today-ticket", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("date=" + dateSelect.value.toString());
    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById('today-ticket').innerHTML = this.responseText;
        }
    });
});

function showTicketInfos(idTicket) {
    if (idTicket !== null) {
        let xHttp = new XMLHttpRequest();
        xHttp.open("POST", "index.php?cible=planning&fonction=get-ticket-info", true);
        xHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xHttp.send("idticket=" + idTicket.toString());
        xHttp.addEventListener("readystatechange", function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("info-ticket").innerHTML = this.responseText;
            }
        });
    } else {
        document.getElementById("info-ticket").innerHTML = "";
    }
}