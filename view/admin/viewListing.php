<?php  $title = "Ma liste"; ?>
<?php ob_start(); ?>

<div class="text-center">
	<h1 class="mt-4 text-light">Liste de vos jeux</h1>
	<?php 
	if(isset($alreadyGameR))
	{
		?>
	<div class="container alert alert-danger text-center" role="alert"><?=$alreadyGameR?></div>
	<?php 
}       
?>
</div>
<?php
if(isset($alreadyGameR))
	{var_dump($alreadyGameR);
		echo '<div class="container alert alert-danger text-center" role="alert">'.$alreadyGameR.'</div>';
	}       
?>
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
						<th scope="col">Date</th>
						<th scope="col text-center">Suppression</th>
						<th scope="col text-center">Infos</th>
					</tr>
				</thead>
				<tbody class="table-light">
				<?php $i=0;
				while ($link = $links->fetch()){?>
					<tr>
						<td><?= ($i+1+intval($num)*10) ?></td>
						<td><?= (substr(strip_tags(htmlspecialchars($link['title'])),0,30)); ?></td>
						<td><?= htmlspecialchars($link['genres']); ?></td>
						<td><?= htmlspecialchars($link['name']); ?></td>
						<td><?= htmlspecialchars($link['rating']); ?></td>
						<td><?= htmlspecialchars($link['date_add']); ?></td>
						<td class='d-flex justify-content-center'><a class="btn btn-danger btn-sm mt-1" style="width: 75px;height: 31px;font-size: 13px;" href="index.php?page=deleteGame&amp;id_game=<?= $link['game_id']?>&amp;id_plat=<?= $link['id']?>" onclick =" return confirm('Etes-vous sûr ?')" >Effacer</a></td>
						<td ><a class="btn btn-info btn-sm mt-1" style="width: 75px;height: 31px;font-size: 13px;" href="index.php?page=details&amp;slug=<?= $link['slug_game']?>" >Détails</a></td>
					</tr>
				<?php $i++;}?>
				</tbody>
			</table>
			<div class="d-flex justify-content-center mb-3">
			<?php
			if($num>0){
				?>
			<a href="http://localhost/projet5/index.php?page=listing&num=<?= intval($num)-1; ?>" class='text-light mr-2'> Prev </a>
			<?php
			}?>
			<?php
			if($i==10){
				?>
					<a href="http://localhost/projet5/index.php?page=listing&num=<?= intval($num)+1; ?>" class='text-light ml-2'> Next </a>
					<?php
			}?>
			</div>
		</div>
	</div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require ("view/template.php"); ?>