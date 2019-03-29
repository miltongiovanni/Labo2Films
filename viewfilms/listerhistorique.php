<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../images/favicon.ico" type="image/ico" sizes="16x16">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/stylesfilm.css">
    <title>Historique de Location</title>
    <script src="../js/general.js"></script>

</head>

<body>

    <?php
	session_start();
	include 'includes/header.php';

	include_once "../BD/connexion.inc.php";
	include_once "../librairie/historique.inc.php";
	$resultado = getRangeesHistorique();
	$rangees_x_page = 6;
	$total_rangees = $resultado->idLocation;
	$pages = round(($total_rangees / $rangees_x_page) + 1, 0);
  	?>

    <section class="container">
        <h1>Consulter l'histoire</h1>
        <button type="button" class="btn btn-outline-warning mb-2" data-toggle="modal" data-target="#Historique">Générer Historique</button>

        <table class="table table-hover " id="tableCategories">
            <thead>
                <tr>
                    <th scope="col">Id Location</th>
                    <th scope="col">Film</th>
                    <th scope="col">Id Membre</th>
                    <th scope="col">Date </th>
                    <th scope="col">Jour Location </th>
                </tr>
            </thead>
            <tbody>
                <?php
                     if (!$_GET){
                         header('Location:listerhistorique.php?pagina=1');
                     }
                     if (($_GET['pagina']> $pages)  ||  ($_GET['pagina'] <=0 )){
                         header('Location:listerhistorique.php?pagina=1');
                     }
                    $initier = ($_GET['pagina'] - 1) * $rangees_x_page;
                    $sql_historique = "SELECT historique.idLocation, historique.idFilm, historique.idMembre, historique.dateLocation, historique.JoursLocation , films.titreFilm FROM historique INNER JOIN films ON historique.idFilm = films.idFilm  LIMIT :initier, :nrangees";
                    $instruction = $connexion->prepare($sql_historique);
                    $instruction->bindParam(':initier', $initier, PDO::PARAM_INT);
                    $instruction->bindParam(':nrangees', $rangees_x_page , PDO::PARAM_INT);
					$instruction->execute();
                    $res_historique = $instruction->fetchAll();
        
                 
				?>
                <?php foreach ($res_historique as $det_historique): ?>
                <tr>
                    <td>
                        <?php echo $det_historique['idLocation'] ?>
                    </td>
                    <td>
                        <?php echo $det_historique['idFilm'] . ' - ' . $det_historique['titreFilm'] ?>
                    </td>
                    <td>
                        <?php echo $det_historique['idMembre'] ?>
                    </td>
                    <td>
                        <?php echo $det_historique['dateLocation'] ?>
                    </td>
                    <td>
                        <?php echo $det_historique['JoursLocation'] ?>
                    </td>

                </tr>
                <?php endforeach?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example" class=" row justify-content-center align-items-center ">
            <ul class="pagination text-light bg-dark">
                <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>">
                    <a class="page-link" href="listerhistorique.php?pagina=<?php echo $_GET['pagina'] - 1 ?>">Précédant
                    </a>
                </li>
                <?php for ($i = 0; $i < $pages; $i++): ?>
                <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : '' ?>">
                    <a class="page-link" href="listerhistorique.php?pagina=<?php echo $i + 1 ?>">
                        <?php echo $i + 1 ?>
                    </a>
                </li>

                <?php endfor?>
                <li class="page-item <?php echo $_GET['pagina'] >= $pages ? 'disabled' : '' ?> ">
                    <a class="page-link" href="listerhistorique.php?pagina=<?php echo $_GET['pagina'] + 1 ?>">Suivant
                    </a>
                </li>
            </ul>
        </nav>
    </section>



    <!-- Modal-->
    <div class="modal fade" id="Historique" tabindex="-1" role="dialog" aria-labelledby="ModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel1">Générer l'histoire</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formHistorique" enctype="multipart/form-data" action="enregistrerHistorique.php" method="post">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <?php  $listdate=getRangeesCount();  ?>
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-warning" type="button">Date de Recueil</button>
                            </div>
                            <select id="DateHistorique" name="DateHistorique" class="custom-select" id="inputGroupSelect03" aria-label="Example select with button addon">
                                <option selected>choisir...</option>
                                <?php 
                                        for ($i = 0; $i < count($listdate); $i++) {
                                            $chain = 'Date:'. $listdate[$i]->dateEcheance . 'Nom des enregistrements:'.$listdate[$i]->nroranges ;
                                            echo '<option value="'. $listdate[$i]->dateEcheance .'">'. $chain .'</option>';
                                        }
                                    ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-warning">Générer</button>
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        bsCustomFileInput.init()
    });

</script>


</html>
