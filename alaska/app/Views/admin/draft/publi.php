<form method="post">
	<?= $form->input('titre', 'Titre de l\'article'); ?>
	<?= $form->input('contenu', 'Contenu', ['type' => 'textarea']); ?>
	<?= $form->select('category_id', 'Categorie', $categories); ?>
	<button class="waves-effect waves-light btn">Sauvegarder</button>
	
</form>