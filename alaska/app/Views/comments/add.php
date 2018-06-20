<div class="row">
	<form class="col s12" method="post">
		<?= $form->input('pseudo', 'Votre Pseudo'); ?>
		<?= $form->input('mail', 'Votre Adresse Mail', ['type' => 'mail']); ?>
		<?= $form->input('contenu', 'Votre message', ['type' => 'textarea']); ?>
		<button class="waves-effect waves-light btn">Envoyer</button>
		
	</form>
</div>