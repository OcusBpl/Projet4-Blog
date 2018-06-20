<h1>Administrer les articles</h1>
<p>
	<a href="?p=admin.posts.add" class="waves-effect waves-light btn">Ajouter</a>
	<a href="?p=admin.categories.index" class="waves-effect waves-light btn">Administrer les categories</a>
	<a href="?p=admin.draft.index" class="waves-effect waves-light btn">Administrer les brouillons</a>
	<a href="?p=admin.comment.index" class="waves-effect waves-light btn">Administrer les commentaires</a>
</p>


<table class="striped">
	<thead>

		<tr>
			<td>ID</td>
			<td>Titre</td>
			<td>Actions</td>
		</tr>

	</thead>
	<tbody>
        <?php foreach($posts as $post): ?>
        <tr>
            <td><?= $post->id; ?></td>
            <td><?= $post->titre; ?></td>
            <td>
                <a class="waves-effect waves-light btn" href="?p=admin.posts.edit&id=<?= $post->id; ?>">Editer</a>
                <form action="?p=admin.posts.delete" method="post" style="display: inline;">
                    <input type="hidden" name="id" value="<?= $post->id ?>">
                    <button type="submit" class="btn waves-effect waves-light">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
