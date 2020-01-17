<?php  $title = "Ma liste"; ?>
<?php ob_start(); ?>

<div class="text-center">
	<h1 class="mt-4 text-light">Liste de vos jeux</h1>
</div>
<div class="row">
	<div class="container mt-4">
		<div class="table-responsive">
			<table class="table table-striped">
				<thead class=" white-text">
					<tr class="table-success">
						<th scope="col">#</th>
						<th scope="col">Nom</th>
						<th scope="col">Genres</th>
						<th scope="col">Console</th>
						<th scope="col">Note</th>
						<th scope="col">Date ajout</th>
						<th scope="col text-center">Suppression</th>
						<th scope="col text-center">Infos</th>
					</tr>
				</thead>
				<?php foreach ($posts as $post):?>
				<tbody class="table-light">
					<tr>
						<th><?= htmlspecialchars($post['id']); ?></th>
						<td><?= (substr(strip_tags(htmlspecialchars($post['title'])),0,20)); ?></td>
						<td><?= htmlspecialchars($post['genres']); ?></td>
						<td></td>
						<td><?= htmlspecialchars($post['rating']); ?></td>
						<td><?= htmlspecialchars($post['date_add']); ?></td>
						<td><a class="btn btn-danger btn-sm mt-1"  style="width: 75px;height: 31px;font-size: 13px;" href="index.php?page=deleteGame&amp;id=<?= $post['id']?>" onclick =" return confirm('Etes-vous sûr ?')" >Effacer</a></td>
						<td><a class="btn btn-info btn-sm mt-1"  style="width: 75px;height: 31px;font-size: 13px;" href="index.php?page=details&&amp;slug=<?= $post['slug']?>" >Détails</a></td>
					</tr>
				</tbody>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require ("view/template.php"); ?>