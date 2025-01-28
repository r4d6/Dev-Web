<?php
include('../biblio.php'); 


class BDService
{
    private $bdInterne;


    //---------------------------------------
    //
    //---------------------------------------
    function __construct()
    {
        $this->bdInterne = new mysqli(SERVEUR, UTILISATEUR, MOT_DE_PASSE, BD);

        if (mysqli_connect_errno())
        {
            echo "Erreur de Connexion<br>";
        }
		$this->bdInterne->set_charset("UTF8");
    }

    //---------------------------------------
    //
    //---------------------------------------
    function insertion($req)
    {

        $res = $this->bdInterne->query($req);

        if (!$res)
        {
           die ("Erreur d'insertion<br>");
        }
       
        return $this->bdInterne->insert_id; 
    }

    //---------------------------------------
    //
    //---------------------------------------
    function selection($req)
    {
        $tabEnreg = [];
        $res = $this->bdInterne->query($req);
        if (!$res)
        {
           die ("Erreur de sélection<br>");
        }

        while ( $unEnreg = $res->fetch_array(MYSQLI_ASSOC))
           $tabEnreg[] = $unEnreg;

        return $tabEnreg;   
    }


    
    //---------------------------------------
    //
    //---------------------------------------
    function suppression($req)
    {
        $res = $this->bdInterne->query($req);

        if (!$res)
        {
           die ("Erreur de suprresion<br>");
        }
       
        return $this->bdInterne->affected_rows; 
    }

    
    //---------------------------------------
    //
    //---------------------------------------
    function miseAJour($req)
    {
        $res = $this->bdInterne->query($req);

        if (!$res)
        {
           die ("Erreur de mise à jour<br>");
        }
       
        return $this->bdInterne->affected_rows; 
    }

    //---------------------------------------
    //
    //---------------------------------------
    function neutralise($str)
	{
		//echo "Brut   : $str<br>";
	    $str = $this->bdInterne->real_escape_string($str); 
	    //echo "Epurée : $str<br>";
		
		return $str;
		
	}


}