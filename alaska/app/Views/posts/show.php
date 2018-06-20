

<h1><?= $article->titre; ?></h1>

<p><em><?= $article->categorie; ?></em></p>
<p>Ajouté le <em><?= $article->date; ?></em></p>

<p><?= $article->contenu; ?></p>


<a href="?p=comments.add&id=<?=$article->id; ?>" class="waves-effect waves-light btn">Ajouter un Commentaire</a>


<table class="table">
	<thead>

		<tr>
			<td>Pseudo</td>
			<td>Mail</td>
			<td>Message</td>
		</tr>

	</thead>
	<tbody>

<?php foreach($com as $comment): ?>
	<tr>
		<td><?= $comment->pseudo; ?></td>
		<td><?= $comment->mail; ?></td>
		<td><?= $comment->contenu; ?></td>
		<td><a href="?p=comments.signale&id=<?=$comment->id; ?>" >Signaler</a>
		</td>
	</tr>

<?php endforeach; ?>

	</tbody>
</table>





