<?php

namespace App\Controller;

use Core\Auth\DBAuth;
use Core\HTML\MaterializeForm;
use \App;

class UsersController extends AppController {

    //Controller du formulaire de connexion
    public function login(){
        $errors = false;
        if(!empty($_POST)){
            $auth = new DBAuth(App::getInstance()->getDb()); // recupere l'instance et connexion a la base de donnés
            if($auth->login($_POST['username'], $_POST['password'])){
                header('Location: index.php?p=admin.posts.index');
            } else {
                $errors = true; // erreur gerer sur la vue users
            }
        }
        $form = new MaterializeForm($_POST); // instancation formulaire
        $this->render('users.login', compact('form', 'errors'));
    }

}