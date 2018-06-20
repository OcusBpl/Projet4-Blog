<form method="post">
	<div class="input-field col s12">
		<?= $form->input('titre', 'Titre de l\'article'); ?>
		<?= $form->input('contenu', 'Contenu', ['type' => 'textarea']); ?>
		<?= $form->select('category_id', 'Categorie', $categories); ?>
		<button class="waves-effect waves-light btn">Publier</button>
	</div>
	
</form>