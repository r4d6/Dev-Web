<?php

session_start();

define('SERVEUR', 'localhost');
define('UTILISATEUR', 'root');
define('MOT_DE_PASSE', '');
define('BD', 'confess');

//--------------------------------------------
//
//--------------------------------------------
function EnteteHTML($onglet, $app, $contexte)
{
    echo "
<!DOCTYPE html>
<html lang='fr'>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>$onglet</title>
	<!-- CSS de Bootstrap  -->
	<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM' crossorigin='anonymous'>
  </head>
  <body>";
   EnteteApp($app, $contexte);
}


//--------------------------------------------
//
//--------------------------------------------
function EnteteApp($app, $contexte)
{
     echo '
    <div class="container-fluid">
      <section class="row entete">
        <img src="logo.png" class="col-1" alt="image de joie">
        <h1 class="fonce col-11">' . $app . '</h1>
        <h3>' . $contexte . '</h3>
       </section>';
}

//--------------------------------------------
//
//--------------------------------------------
function Pieds()
{
    $_SESSION = array();
    echo "
    </div>
    <div>
      <hr>
      <a href='http://localhost'>Menu principal</a><br><br>
      &copy; Alain Martel 2025
    </div>
    <link href='maison.css' rel='stylesheet'>
    <script src='maison.js' defer></script>
   </body>
 </html>";
}

//--------------------------------------------
//
//--------------------------------------------
function retour()
{
    echo "<a href='http://localhost'>Retour</a>";
}