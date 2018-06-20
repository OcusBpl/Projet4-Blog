<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title><?= App::getInstance()->title; ?></title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="nav-extended teal acent-3">
    <div class="nav-wrapper">
        <img class="responsive-img" src="">
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a class="navbar-brand" href="index.php"><span class="white-text">Home</span></a></li>
            <li><a class="navbar-brand" href="index.php?p=admin.posts.index"><span class="white-text">Admin</span></a></li>
        </ul>
    </div>
    <div class="nav-content">
        <ul class="tabs tabs-transparent" id="nav-mobile">               
            <li><a class="tab" href="index.php?p=posts.news"><span class="white-text">Dernier Ajout</span></a></li>
            <?php foreach(App::getInstance()->getTable('Category')->all() as $categorie): ?>

                <li class="tab"><a href="<?= $categorie->url; ?>"><?= $categorie->titre; ?></a></li>

            <?php endforeach; ?>
        </ul>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
    <li><a class="navbar-brand" href="index.php">Home</a></li>
    <li><a class="navbar-brand" href="admin.php">Admin</a></li>
    <li><a class="tab" href="index.php?p=posts.news">Dernier Ajout</a></li>
        <?php foreach(App::getInstance()->getTable('Category')->all() as $categorie): ?>

            <li class="tab"><a href="<?= $categorie->url; ?>"><?= $categorie->titre; ?></a></li>

        <?php endforeach; ?>
  </ul>

  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center black-text text-darken-2">Billet simple pour l'Alaska</h1>
        <div class="row center">
          <h5 class="header col s12 light">Un episode chaque semaine</h5>
        </div>
        <div class="row center">
          <a href="index.php?p=posts.show&id=25" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">Commencez à lire</a>
        </div>
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="alaska2.jpg" alt="Unsplashed background img 1"></div>
  </div>


  <div class="container">
    <div class="starter-template" >
            <?= $content; ?>
        </div>
  </div>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light"><span class="white-text ">Decouvrez chaque semaine un nouvel episode de mon nouveau roman</span></h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="alaska.jpg" alt="Unsplashed background img 2"></div>
  </div>

  <div class="container">
    <div class="section">

      <div class="row">
        <div class="col s12 center">
          <h3><i class="mdi-content-send brown-text"></i></h3>
          <h4>Resume</h4>
          <p class="left-align light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
        </div>
      </div>

    </div>
  </div>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">Venez decouvrir l'Alaska</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="alaska3.jpg" alt="Unsplashed background img 3"></div>
  </div>

  <footer class="page-footer teal">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">"Billet simple pour l'Alaska"</h5>
          <p class="grey-text text-lighten-4">Acteur et ecrivain moderne, je souhaite inover en publiant mon roman en ligne episode par episode</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">App</h5>
          <ul>
            <li><a class="white-text" href="#!">Facebook</a></li>
            <li><a class="white-text" href="#!">Twitter</a></li>
            <li><a class="white-text" href="#!">Instagram</a></li>
            <li><a class="white-text" href="#!">Flickr</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>