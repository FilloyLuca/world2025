<?php
/**
 * Home Page
 *
 * PHP version 7
 *
 * @category  Page
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */
?>

<?php  
require_once 'header.php'; 
//$lesContinents = getCountriesByContinent();
require_once 'inc/manager-db.php';

//var_dump($_GET);

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $idPays = ($_GET['id']);
    //var_dump($idPays); // Vérifiez l'ID récupéré
    $pays = getDetailsPays($idPays);    
    $capitale = getCapitale($pays->Capital);
    if ($pays) {
        $desPays = [$pays];
    } else {
        $desPays = [];
        echo "Aucun pays trouvé pour l'ID : $idPays.";
    }
} else {
    echo "Paramètre 'id' manquant.";
    $desPays = []; // Si aucun ID n'est fourni, on initialise $desPays comme un tableau vide
}

$langues = getlanguages($idPays)
?>

<   
<!DOCTYPE html>

<head>
    <html lang="fr">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails : <?= isset($pays->Name) ? htmlspecialchars($pays->Name) : 'Pays inconnu' ?></title>
    <link href="css/style.css" rel="stylesheet">
    <!-- Inclure Bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .langue{
            margin-left: 20px;
            margin-right: 800px;
        }
    </style>
   
</head>

<body>
    <h1 class="centerTitle"><?= isset($pays->Name) ? htmlspecialchars($pays->Name) : 'Pays inconnu' ?></h1>

<!-- Tableau des détails du pays -->
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <tr>
            <th>Code</th>
            <th>Nom</th>
            <th>Region</th>
            <th>Capitale</th>
            <th>Population</th>
            <th>Surface (km2)</th>

        </tr>
        <?php //var_dump($desPays); ?>
        <?php if (!empty($desPays)) : ?>
        <tr>
            <td><?= htmlspecialchars($pays->Code) ?></td>
            <td> <?= htmlspecialchars($pays->Name) ?></td>
            <td><?= htmlspecialchars($pays->Region) ?></td>
            <td>
                <?php 
                $capitale = getCapitale($pays->Capital);
                echo $capitale ? htmlspecialchars($capitale->name) : 'Pas de capitale'; 
                ?>
            </td>
            <td><?= htmlspecialchars($pays->Population) ?></td>
            <td><?= htmlspecialchars($pays->SurfaceArea) ?></td>

        </tr>
            <?php else : ?>
        <tr>
            <td colspan="5">Aucun pays trouvé.</td>
        </tr>
            <?php endif; ?>
        </table>
    
    <br>

    <h2>Langues parlées</h2>

<!-- tableau des langues parlées dans le pays -->
    <div class="langue">
        <table class="table table-striped table-bordered" style="width:100%">
        <tr>
            <td>Nom</td>
            <td>Pourcentage</td>
        </tr>
        <?php //var_dump($desPays); ?>
        <?php if (!empty($langues)) : ?>
            <?php foreach($langues as $langue) : ?>
        <tr>
            <td><?= htmlspecialchars($langue->Name) ?></td>
            <td><?= htmlspecialchars($langue->Percentage) ?></td>
        </tr>
            <?php endforeach; ?>
        <?php else : ?>
        <tr>
            <td colspan="5">Aucune langues trouvées pour ce pays.</td>
        </tr>
            <?php endif; ?>
        </table>









</body>
<?php 
    require_once 'javascripts.php';
    require_once 'footer.php'; 
?>
</html>






