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
?>

<?php
require_once 'inc/manager-db.php';

if (isset($_GET['query']) && !empty($_GET['query'])) {
    $query = htmlspecialchars($_GET['query']); // Sécurise la requête utilisateur
    $results = searchCountry($query); // Appelle la fonction de recherche

    if (count($results) === 1) {
        // Si un seul résultat, redirige directement vers detailsPays.php
        $id = $results[0]['id']; // Récupère l'ID du pays
        header("Location: detailsPays.php?id=" . $id);
        exit;
    } elseif (!empty($results)) {
        // Si plusieurs résultats, affiche une liste de liens
        echo "<h1>Résultats pour : " . htmlspecialchars($query) . "</h1>";
        echo "<ul>";
        foreach ($results as $result) {
            echo "<li><a href='detailsPays.php?id=" . htmlspecialchars($result['id']) . "'>" . htmlspecialchars($result['Name']) . "</a></li>";
        }
        echo "</ul>";
    } else {
        echo "<h1>Aucun résultat trouvé pour : " . htmlspecialchars($query) . "</h1>";
    }
} else {
    echo "<h1>Veuillez entrer un terme de recherche.</h1>";
}
?>

<?php
    require_once 'footer.php';
    require_once 'javascripts.php';
?>