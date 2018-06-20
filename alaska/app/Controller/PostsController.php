<?php 

namespace App\Controller;

use Core\Controller\Controller;
use Core\HTML\MaterializeForm;


class PostsController extends AppController{

	public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
        $this->loadModel('Comment');

    }

	public function index(){ // fonction d'affichage de tous les billets
        $posts = $this->Post->last();
        $categories = $this->Category->all();
        $this->render('posts.index', compact('posts', 'categories'));
    }

	public function category(){ // affichage des billets en fonction de la categories choisi
        $categorie = $this->Category->find($_GET['id']);
        if($categorie === false){
            $this->notFound();
        }
        $articles = $this->Post->lastByCategory($_GET['id']);
        $categories = $this->Category->all();
        $this->render('posts.category', compact('articles', 'categories', 'categorie'));
    }

	public function show(){ // affichage du billets demander
        $article = $this->Post->findWithCategory($_GET['id']);
        $com = $this->Comment->lastByCategory($_GET['id']);
        $this->render('posts.show', compact('article', 'com'));
    }

    public function news(){ // affichage du dernier ajout en date
        $news = $this->Post->lastNews();
        $this->render('posts.news', compact('news'));
    }

    


}