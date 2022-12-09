<?php
try 
{
  include 'controllers/controller.php';
  $model = new Model();
  $controleur = new Controller();
  $errors = new Errors();
  $connexion = $model->connect(); // Creates a new connexion to the database
  $controleur->displayVue($connexion, $model, $errors); // This public function implements a front controller
} catch (Exception $e) {
    $errors = new Errors();
    $errors->ajouterErreur($e);
    include 'views/vueError.php';
}
?>