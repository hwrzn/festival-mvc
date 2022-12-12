<?php

require 'template.php';

// AFFICHER L'ENSEMBLE DES ÉTABLISSEMENTS
// CETTE PAGE CONTIENT UN TABLEAU CONSTITUÉ D'1 LIGNE D'EN-TÊTE ET D'1 LIGNE PAR
// ÉTABLISSEMENT

echo "
<table width='70%' cellspacing='0' cellpadding='0' align='center' 
class='tabNonQuadrille'>
   <tr class='enTeteTabNonQuad'>
      <td colspan='4'>Etablissements</td>
   </tr>";
     
   $connexion = $model->connect();
   $req = $model->obtenirReqEtablissements();
   $rsEtab = $connexion->query($req);
   $lgEtab = $rsEtab->fetch(PDO::FETCH_ASSOC);
   // BOUCLE SUR LES ÉTABLISSEMENTS
   while ($lgEtab!=FALSE)
   {
      $id=$lgEtab['id'];
      $nom=$lgEtab['nom'];
      echo "
		<tr class='ligneTabNonQuad'>
         <td width='52%'>$nom</td>
         
         <td width='16%' align='center'> 
         <a href='index.php?action=detailEtablissement&id=$id'>
         Voir détail</a></td>
         
         <td width='16%' align='center'> 
         <a href='index.php?action=modificationEtablissement&id=$id&action=demanderModifEtab'>
         Modifier</a></td>";
      	
         // S'il existe déjà des attributions pour l'établissement, il faudra
         // d'abord les supprimer avant de pouvoir supprimer l'établissement
			if (!($model->existeAttributionsEtab($connexion, $id)))
			{
            echo "
            <td width='16%' align='center'> 
            <a href='index.php?action=supressionEtablissement&id=$id&action=demanderSupprEtab'>
            Supprimer</a></td>";
         }
         else
         {
            $attribution = $model->obtenirNbOccup($connexion, $id);
            echo "
            <td width='16%'>&nbsp;($attribution Chambres)</td>";
			}
			echo "
      </tr>";
      $lgEtab = $rsEtab->fetch(PDO::FETCH_ASSOC);
   }
   echo "
   <tr class='ligneTabNonQuad'>
      <td colspan='4'><a href='index.php?action=creationEtablissement&action=demanderCreEtab'>
      Création d'un établissement</a ></td>
  </tr>
</table>";

?>