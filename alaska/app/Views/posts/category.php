<h1><?= $categorie->titre; ?></h1>

<div class="row">
	<div class="col s10">
		<?php foreach($articles as $post): ?>
	

		    <h2><a href="<?= $post->url; ?>"><?= $post->titre; ?></a></h2>

		    <p><em><?= $post->categorie; ?></em></p>
		    <p>Ajouté le <em><?= $post->date; ?></em></p>

		    <p><?= $post->extrait; ?></p>


		<?php endforeach; ?>
		
	</div>

	<div class="col s2">
		<ul>
			<?php foreach($categories as $categorie): ?>

				<li><a href="<?= $categorie->url; ?>"><?= $categorie->titre; ?></a></li>

			<?php endforeach; ?>
		</ul>

		
	</div>
	
</div>