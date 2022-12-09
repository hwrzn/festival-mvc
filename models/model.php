<?php

class Model {

  // FONCTIONS DE CONNEXION

  public function connect()
  {
    $login = 'root';
    $pwd = '';
    $dsn = 'mysql:host=localhost;dbname=festival';
    try {
      $dbh = new PDO($dsn,$login,$pwd);
    } catch(PDOException $e) {
    echo "Erreur : ".$e->getMessage()."</br>";
    echo "N° : ".$e->getCode()."</br>";
    die();
    }

   return $dbh;
  }  

  // FONCTIONS DE GESTION DES ÉTABLISSEMENTS

  public function obtenirReqEtablissements()
  {
    $req="select id, nom from Etablissement order by id";
    return $req;
  }

  public function obtenirReqEtablissementsOffrantChambres()
  {
    $req="select id, nom, nombreChambresOffertes from Etablissement where 
          nombreChambresOffertes!=0 order by id";
    return $req;
  }

  public function obtenirReqEtablissementsAyantChambresAttribuées()
  {
    $req="select distinct id, nom, nombreChambresOffertes from Etablissement, 
          Attribution where id = idEtab order by id";
    return $req;
  }

  public function obtenirDetailEtablissement($connexion, $id)
  {
    $req="select * from Etablissement where id='$id'";
    $rsEtab=$connexion->query($req);
    return $rsEtab->fetch(PDO::FETCH_ASSOC);
  }

  public function supprimerEtablissement($connexion, $id)
  {
    $req="delete from Etablissement where id='$id'";
    return $connexion->query($req);
  }

  public function modifierEtablissement($connexion, $id, $nom, $adresseRue, $codePostal, 
    $ville, $tel, $adresseElectronique, $type, 
    $civiliteResponsable, $nomResponsable, 
    $prenomResponsable, $nombreChambresOffertes
  ) {
    $nom=str_replace("'", "''", $nom);
    $adresseRue=str_replace("'", "''", $adresseRue);
    $ville=str_replace("'", "''", $ville);
    $adresseElectronique=str_replace("'", "''", $adresseElectronique);
    $nomResponsable=str_replace("'", "''", $nomResponsable);
    $prenomResponsable=str_replace("'", "''", $prenomResponsable);

    $req="update Etablissement set nom='$nom',adresseRue='$adresseRue',
    codePostal='$codePostal',ville='$ville',tel='$tel',
    adresseElectronique='$adresseElectronique',type='$type',
    civiliteResponsable='$civiliteResponsable',nomResponsable=
    '$nomResponsable',prenomResponsable='$prenomResponsable',
    nombreChambresOffertes='$nombreChambresOffertes' where id='$id'";

    return $connexion->query($req);
  }

  public function creerEtablissement($connexion, $id, $nom, $adresseRue, $codePostal, 
    $ville, $tel, $adresseElectronique, $type, 
    $civiliteResponsable, $nomResponsable, 
    $prenomResponsable, $nombreChambresOffertes
  ) {
    $nom=str_replace("'", "''", $nom);
    $adresseRue=str_replace("'", "''", $adresseRue);
    $ville=str_replace("'", "''", $ville);
    $adresseElectronique=str_replace("'", "''", $adresseElectronique);
    $nomResponsable=str_replace("'", "''", $nomResponsable);
    $prenomResponsable=str_replace("'", "''", $prenomResponsable);

    $req="insert into Etablissement values ('$id', '$nom', '$adresseRue', 
    '$codePostal', '$ville', '$tel', '$adresseElectronique', '$type', 
    '$civiliteResponsable', '$nomResponsable', '$prenomResponsable',
    '$nombreChambresOffertes')";

    return $connexion->query($req);
  }

  public function estUnIdEtablissement($connexion, $id)
  {
    $req="select * from Etablissement where id='$id'";
    $rsEtab=$connexion->query($req);
    return $rsEtab->fetch(PDO::FETCH_ASSOC);
  }

  public function estUnNomEtablissement($connexion, $mode, $id, $nom)
  {
    $nom=str_replace("'", "''", $nom);
    // S'il s'agit d'une création, on vérifie juste la non existence du nom sinon
    // on vérifie la non existence d'un autre établissement (id!='$id') portant 
    // le même nom
    if ($mode=='C') {
      $req="select * from Etablissement where nom='$nom'";
    }
    else
    {
      $req="select * from Etablissement where nom='$nom' and id!='$id'";
    }
    $rsEtab=$connexion->query($req);
    return $rsEtab->fetch(PDO::FETCH_ASSOC);
  }

  public function obtenirNbEtab($connexion)
  {
    $req="select count(*) as nombreEtab from Etablissement";
    $rsEtab=$connexion->query($req);
    $lgEtab=$rsEtab->fetch(PDO::FETCH_ASSOC);
    return $lgEtab["nombreEtab"];
  }

  public function obtenirNbEtabOffrantChambres($connexion)
  {
    $req="select count(*) as nombreEtabOffrantChambres from Etablissement where 
          nombreChambresOffertes!=0";
    $rsEtabOffrantChambres=$connexion->query($req);
    $lgEtabOffrantChambres=$rsEtabOffrantChambres->fetch(PDO::FETCH_ASSOC);
    return $lgEtabOffrantChambres["nombreEtabOffrantChambres"];
  }

  // Retourne false si le nombre de chambres transmis est inférieur au nombre 
  // de chambres occupées pour l'établissement transmis 
  // Retourne true dans le cas contraire
  public function estModifOffreCorrecte($connexion, $idEtab, $nombreChambres)
  {
    $nbOccup=$this->obtenirNbOccup($connexion, $idEtab);
    return ($nombreChambres>=$nbOccup);
  }

  // FONCTIONS RELATIVES AUX GROUPES

  public function obtenirReqIdNomGroupesAHeberger()
  {
    $req="select id, nom, nomPays from Groupe where hebergement='O' order by id";
    return $req;
  }

  public function obtenirNomGroupe($connexion, $id)
  {
    $req="select nom from Groupe where id='$id'";
    $rsGroupe=$connexion->query($req);
    $lgGroupe=$rsGroupe->fetch(PDO::FETCH_ASSOC);
    return $lgGroupe["nom"];
  }

  // FONCTIONS RELATIVES AUX ATTRIBUTIONS

  // Teste la présence d'attributions pour l'établissement transmis    
  public function existeAttributionsEtab($connexion, $id)
  {
    $req="select * From Attribution where idEtab='$id'";
    $rsAttrib=$connexion->query($req);
    return $rsAttrib->fetch(PDO::FETCH_ASSOC);
  }

  // Retourne le nombre de chambres occupées pour l'id étab transmis
  public function obtenirNbOccup($connexion, $idEtab)
  {
    $req="select IFNULL(sum(nombreChambres), 0) as totalChambresOccup from
         Attribution where idEtab='$idEtab'";
    $rsOccup=$connexion->query($req);
    $lgOccup=$rsOccup->fetch(PDO::FETCH_ASSOC);
    return $lgOccup["totalChambresOccup"];
  }

  // Met à jour (suppression, modification ou ajout) l'attribution correspondant à
  // l'id étab et à l'id groupe transmis
  public function modifierAttribChamb($connexion, $idEtab, $idGroupe, $nbChambres)
  {
    $req="select count(*) as nombreAttribGroupe from Attribution where idEtab=
    '$idEtab' and idGroupe='$idGroupe'";
    $rsAttrib=$connexion->query($req);
    $lgAttrib=$rsAttrib->fetch(PDO::FETCH_ASSOC);
      if ($nbChambres==0) {
          $req="delete from Attribution where idEtab='$idEtab' and idGroupe='$idGroupe'";
      } else {
          if ($lgAttrib["nombreAttribGroupe"]!=0) {
            $req="update Attribution set nombreChambres=$nbChambres where idEtab=
            '$idEtab' and idGroupe='$idGroupe'";
          } else {
              $req="insert into Attribution values('$idEtab','$idGroupe', $nbChambres)";
          }
      }
    return $connexion->query($req);
  }

  // Retourne la requête permettant d'obtenir les id et noms des groupes affectés
  // dans l'établissement transmis
  public function obtenirReqGroupesEtab($id)
  {
    $req="select distinct id, nom, nomPays from Groupe, Attribution where 
          Attribution.idGroupe=Groupe.id and idEtab='$id'";
    return $req;
  }

  // Retourne le nombre de chambres occupées par le groupe transmis pour l'id étab
  // et l'id groupe transmis
  public function obtenirNbOccupGroupe($connexion, $idEtab, $idGroupe)
  {
    $req="select nombreChambres From Attribution where idEtab='$idEtab'
          and idGroupe='$idGroupe'";
    $rsAttribGroupe=$connexion->query($req);
      if ($lgAttribGroupe=$rsAttribGroupe->fetch(PDO::FETCH_ASSOC)) {
        return $lgAttribGroupe["nombreChambres"];
      } else {
          return 0;
      }
  } 

}

class Errors extends Model {

  // FONCTIONS DE CONTRÔLE DE SAISIE

  // Si $codePostal a une longueur de 5 caractères et est de type entier, on 
  // considère qu'il s'agit d'un code postal
  public function estUnCp($codePostal)
  {
    // Le code postal doit comporter 5 chiffres
    return strlen($codePostal) == 5 && $this->estEntier($codePostal);
  }

  // Si la valeur transmise ne contient pas d'autres caractères que des chiffres, 
  // la fonction retourne vrai
  public function estEntier($valeur)
  {
    return !preg_match("[^0-9]", $valeur);
  }

  // Si la valeur transmise ne contient pas d'autres caractères que des chiffres  
  // et des lettres non accentuées, la fonction retourne vrai
  public function estChiffresOuEtLettres($valeur)
  {
    return !preg_match("[^a-zA-Z0-9]", $valeur);
  }

  // Fonction qui vérifie la saisie lors de la modification d'un établissement. 
  // Pour chaque champ non valide, un message est ajouté à la liste des erreurs
  public function verifierDonneesEtabM($connexion, $id, $nom, $adresseRue, $codePostal, 
    $ville, $tel, $nomResponsable, $nombreChambresOffertes
    ) {
        if ($nom=="" || $adresseRue=="" || $codePostal=="" || $ville==""  
          || $tel=="" || $nomResponsable=="" || $nombreChambresOffertes==""
        ) {
          $this ->ajouterErreur("Chaque champ suivi du caractère * est obligatoire");
        }
        if ($nom!="" && $this->estUnNomEtablissement($connexion, 'M', $id, $nom)) {
          $this->ajouterErreur("L'établissement $nom existe déjà");
        }
        if ($codePostal!="" && !($this->estUnCp($codePostal))) {
          $this->ajouterErreur("Le code postal doit comporter 5 chiffres");   
        }
        if ($nombreChambresOffertes!="" && (!($this->estEntier($nombreChambresOffertes)) 
          || !($this->estModifOffreCorrecte($connexion, $id, $nombreChambresOffertes)))
        ) {
            $this->ajouterErreur("La valeur de l'offre est non entière ou inférieure aux attributions effectuées");
        }
  }

  // Fonction qui vérifie la saisie lors de la création d'un établissement. 
  // Pour chaque champ non valide, un message est ajouté à la liste des erreurs

  public function verifierDonneesEtabC($connexion, $id, $nom, $adresseRue, $codePostal, $ville, $tel, $nomResponsable, $nombreChambresOffertes)
  {
    if ($id=="" || $nom=="" || $adresseRue=="" || $codePostal=="" || $ville==""
      || $tel=="" || $nomResponsable=="" || $nombreChambresOffertes==""
    ) {
        $this->ajouterErreur("Chaque champ suivi du caractère * est obligatoire");
      }
    if($id!="") {
      // Si l'id est constitué d'autres caractères que de lettres non accentuées 
      // et de chiffres, une erreur est générée
      if (!($this->estChiffresOuEtLettres($id))) {
        $this->ajouterErreur("L'identifiant doit comporter uniquement des lettres non accentuées et des chiffres");
      } else {
          if ($this->estUnIdEtablissement($connexion, $id)) {
            $this->ajouterErreur("L'établissement $id existe déjà");
          }
      }
    }
    if ($nom!="" && $this->estUnNomEtablissement($connexion, 'C', $id, $nom)) {
      $this->ajouterErreur("L'établissement $nom existe déjà");
    }
    if ($codePostal!="" && !($this->estUnCp($codePostal))) {
      $this->ajouterErreur("Le code postal doit comporter 5 chiffres");   
    }
    if ($nombreChambresOffertes!="" && !($this->estEntier($nombreChambresOffertes))) {
      $this->ajouterErreur("La valeur de l'offre doit être un entier");
    }
  }
      
  // FONCTIONS DE GESTION DES ERREURS

  public $tabExceptions = array();
   
  // stocke l'exception $e attrapée par le catch dans un array
  public function ajouterErreur($e) 
  {
    $this->tabExceptions['errors']=$e;
  }

  public function nbErreurs()
  {
    if (!isset($this->tabExceptions['errors'])) {
      return 0;
    } else {
        return count($this->tabExceptions['errors']);
    }
  }
   
  public function afficherErreurs()
  {
    echo '<div class="msgError">';
    echo '<ul>';
      foreach($this->tabExceptions as $error)
      {
        echo "<li>".$error->getMessage()."</li>";
      }
    echo '</ul>';
    echo '</div>';
  } 

}

?>