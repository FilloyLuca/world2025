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
    $langues = getlanguages($idPays);
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
        .page-container {
            margin: auto; /* Centre le contenu horizontalement */
            padding: 0 50px; /* Ajoute un espace de 20px à gauche et à droite */
            max-width: 1200px; /* Limite la largeur maximale du contenu */
        }
        
        .center {
            text-align: center;
        }
        
        .spacing{
            margin-bottom: 20px; /* Permet de mettre un espace entre le titre et le tableau */
        }

        .table-spacing {
            margin-bottom: 40px; /* Permet de mettre un espace entre le tableau du haut et ceux d'en bas  */
        }
        /*
        .langue{
            margin-left: 20px;
            margin-right: 800px;
        } 
        */
        .col-pourcentage {
            width: 10%; /* Ajustez la largeur selon vos besoins */
            text-align: center; /* Centrer le texte si nécessaire */
        }
        /*
        .donnees{
            margin-right: 20px;
            margin-left: 800px;
        }*/
        
    </style>
   
</head>

<body>
    <div class="page-container">
        <?php  $drapeau = strtolower($pays->Code2);  
            $source = "images/flag/$drapeau.png";
            if (!file_exists($source)) {
                $source = "images/flag/us.png";
            }?>
            <h1 class = "center spacing">
                <?php echo $pays->Name; ?> 
                <img src=<?php echo $source;?> alt="Drapeau de <?php echo $pays->Name; ?>" style="width: 80px; height: auto;">
            </h1>
    

<!-- Tableau des détails du pays -->
        <table class="table table-striped table-bordered table-spacing" style="width:100%">
            <tr>
                <th class="center">Code</th>
                <th class="center">Nom</th>
                <th class="center">Nom Local</th>
                <th class="center">Region</th>
                <th class="center">Capitale</th>
                <th class="center">Population</th>
                <th class="center">Surface (km2)</th>

            </tr>
            <?php //var_dump($desPays); ?>
            <?php if (!empty($desPays)) : ?>
            <tr>
                <td class="center"><?= htmlspecialchars($pays->Code) ?></td>
                <td class="center"> <?= htmlspecialchars($pays->Name) ?></td>
                <td class="center"><?= htmlspecialchars($pays->LocalName) ?></td>
                <td class="center"><?= htmlspecialchars($pays->Region) ?></td>
                <td class="center">
                    <?php 
                    $capitale = getCapitale($pays->Capital);
                    echo $capitale ? htmlspecialchars($capitale->name) : 'Pas de capitale'; 
                    ?>
                </td>
                <td class="center"><?= htmlspecialchars($pays->Population) ?></td>
                <td class="center"><?= htmlspecialchars($pays->SurfaceArea) ?></td>

            </tr>
                <?php else : ?>
            <tr>
                <td colspan="5">Aucun pays trouvé.</td>
            </tr>
                <?php endif; ?>
            </table>
    
        <br>



        <!-- Conteneur Flexbox pour aligner les tableaux -->
        <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 20px;">
            <!-- tableau des langues parlées dans le pays -->
            <div class="langue" style="flex: 1; margin: 0;">
                <h2 class="center">Langues parlées</h2>
                <table class="table table-striped table-bordered" style="width:100%; margin: 0;">
                    <tr>
                        <th class="col-pourcentage">Nom</th>
                        <th class="col-pourcentage">Pourcentage</th>
                    </tr>
                    <?php if (!empty($langues)) : ?>
                        <?php foreach($langues as $langue) : ?>
                        <tr>
                            <td class="col-pourcentage"><?= htmlspecialchars($langue->Name) ?></td>
                            <td class="col-pourcentage"><?= htmlspecialchars($langue->Percentage) ?> %</td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                    <tr>
                        <td colspan="2">Aucune langue trouvée pour ce pays.</td>
                    </tr>
                    <?php endif; ?>
                </table>
            </div>

            <!-- tableau des informations économiques et sociales -->
            <div class="donnees" style="flex: 1; margin: 0;">
                <h2 class="center">Données économiques et sociales</h2>
                <table class="table table-striped table-bordered" style="width:100%; margin: 0;">
                    <tr>
                        <th class="center">Population</th>
                        <td class="center"><?= htmlspecialchars($pays->Population) ?></td>
                    </tr>
                    <tr>
                        <th class="center">PNB</th>
                        <td class="center"><?= htmlspecialchars($pays->GNP) ?></td>
                    </tr>
                    <tr>
                        <th class="center">Chef d'Etat</th>
                        <td class="center"><?= htmlspecialchars($pays->HeadOfState) ?></td>
                    </tr>
                    <tr>
                        <th class="center">Espérance de vie</th>
                        <td class="center"><?= htmlspecialchars($pays->LifeExpectancy) ?></td>
                    </tr>
                    <?php if (!empty($desPays)) : ?>
                    <tr>
                    </tr>
                    <?php else : ?>
                    <tr>
                        <td colspan="4">Aucun pays trouvé.</td>
                    </tr>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </div>

       







</body>
<?php 
    require_once 'javascripts.php';
    require_once 'footer.php'; 
?>
</html>






