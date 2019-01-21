var ctx = document.getElementById("myChart").getContext('2d');


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
        responsive: false,
        //aspectRatio:1,
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