<?php if($errors): ?>
    <div class="alert alert-danger">
        Identifiants incorrects
    </div>
<?php endif; ?>

<form method="post">
	<?= $form->input('username', 'Pseudo'); ?>
	<?= $form->input('password', 'Mot de Passe', ['type' => 'password']); ?>
	<button class="btn waves-effect waves-light">Envoyer</button>
	
</form>