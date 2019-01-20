<?php
// $base = "";
// $data = array(
//     'house-select' => $_POST['house-select']
// );
//
// $url = $base . http_build_query($data);
header("index.php?cible=habitation&fonction=accueil&house-select=" . $_POST['house-select']);