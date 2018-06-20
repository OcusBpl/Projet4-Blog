<?php

namespace App\Controller\Admin;

use Core\HTML\MaterializeForm;

class CategoriesController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Category');
    }

    public function index(){ //Affiche toutes les categories
        $items = $this->Category->all();
        $this->render('admin.categories.index', compact('items'));
    }

    public function add(){ // permet d'ajouter une categorie
        if (!empty($_POST)) {
            $result = $this->Category->create([
                'titre' => $_POST['titre'],
            ]);
            return $this->index();
        }
        $form = new MaterializeForm($_POST);
        $this->render('admin.categories.edit', compact('form'));
    }

    public function edit(){ // permet de modifier une categorie
        if (!empty($_POST)) {
            $result = $this->Category->update($_GET['id'], [
                'titre' => $_POST['titre'],
            ]);
            return $this->index();
        }
        $category = $this->Category->find($_GET['id']);
        $form = new MaterializeForm($category);
        $this->render('admin.categories.edit', compact('form'));
    }

    public function delete(){ //permet de supprimer une category
        if (!empty($_POST)) {
            $result = $this->Category->delete($_POST['id']);
            return $this->index();
        }
    }

}