<?php

namespace App\Controller\Admin;

use Core\HTML\MaterializeForm;

class PostsController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
    }

    public function index(){ //Affiche tout les billets
        $posts = $this->Post->all();
        $this->render('admin.posts.index', compact('posts'));
    }

    public function add(){ //permet d'ajouter un billet
        if (!empty($_POST)) {
            $result = $this->Post->create([
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
        $this->render('admin.posts.edit', compact('categories', 'form'));
    }

    public function edit(){ //permet de modifier un billets
        if (!empty($_POST)) {
            $result = $this->Post->update($_GET['id'], [
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'category_id' => $_POST['category_id']
            ]);
            if($result){
                return $this->index();
            }
        }
        $post = $this->Post->find($_GET['id']);
        $this->loadModel('Category');
        $categories = $this->Category->extract('id', 'titre');
        $form = new MaterializeForm($post);
        $this->render('admin.posts.edit', compact('categories', 'form'));
    }

    public function delete(){ //permet de supprimer un billets
        if (!empty($_POST)) {
            $result = $this->Post->delete($_POST['id']);
            return $this->index();
        }
    }

}