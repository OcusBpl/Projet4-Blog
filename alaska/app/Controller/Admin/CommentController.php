<?php

namespace App\Controller\Admin;

use Core\HTML\MaterializeForm;

class CommentController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Comment');
        $this->loadModel('Post');
        $this->loadModel('Category');
    }

    public function index(){ // affiche tout les commentaire signaler en fonction de la limite(voir comment views)
        $items = $this->Comment->all();
        $this->render('admin.comment.index', compact('items'));
    }

      

    public function delete(){ // supprimer un commentaire
        if (!empty($_POST)) {
            $result = $this->Comment->delete($_POST['id']);
            return $this->index();
        }
    }

}