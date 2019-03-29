<!doctype html>
<html lang="fr">

<head>
	<!-- Required meta tags -->

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="../images/favicon.ico" type="image/ico" sizes="16x16">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
	 crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
	 crossorigin="anonymous">
	<link rel="stylesheet" href="../css/stylesfilm.css">
	<title>Comptabilite</title>
	<script src="../js/general.js"></script>

</head>

<body>

	<?php
		session_start();
		if (isset($_SESSION['emailUsagerSS'])){
			if($_SESSION['emailUsagerSS'] == ''){
				$_SESSION['AlertNav'] = 3;
				echo '<script>self.location="../indexfilm.php";</script>';
			}
		} else {
			$_SESSION['AlertNav'] = 3;
			echo '<script>self.location="../indexfilm.php";</script>';
		}
		include 'includes/header.php';
		
		include_once "../BD/connexion.inc.php";
		include_once "../librairie/comptabilite.inc.php";
		$resultado = getRangeesCompta();
		$rangees_x_page = 6;
		$total_rangees = $resultado->idLocation;
		$pages = round(($total_rangees / $rangees_x_page) + 1, 0);
?>

	<section class="container">
		<h2 class="mb-5">Comptabilite</h1>


			<table class="table table-hover " id="tableCategories">
				<thead>
					<tr>
						<th scope="col">Id Location</th>
						<th scope="col">Total</th>
						<th scope="col">Date</th>
						<th scope="col">Nombre Reference</th>
					</tr>
				</thead>

				<tbody>
					<?php
                    if (!$_GET){
			   	      header('Location:listerComptabilite.php?pagina=1');
			        }
			        if (($_GET['pagina']> $pages)  ||  ($_GET['pagina'] <=0 )){
				       header('Location:listerComptabilite.php?pagina=1');
			        }				
				$initier = ($_GET['pagina'] - 1) * $rangees_x_page;
				$sql_comptabilite = "SELECT idLocation, totalLocation, dateLocation, numReference  FROM comptabilite WHERE totalLocation > 0 LIMIT :initier, :nrangees";
				$instruction = $connexion->prepare($sql_comptabilite);
				$instruction->bindParam(':initier', $initier, PDO::PARAM_INT);
				$instruction->bindParam(':nrangees', $rangees_x_page, PDO::PARAM_INT);
				$instruction->execute();
				$res_comptabilite = $instruction->fetchAll();
				?>
					<?php foreach ($res_comptabilite as $det_comptabilite): ?>
					<tr>
						<td>
							<?php echo $det_comptabilite['idLocation'] ?>
						</td>
						<td>
							<?php echo $det_comptabilite['totalLocation'] ?>
						</td>
						<td>
							<?php echo $det_comptabilite['dateLocation'] ?>
						</td>
						<td>
							<?php echo $det_comptabilite['numReference'] ?>
						</td>
					</tr>
					<?php endforeach?>
				</tbody>
			</table>
			<nav aria-label="Page navigation example" class=" row justify-content-center align-items-center ">
				<ul class="pagination text-light bg-dark">
					<li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>">
						<a class="page-link" href="listerComptabilite.php?pagina=<?php echo $_GET['pagina'] - 1 ?>">Précédant
						</a>
					</li>
					<?php for ($i = 0; $i < $pages; $i++): ?>
					<li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : '' ?>">
						<a class="page-link" href="listerComptabilite.php?pagina=<?php echo $i + 1 ?>">
							<?php echo $i + 1 ?>
						</a>
					</li>

					<?php endfor?>
					<li class="page-item <?php echo $_GET['pagina'] >= $pages ? 'disabled' : '' ?> ">
						<a class="page-link" href="listerComptabilite.php?pagina=<?php echo $_GET['pagina'] + 1 ?>">Suivant
						</a>
					</li>
				</ul>
			</nav>
	</section>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
 crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
 crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
 crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
<script>
	document.addEventListener('DOMContentLoaded', function () {
		bsCustomFileInput.init()
	});
</script>

</html>