  function makeRequest (url, tableau) {

httpRequest = new XMLHttpRequest();


    var nomClient =  document.getElementById('Nom').value;
    alert(nomClient);
    url += "&Nom=" + nomClient;       //concatener l'url



    if (!httpRequest) {                                                                  // verif erreurs
        alert('Abandon, impossible de créer une instance XMLHTP');
        return false;
    }

    httpRequest.onreadystatechange = function()  { alerteContents(httpRequest);};       // fonction qui appel pour utiliser alerteContents cette fonction est appelée quand la requette est termiéne
    httpRequest.open('GET', url, true);
    httpRequest.send(null);


  }

  function alerteContents(httpRequest){

    if (httpRequest.readyState == XMLHttpRequest.DONE){
      if (httpRequest.status == 200) {
        alert(httpRequest.responseText);
    }
  }



  }
