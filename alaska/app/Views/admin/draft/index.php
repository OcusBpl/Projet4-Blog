<h1>Administrer  les brouillons</h1>

<p>
	<a href="?p=admin.draft.add" class="waves-effect waves-light btn">Ajouter</a>
	<a href="?p=admin.posts.index" class="waves-effect waves-light btn">Retour a la page d'admin</a>
</p>

<table class="table">
	<thead>

		<tr>
			<td>ID</td>
			<td>Titre</td>
			<td>Actions</td>
		</tr>

	</thead>
	<tbody>
		
	<?php foreach($drafts as $draft): ?>

		<tr>
			<td><?= $draft->id; ?></td>
			<td><?= $draft->titre; ?></td>
			<td>
				<a href="?p=admin.draft.publi&id=<?=$draft->id; ?>" class="waves-effect waves-light btn">Publier</a>
				<a href="?p=admin.draft.edit&id=<?=$draft->id; ?>" class="waves-effect waves-light btn">Editer</a>

				<form action="?p=admin.draft.delete" method="post" style="display: inline-block;">
					<input type="hidden"  name="id" value="<?= $draft->id ?>">
					<button type="submit" class="btn btn-danger" href="?p=admin.drafts.delete&id=<?=$draft->id; ?>">Supprimer</button>
				</form>
			</td>

		</tr>

	<?php endforeach; ?>

	</tbody>

</table>
