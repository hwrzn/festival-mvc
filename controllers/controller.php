<?php

  require 'models/model.php';

  class Controller
{
  // ON DEFINIT D'ABORD TOUTES LES FONCTIONS APPELANT DES VUE
  public function accueil()
  {
    include 'views/vueAccueil.php';
  }

  public function listeEtablissements($connexion, $model)
  {
    include 'views/vueListeEtablissements.php';
  }

  public function creationEtablissement($connexion, $model, $errors)
  {
    $modif=$_REQUEST['modif'];
    include 'views/vueCreationEtablissement.php';
  }

  public function modificationEtablissement($connexion, $model, $errors)
  {
    $modif=$_REQUEST['modif'];
    include 'views/vueModificationEtablissement.php';
  }

  public function modificationAttributions($connexion, $model)
  {
    include 'views/vueModificationAttributions.php';
  }

  public function supressionEtablissement($connexion, $model)
  {
    include 'views/vueSupressionEtablissement.php';
  }

  public function detailEtablissement($connexion, $model)
  {
    include 'views/vueDetailEtablissement.php';
  }
    
  public function consultationAttributions($connexion, $model)
  {
    include 'views/vueConsultationAttributions.php';
  }

  public function donnerNbChambres($connexion, $model)
  {
    include 'views/vueDonnerNbChambres.php';
  }

  // PUIS ON DEFINIT LE CONTROLEUR FRONTAL

  public function displayVue($connexion, $model, $errors)
  {
    
    if (isset($_GET['action'])) {
      switch ($_GET['action']) {
        case 'listeEtablissements' :
          $this->listeEtablissements($connexion, $model);
          break;
        case 'consultationAttributions' :
          $this->consultationAttributions($connexion, $model);
          break;
        case 'creationEtablissement' :
          $this->creationEtablissement($connexion, $model, $errors);
          break;
        case 'modificationEtablissement' :
          $this->modificationEtablissement($connexion, $model, $errors);
          break;
        case 'supressionEtablissement' :
          $this->supressionEtablissement($connexion, $model);
          break;
        case 'detailEtablissement':
          $this->detailEtablissement($connexion, $model);
          break;
        case 'modificationAttributions' :
          $this->modificationAttributions($connexion, $model);
          break;
        case 'donnerNbChambres' : 
          $this->donnerNbChambres($connexion, $model);
          break;
        default : 
          throw new Exception("Action non reconnue par le contrôleur");
          break;
      }
    } else { 
        $this->accueil(); 
    }
  }

}

?>