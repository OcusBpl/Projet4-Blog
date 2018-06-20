<?php 

namespace Core\Controller;


class Controller{

	protected $viewPath;
	protected $template;

    //Gere le rendu des vue dans admin et public
	protected function render($view, $variables = []){
        ob_start();
        extract($variables);
        require($this->viewPath . str_replace('.', '/', $view) . '.php');
        $content = ob_get_clean();
        require($this->viewPath . 'templates/' . $this->template . '.php');
    }

    //redirige vers une erreur si le client n'est pas connecter
    public function forbidden(){
        header('HTTP/1.0 403 Forbidden');
        die('Acces interdit</br>
            <button class="waves-effect waves-light btn"><a href="index.php?p=users.login">Se connecter</a></button></br>
            <button class="waves-effect waves-light btn"><a href="index.php">Retour a la HOME PAGE</a></button>');
    }

    //Redirige le client vers une page non trouver si il tape une url non valide
    protected function notFound(){
        header('HTTP/1.0 404 Not Found');
        die('Page introuvable');
    }

}