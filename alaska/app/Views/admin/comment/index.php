


<h1>Administrer  les commentaires</h1>

<p>
	<a href="index.php?p=admin.posts.index" class="waves-effect waves-light btn">Retour a la page d'admin</a>
</p>

<table class="table">
	<thead>

		<tr>
			<td>ID</td>
			<td>Pseudo</td>
			<td>Mail</td>
			<td>Message</td>
			<td>Nombres de signalement</td>
		</tr>

	</thead>
	<tbody>

<?php 
	foreach($items as $comment): 
	if($comment->signale > 5){
		?>
	<tr>
		<td><?= $comment->id; ?></td>
		<td><?= $comment->pseudo; ?></td>
		<td><?= $comment->mail; ?></td>
		<td><?= $comment->contenu; ?></td>
		<td><?= $comment->signale; ?></td>
		<td>
			<form action="?p=admin.comment.delete" method="post" style="display: inline;">
                <input type="hidden" name="id" value="<?= $comment->id ?>">
                <button type="submit" class="btn waves-effect waves-light">Supprimer</button>
            </form>
		</td>
	</tr>

<?php 
}
endforeach; 
?>
	
	</tbody>
</table>
