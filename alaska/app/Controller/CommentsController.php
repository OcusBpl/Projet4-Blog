<?php 


namespace App\Controller;

use Core\Controller\Controller;
use Core\HTML\MaterializeForm;


class CommentsController extends AppController{

	public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
        $this->loadModel('Comment');

    }


	public function add(){ //Ajout de commentaire
        if(!empty($_POST)){
            $result = $this->Comment->create([
                'pseudo' => $_POST['pseudo'],
                'mail' => $_POST['mail'],
                'contenu' => $_POST['contenu'],
                'id_articles' => $_GET['id']
            ]);
            header('Location: index.php?p=comments.verifcomment');
        }
        $post = $this->Post->find($_GET['id']);
        $categories = $this->Category->extract('id', 'titre');
        $form = new MaterializeForm($_POST);
        $this->Comment->id_articles = $post;
        $this->render('comments.add', compact('articles','form'));
    }

    public function signale(){ //signalement de commentaires
        if (!empty($_POST)) {
            if(isset($_POST['signale'])){
               $_POST['signale']++;
                $this->Comment->update($_GET['id'], [
                    'signale' => $_POST['signale']
                ]); 
            }
            
       		header('Location: index.php?p=comments.verif');
        }
        $comment = $this->Comment->find($_GET['id']);
        $form = new MaterializeForm($comment);
        $this->render('comments.signale', compact('comment', 'form'));
    } 

    public function verif(){
    	$this->render('comments.verif');
    }
    public function verifcomment(){
        $this->render('comments.verifcomment');
    } 
}