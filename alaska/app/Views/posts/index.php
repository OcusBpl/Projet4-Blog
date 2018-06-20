<div class="row center">
	<div class="grid-example col s12">
		<span class="flow-text">
		<?php foreach($posts as $post): ?>
	

		    <h2><a href="<?= $post->url; ?>"><?= $post->titre; ?></a></h2>

		    <p><em><?= $post->categorie; ?></em></p>
		    <p>Ajouté le <em><?= $post->date; ?></em></p>

		    <p><?= $post->extrait; ?></p>

		    <div class="divider"></div>


		<?php endforeach; ?>
		</span>
	</div>
	
</div>


