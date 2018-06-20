<?php
use Core\Auth\DBAuth;

define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';
App::load();




if(isset($_GET['p'])){
    $page = $_GET['p'];
}else{
    $page = 'home';
}

// Auth
$app = App::getInstance();
$auth = new DBAuth($app->getDb()); // Si le client n'est pas connecter il na pas acces et est redirigé vers une page (defini dans le controller) 
if(!$auth->logged()){
    $app->forbidden();
}


ob_start();
if($page === 'home'){ // Redirection vers l'administration des billets
    require ROOT . '/app/Views/admin/posts/index.php';
} elseif ($page === 'posts.edit'){
    require ROOT . '/app/Views/admin/posts/edit.php';
} elseif ($page === 'posts.add'){
    require ROOT . '/app/Views/admin/posts/add.php';
}elseif ($page === 'posts.delete'){
    require ROOT . '/app/Views/admin/posts/delete.php';
}elseif($page === 'posts.news'){
    require ROOT . '/app/Views/admin/posts/news.php';
}
elseif($page === 'categories.index'){ // Redirection vers l'administration des categories
    require ROOT . '/app/Views/admin/categories/index.php';
} elseif ($page === 'categories.edit'){
    require ROOT . '/app/Views/admin/categories/edit.php';
} elseif ($page === 'categories.add'){
    require ROOT . '/app/Views/admin/categories/add.php';
}elseif ($page === 'categories.delete'){
    require ROOT . '/app/Views/admin/categories/delete.php';
} 
elseif ($page === 'login') { // Redirection vers la page pour s'identifier
    require ROOT . '/app/Views/users/login.php';
}
elseif($page === 'comment.index'){ // Redirection vers l'administration des commentaires
    require ROOT . '/app/Views/admin/comment/index.php';
} 
elseif ($page === 'comments.add'){ // Redirection vers les vues des commentaires
    require ROOT . '/app/Views/comments/add.php';
}elseif ($page === 'comments.verif'){
    require ROOT . '/app/Views/comments/verif.php';
}elseif ($page === 'comments.signale'){
    require ROOT . '/app/Views/comments/signale.php';
}elseif ($page === 'comments.verifcomment'){
    require ROOT . '/app/Views/comments/verifcomment.php';
}
elseif ($page === 'comment.delete'){ // Redirection vers la suppression des comm
    require ROOT . '/app/Views/admin/comment/delete.php';
}

elseif($page === 'draft.index'){ // Redirection vers l'administration des brouillons
    require ROOT . '/app/Views/admin/draft/index.php';
} elseif ($page === 'draft.edit'){
    require ROOT . '/app/Views/admin/draft/edit.php';
} elseif ($page === 'draft.add'){
    require ROOT . '/app/Views/admin/draft/add.php';
}elseif ($page === 'draft.delete'){
    require ROOT . '/app/Views/admin/draft/delete.php';
}  

$content = ob_get_clean();
require ROOT . '/app/Views/templates/default.php'; //Pages par default du site
