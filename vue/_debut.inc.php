<?php

echo '
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
"http://www.w3.org/TR/html4/loose.dtd">
<!-- TITRE ET MENUS -->
<html lang="fr">
<head>
<title>Festival</title>
<meta http-equiv="Content-Language" content="fr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/cssGeneral.css" rel="stylesheet" type="text/css">
</head>
<body class="basePage">

<!--  Tableau contenant le titre -->
<table width="100%" cellpadding="0" cellspacing="0">
   <tr> 
      <td class="titre">Festival Sp\'or<br>
      <span id="texteNiveau2" class="texteNiveau2">
      H&eacute;bergement des groupes</span><br>&nbsp;
      </td>
   </tr>
</table>

<!--  Tableau contenant les menus -->
<table width="80%" cellpadding="0" cellspacing="0" class="tabMenu" align="center">
   <tr>
      <td class="menu"><a href="index.php">Accueil</a></td>
      <td class="menu"><a href="listeEtablissements.php">
      Gestion établissements</a></td>
      <td class="menu"><a href="consultationAttributions.php">
      Attributions chambres</a></td>
   </tr>
</table>

<br> 
<table width="80%" cellspacing="0" cellpadding="0" align="center">
   <tr>  
      <td class="texteAccueil">
         Cette application web permet de gérer l&#39;hébergement des groupes de sport 
         durant le festival Sp&#39;or.
      </td>
   </tr>
   <tr>
      <td>&nbsp;
      </td>
   </tr>
   <tr>
      <td class="texteAccueil">
          Elle offre les services suivants :
      </td>
   </tr>
   <tr>
      <td>&nbsp;
      </td>
   </tr>
   <tr>
      <td class="texteAccueil">
      <ul>
         <li>Gérer les établissements (caractéristiques et capacités d&#39;accueil) acceptant d&#39;héberger les participants.
         <p>
	      </p>
         <li>Consulter, réaliser ou modifier les attributions des chambres aux groupes dans les établissements.
      </ul>
      </td>
   </tr>
</table>';

?>


