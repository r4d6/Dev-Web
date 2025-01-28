<?php
include('BDService.php');

EnteteHTML("Confess", "Confessionnal 25", "Connectez vous");

if (modeValidation())
{
    if (connexionValide())
    {
       $_SESSION['croyant'] = $_POST['nomCroyant'];
       //var_dump($_SESSION);
       //die();
       header('location:accueil.php');
    }
    else
    {
        echo "<h2>Erreur de connexion</h2>";
    }
}
else
{
   AfficherFormConnexion();
}

Pieds();



//------------------------------------------------


function connexionValide()
{
    $bd = new BDService();

    $sel = "select motDePasse from croyants where nom = '" . $_POST['nomCroyant'] . "'";
    $tabMdp = $bd->selection($sel);


    if ($tabMdp[0]['motDePasse'] == $_POST['motDePasse'])
    {
        
        return true;
    }
    return false;
}


function AfficherFormConnexion()
{
    echo "
    <form method='post'>
       Nom du croyant: <input name='nomCroyant'><br>
       Mot de passe: <input name='motDePasse'><br>
       <input type='submit' name='soumission'><br>
       <a href='creationCompte.php'>Créer un compte</a>;
    </form>
    ";
}

function modeValidation()
{
   return isset($_POST['soumission']);
}