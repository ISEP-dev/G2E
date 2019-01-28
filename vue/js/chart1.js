//-----------------gérer le raffraichissement du graphe
var selectX = document.getElementById("Xaxis");
var selectY = document.getElementById("Yaxis");

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

function clickingRefresh() {
    let x = selectX.value;
    let y = selectY.value;
    rG    = new XMLHttpRequest();
    rG.open("post", "controleurs/Stat.php", true);
    rG.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    let m                 = "fonction=stat_temp&Xaxis=" + x + "&Yaxis=" + y;
    rG.send(m);
    rG.onreadystatechange = function () {
        if (rG.readyState == 4 && rG.status == 200) {
            for (let j = 0; j < 20; j++) {
                removeData(myChart);
            }
            let result = JSON.parse(this.responseText);
            console.log(result);
            Xaxis = JSON.parse(result['Xaxis']);
            Yaxis = JSON.parse(result['Yaxis']);
            titre = JSON.parse(result['Titre']);

            /*console.log(titre)
            console.log(Xaxis);
            console.log(Yaxis);*/
            for (let i = 0; i < Yaxis.length; i++) {

                addData(myChart, Xaxis[i], Yaxis[i]);
            }
            myChart.data.datasets[0].label = titre;

            myChart.update();


        }
    };
}


//------------------------------Le graphique---------------------------------------------
var Xaxis  = ["0"];
var Yaxis  = [1];
var titre  = "test";
var ctx    = document.getElementById("myChart").getContext('2d');
var aspecR = 1.3;

var myChart = new Chart(ctx, {

    type: 'line',

    data: {
        labels: Xaxis,

        datasets: [
            {
                label: titre,
                data: Yaxis
            }]
    },


    options: {
        responsive: true,
        aspectRatio: aspecR,
        maintainAspectRatio: true,


        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }


});

//--------------------------------------Initialisation du graphique----------------------
r = new XMLHttpRequest();
r.open("post", "controleurs/Stat.php", true);
r.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
m                    = "fonction=stat_temp&Xaxis=toujours&Yaxis=maisons";
r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
        for (let j = 0; j < 20; j++) {
            removeData(myChart);
        }
        let result = JSON.parse(this.responseText);
        console.log(result);
        Xaxis = JSON.parse(result['Xaxis']);
        Yaxis = JSON.parse(result['Yaxis']);
        titre = JSON.parse(result['Titre']);
        console.log(titre)
        console.log(Xaxis);
        console.log(Yaxis);

        for (let i = 0; i < Yaxis.length; i++) {
            addData(myChart, Xaxis[i], Yaxis[i]);

        }
        myChart.data.datasets[0].label = titre;
        myChart.update();

    }


}
r.send(m);


//------------------------------Redimensionnement, imprimer et exporter----------------
window.onresize = function () {

    Rsize();
}

function Rsize() {
    var largeur_haut      = can_haut.offsetWidth;
    can_haut.style.height = largeur_haut * 1 / aspecR + "px";
}

Rsize();


function clickingExport() {
    var tab        = [Xaxis, Yaxis];
    let csvContent = "data:text/csv;charset=UTF-8," + "\uFEFF";
    tab.forEach(function (row) {
        let rowb = row.join(",");
        csvContent += rowb + "\r\n";

    });
    var encodedUri        = encodeURI(csvContent);
    var downloadLink      = document.createElement("a");
    downloadLink.href     = encodedUri;
    downloadLink.download = titre + ".csv";
    document.body.appendChild(downloadLink);
    downloadLink.click();
    document.body.removeChild(downloadLink);
}

function clickingPrint() {
    window.print();
}
