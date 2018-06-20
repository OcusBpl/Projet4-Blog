<h1>Administrer les catégories</h1>

<p>
    <a href="?p=admin.categories.add" class="waves-effect waves-light btn">Ajouter</a>
    <a href="index.php?p=admin.posts.index" class="waves-effect waves-light btn">Retour a la page d'admin</a>
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
        <?php foreach($items as $category): ?>
        <tr>
            <td><?= $category->id; ?></td>
            <td><?= $category->titre; ?></td>
            <td>
                <a class="waves-effect waves-light btn" href="?p=admin.categories.edit&id=<?= $category->id; ?>">Editer</a>
                <form action="?p=admin.categories.delete" method="post" style="display: inline;">
                    <input type="hidden" name="id" value="<?= $category->id ?>">
                    <button type="submit" class="waves-effect waves-light btn">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>


