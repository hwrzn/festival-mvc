<?php

require 'template.php';

// SUPPRIMER UN ÉTABLISSEMENT 

$connexion = $model->connect();
$id = $_REQUEST['id'];  

$lgEtab = $model->obtenirDetailEtablissement($connexion, $id);
$nom = $lgEtab['nom'];

// Cas 1ère étape (on vient de listeEtablissements.php)

if ($_REQUEST['action'] == 'demanderSupprEtab')    
{
   echo "
   <br><center><h5>Souhaitez-vous vraiment supprimer l'établissement $nom ? 
   <br><br>
   <a href='index.php?action=supressionEtablissement&action=validerSupprEtab&id=$id'>
   Oui</a>&nbsp; &nbsp; &nbsp; &nbsp;
   <a href='index.php?action=listeEtablissements'>Non</a></h5></center>";
}

// Cas 2ème étape (on vient de suppressionEtablissement.php)

else
{
   $model->supprimerEtablissement($connexion, $id);
   echo "
   <br><br><center><h5>L'établissement $nom a été supprimé</h5>
   <a href='index.php?action=listeEtablissements'>Retour</a></center>";
}

?>
