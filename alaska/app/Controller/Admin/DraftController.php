<?php

namespace App\Controller\Admin;

use Core\HTML\MaterializeForm;

class DraftController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Draft');
        $this->loadModel('Category');
    }

    public function index(){ //Affiche tout les brouillons
        $drafts = $this->Draft->all();
        $this->render('admin.draft.index', compact('drafts'));
    }

    public function add(){ //Permet d'ajouter un brouillon
        if(!empty($_POST)){
            $result = $this->Draft->create([
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'category_id' => $_POST['category_id']
            ]);
            if($result){
                return $this->index();
            }
        }
        $this->loadModel('Category');
        $categories = $this->Category->extract('id', 'titre');
        $form = new MaterializeForm($_POST);
        $this->render('admin.draft.edit', compact('categories', 'form'));
    }

    public function edit(){ //Permet de modifier un brouillon
        if(!empty($_POST)){
            $result = $this->Draft->update($_GET['id'], [
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'category_id' => $_POST['category_id']
            ]);
            if($result){
                return $this->index();
            }
        }
        $draft = $this->Draft->find($_GET['id']);
        $categories = $this->Category->extract('id', 'titre');
        $form = new MaterializeForm($draft);
        $this->render('admin.draft.edit', compact('categories', 'form'));
    }

    public function publi(){ // idem edit mais transfert vers publication billets, apparait alors comme un billet
        if(!empty($_POST)){
            $result = $this->Post->create( [
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'category_id' => $_POST['category_id']
            ]);
            if($result){
                header('Location: index.php');
            }
        }
        $draft = $this->Draft->find($_GET['id']);
        $categories = $this->Category->extract('id', 'titre');
        $form = new MaterializeForm($draft);
        $this->render('admin.draft.publi', compact('categories', 'form'));
    }

    public function delete(){// supprime un billets
        if (!empty($_POST)) {
            $result = $this->Draft->delete($_POST['id']);
            return $this->index();
        }
    }

}