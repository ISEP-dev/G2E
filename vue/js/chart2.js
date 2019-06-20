//-----------------récupération des objets canvas, des divs ou on applique le css et des objets selects
var can_haut = document.getElementById("can_haut");
var can_bas  = document.getElementById("can_bas");
var ctx      = document.getElementById("myChart").getContext('2d');
var selectM  = document.getElementById("selectM");
var selectZ  = document.getElementById("selectZ");
var selectA  = document.getElementById("selectA");
var Xaxis    = document.getElementById("Xaxis");

//------------------------------fonction d'ajout et d'effacement des select: pour maisons, zones, arroseurs
function videS(select) {
    opts = select.getElementsByTagName('option');
    // Ne garde que la première option
    // (pour tout supprimer, remplacer 1 par 0
    // dans les deux lignes)
    while (opts[1]) {
        select.removeChild(opts[1]);
    }
}

function ajouteS(select, value) {
    select.options[select.options.length] = new Option(value, value);
}


//----------------------------requete initiale : on charge et affiche les maisons de l'utilisateur
rM = new XMLHttpRequest();
rM.open("post", "controleurs/Stat.php", true);
rM.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
rM.send('fonction=maisons');
rM.onreadystatechange = function () {
    if (rM.readyState == 4 && rM.status == 200) {
        //console.log(this.responseText);
        let res = new Array;
        res     = JSON.parse(this.responseText);
        for (let i = 0; i < res.length; i++) {
            let maison = res[i];
            ajouteS(selectM, maison);
        }
    }
}


//------------------------------------------Lorsqu'une maison est selectionnée on charge et affiche les zones-------------------------
function changingM() {
    rZ = new XMLHttpRequest();
    rZ.open("post", "controleurs/Stat.php", true);
    rZ.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    let m                 = "fonction=zones&maison=" + selectM.value;
    rZ.onreadystatechange = function () {
        if (rZ.readyState == 4 && rZ.status == 200) {
            videS(selectZ);
            let result = JSON.parse(this.responseText);
            for (let i = 0; i < result.length; i++) {
                let zone = result[i];
                ajouteS(selectZ, zone);
            }
        }
    }
    rZ.send(m);
}

//----------------------------------------Lorsqu'une zone est selectionné on charge et affiche les arroseurs----------------------
function changingZ() {
    rA = new XMLHttpRequest();
    rA.open("post", "controleurs/Stat.php", true);
    rA.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    let m                 = "fonction=arroseurs&zone=" + selectZ.value;
    rA.onreadystatechange = function () {
        if (rA.readyState == 4 && rA.status == 200) {
            videS(selectA);
            let result = JSON.parse(this.responseText);
            for (let i = 0; i < result.length; i++) {
                let arroseur = result[i];
                ajouteS(selectA, arroseur);
            }
        }
    }
    rA.send(m);
}


//---------------------------graphique -------------------------------------


var Xdata   = ["semaine 1", "semaine 2", "semaine 3"];
var Ydata   = [4, 5, 2];
var titre   = "votre consommation ce mois ci";
var myChart = new Chart(ctx, {

    type: 'line',

    data: {
        labels: Xdata,

        datasets: [
            {
                label: titre,
                data: Ydata
            }]
    },


    options: {
        responsive: true,
        aspectRatio: 1.6,
        //maintainAspectRatio:true, //---------------------NE PAS CHANGER ou decommenter----


        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }


});

function addData(chart, label, data) {
    chart.data.labels.push(label);
    chart.data.datasets.forEach((dataset) => {
        dataset.data.push(data);
    });
    chart.update();
}

function removeData(chart) {
    chart.data.labels.pop();
    chart.data.datasets.forEach((dataset) => {
        dataset.data.pop();
    });
    chart.update();
}

function clickingGraph() {
    let x = "stat_arroseur";
    let y = Xaxis.value;
    rG    = new XMLHttpRequest();
    rG.open("post", "controleurs/Stat.php", true);
    rG.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    let m                 = "fonction=stat&Xaxis=" + x + "&Yaxis=" + y;
    rG.send(m);
    rG.onreadystatechange = function () {
        if (rG.readyState === 4 && rG.status === 200) {
            let result = JSON.parse(this.responseText);
            //alert(result);
            console.log(result);
            for (let j = -1; j < Ydata.length+1; j++) {
                removeData(myChart);
            }
            
            Xdata = JSON.parse(result['Xaxis']);
            Ydata = JSON.parse(result['Yaxis']);
            titre = JSON.parse(result['Titre']);

            /*console.log(titre)
            console.log(Xaxis);
            console.log(Yaxis);*/
            for (let i = Ydata.length-1; i >= 0; i--) {

                addData(myChart, Xdata[i], Ydata[i]);
            }
            myChart.data.datasets[0].label = titre;

            myChart.update();
        }
    }
}

//--------------------------------fonction pour le respnsive des divs-------------------------

window.onresize = function () {
    Rsize();
}

function Rsize() {

    var hauteur_haut     = can_haut.offsetHeight;
    can_bas.style.height = hauteur_haut + "px";


}

Rsize(); //------------calibrage des divs au 1er chargement-----------------------

//-------------------------impression et exportation-----------------------------
function clickingExport() {
    var tab        = [Xdata, Ydata];
    //alert(tab);
    let csvContent = "data:text/csv;charset=UTF-8," + "\uFEFF";
    tab.forEach(function (row) {
        let rowb = row.join(",");
        csvContent += rowb + "\r\n";

    });
    var encodedUri        = encodeURI(csvContent);
    var downloadLink      = document.createElement("a");
    downloadLink.href     = encodedUri;
    downloadLink.download = "consommation.csv";
    document.body.appendChild(downloadLink);
    downloadLink.click();
    document.body.removeChild(downloadLink);
}

function clickingPrint() {
    window.print();
}