<h1>Dernier article en date</h1>
<div class="row">
	<div class="col s10">
		<?php foreach($news as $post): ?>
	

		    <h2><a href="<?= $post->url; ?>"><?= $post->titre; ?></a></h2>

		    <p><em><?= $post->categorie; ?></em></p>
		    <p>Ajouté le <em><?= $post->date; ?></em></p>

		    <p><?= $post->extrait; ?></p>


		<?php endforeach; ?>
		
	</div>
	
</div>