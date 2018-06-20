<form method="post">
	<div class="input-field col s12">
		<p>Etes vous sur de vouloir signaler ce commentaire ??</p>
		<?= $form->input('signale', '', ['type' => 'hidden']); ?>
		<button  class="waves-effect waves-light btn">Signaler</button>
	</div>
	
</form>