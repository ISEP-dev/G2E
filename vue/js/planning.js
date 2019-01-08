let dateSelect = document.getElementById('calendrier');
dateSelect.addEventListener("change", function(){
    console.log(dateSelect.value);
    document.getElementById("form-date").submit();
});


