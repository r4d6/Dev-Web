<?php
include('BDService.php');

EnteteHTML("Confess", "Confessionnal 25",  "Création de votre compte");


if (modeValidation())
{
    //echo "Mode validation";
    if (valide())
    {
        $_SESSION['croyant'] = $_POST['nomCandidat'];
        $bd = new BDService;
        $ins = "insert into croyants set nom = '" . $_POST['nomCandidat'] . "'
               , motDePasse='" . $_POST['motDePasse'] . "'";
        $bd->insertion($ins); 
        header('location:accueil.php');
    }
    else
    {
        echo "<h2>Erreur</h2>";
    }
}
else
{
   AfficherFormCreationCompte();
}

Pieds();



//=----------------------------------------------


function valide()
{
    $nom = $_POST['nomCandidat'];
    $motDePasse = $_POST['motDePasse'];
    $confirmation  = $_POST['confirmation'];

    if ( strlen($nom)>1 && strlen($motDePasse)>1 && $motDePasse === $confirmation)
       return true;
    return false;

}

function modeValidation()
{
    //var_dump($_POST);
    //die();
    if (isset($_POST['soumission']))
       return true;
    return false;
}


function AfficherFormCreationCompte()
{
    echo "
    <form method='post'>
       Votre nom : <input name='nomCandidat'><br>
       Mot de passe: <input name='motDePasse'><br>
       Confirmation: <input name='confirmation'><br>
       <input type='submit' name='soumission'><br>
    </form>
    <a href = 'http://localhost/4D6_Atelier/confessionnal'>Retour</a>"
    ;
}