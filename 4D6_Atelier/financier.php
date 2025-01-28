<?php
include('biblio.php');  

EnteteHTML("Fin", "Financier 2025", "Prêt");
Principale();
Pieds();


//-----------------------------------------------------------------------

//--------------------------------------------
//
//--------------------------------------------
function saisirParametres()
{
    global $dette;
    global $tauxIntAn;
    
    echo "
    <h3>Fournissez les paramètres du calcul:</h3>
    <form>
        Dette:<input name='dette'><br>
        Taux intérêt annuel : <input name='tauxIntAn'><br>
        détails<input type='checkbox' name='details'> <br>
        <input type='submit' name='calculer'> <br>
    </form>";
}

//--------------------------------------------
//
//--------------------------------------------

function Principale()
{
  global $dette; 
  global $tauxIntAn; 

 
  saisirParametres();
  if (isset( $_GET['calculer'] ))
  {
     calcul();
  }  
  retour();
}

//--------------------------------------------
//
//--------------------------------------------
function calcul()
{

  $dette = $_GET['dette'];
  $tauxIntAn = $_GET['tauxIntAn'];
  $afficher = false;
  if (isset($_GET['details']))
     $afficher = true;


  $detteResiduelle = $dette;
 
  $iter = 0;
  $intCum = 0;
  $paieCum = 0;


  if ($afficher)
     echo "
   <table class='table table-border'>"; 



  while ($detteResiduelle > 5)
  {
    $iter++;
    $paieMin = $detteResiduelle * 0.04;
    $intMens = ( $tauxIntAn * $detteResiduelle )/12;
    $rembCourant = $paieMin - $intMens;

    $detteResiduelle -= $rembCourant;

    $intCum += $intMens;
    $paieCum += $paieMin;


    if ($afficher)
    {
      echo "<tr>";
      echo "<td>" . $iter . "</td>";  
      echo "<td>" . number_format($detteResiduelle+$intMens, 2, '.', ' ' ) . "</td>" ;
      echo "<td>" . number_format($paieMin, 2, '.', ' ' ) . "</td>" ;
      echo "<td>" . number_format($intMens, 2, '.', ' ' ) . "</td>" ;
      echo "<td>" . number_format($rembCourant, 2, '.', ' ' ) .  "</td>" ;
      echo "<td>" . number_format($detteResiduelle, 2, '.', ' ' ) . "</td>" ; 
      echo "</tr>" ;
   }
 }
   if ($afficher)
      echo "</table>"; 

    echo "<h1>En " . number_format(($iter/12), 2, ",", " ") . "ans, Nous avons remboursé $dette$ avec " . number_format($paieCum, 2, '.', ' ' ) . "(int tot: " . number_format($intCum, 2, '.', ' ' ) .")</h1>";
}





?>