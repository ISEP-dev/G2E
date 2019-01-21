<?php 
$destinataire = "s.petrit@live.fr";
$objet = "message de test";
$message = "corps du message";

echo("avant le mail");
/*echo(phpinfo());*/
echo(mail($destinataire,$objet,$message));
echo("apres le mail");
?>