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

?>

<!DOCTYPE html>

<head>
    <html lang="fr">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails : <?= isset($pays->Name) ? htmlspecialchars($pays->Name) : 'Pays inconnu' ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php echo $pays->Name ?>
    <h1 class="centerTitle"><?= isset($pays->Name) ? htmlspecialchars($pays->Name) : 'Pays inconnu' ?></h1>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <tr>
            <th>Nom</th>
            <th>Capitale</th>
            <th>Population</th>
            <th>Region</th>
            <th>Surface (km2)</th>
        </tr>
        <?php //var_dump($desPays); ?>
        <?php if (!empty($desPays)) : ?>
        <tr>
            <td> <?= htmlspecialchars($pays->Name) ?></td>
            <td>
                <?php 
                $capitale = getCapitale($pays->Capital);
                echo $capitale ? htmlspecialchars($capitale->name) : 'Pas de capitale'; 
                ?>
            </td>
            <td><?= htmlspecialchars($pays->Population) ?></td>
            <td><?= htmlspecialchars($pays->Region) ?></td>
            <td><?= htmlspecialchars($pays->SurfaceArea) ?></td>
        </tr>
        <?php else : ?>
        <tr>
            <td colspan="5">Aucun pays trouvé.</td>
        </tr>
        <?php endif; ?>
        </table>
    
</body>
<?php require_once 'footer.php'; ?>
</html>






