<?php
include('BDService.php');

var_dump($_SESSION);
die();

if (isset($_SESSION['croyant']))
{
    $nomCroyant = $_SESSION['croyant'];
    EnteteHTML("Confess", "Confessionnal 25",  "Bienvenue $nomCroyant");
    AfficherHistorique();
}
else
{
    die("<h1>Tentative de piratage</h1>");
}

Pieds();



//=----------------------------------------------

function AfficherHistorique()
{
    echo "
    <h2>Historique de vos aveux</h2>
    <table>
      <tr>
        <td><h1>J ai battu mon petit frère</h1></td>
      </tr>
    <a href = 'http://localhost/4D6_Atelier/confessionnal'>Retour</a>"
    ;
}