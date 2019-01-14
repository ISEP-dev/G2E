let dateSelect = document.getElementById('calendrier');

dateSelect.addEventListener("change", function(){
    console.log(dateSelect.value);
    let xhr = new XMLHttpRequest();
    xhr.open('POST', "modele/gettickets.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("date=2018-11-19");
    xhr.addEventListener("readystatechange", function(){
        if(this.readyState === 4 && this.status === 200){
            let result = document.getElementById('result');
            console.log(this.responseText[0]);
        }
    });
});


 