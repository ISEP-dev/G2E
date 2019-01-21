<!-- <form method="post" autocomplete="off">
    <input type="text" placeholder="Numéro client" id="search-client" name="search-client" style="margin-left: 50px" autofocus>
    <div class="triangle-up"></div>
    <div id="result-search-client" class="triangle"></div>
</form> -->
<script src="vue/js/planning.js" async></script>
<br><br>
<div class="ligne">
    <div class="col-gauche">
        <div class="rdv">
            <div class="sticky-header-rendezvous">
                <label for="calendrier">Selectionner une date :</label>
                    <input id="calendrier" type="date" name="date">
                <hr>
            </div>
            <div id="today-ticket"></div>
        </div>
    </div>

    <div class="col-droite">
        <h1 class="centre">Gestion des tickets</h1>
        <div id="info-ticket"></div>
    </div>
</div>
