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
					<th scope="col">Dévellopeurs</th>
                    <th scope="col">Note</th>
                    <th scope="col">Date ajout</th>
                    <th scope="col">Suppression</th>



					</tr>
				</thead>
				
				<tbody class="table-light">
					<tr>
                        <th>1</th>
                        <td>Pokémon</td>
                        <td>RPG</td>
                        <td>Game BOY</td>
                        <td>Games freak</td>
                        <td>5</td>
                        <td>01/01/2020</td>

                        <td>
                        <a class="btn btn-danger btn-sm mt-1"  style="width: 75px;height: 31px;font-size: 13px;" onclick =" return confirm('Etes-vous sûr ?')" >Effacer</a>
                        </td>
					</tr>
				</tbody>
				</table>
			</div>
		</div>
	</div>

<?php $content = ob_get_clean(); ?>
<?php require ("view/template.php"); ?>