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

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeoWorld</title>
    <!-- Inclure Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Bienvenue sur GeoWorld</h1>
            <p class="lead text-muted">Un projet éducatif pour apprendre le développement web.</p>
            <p>
                <a href="index2.php" class="btn btn-primary my-2">Voir un pays</a>
                <a href="Map.php" class="btn btn-secondary my-2">Voir la carte</a>
            </p>
        </div>
    </section>

    <div class="container">
        <h2>À propos du projet</h2>
        <p>GeoWorld est un projet pédagogique destiné aux étudiants apprentis développeurs. Il a pour objectif :</p>
        <ul>
            <li>Apprendre à travailler sur la base d'un existant simple</li>
            <li>Apprendre à respecter des conventions de codage</li>
            <li>Initier à une architecture 3 tiers Web simple</li>
            <li>Développer la créativité</li>
            <li>Introduire un peu de méthodologie (user story, Trello, phpcs, ...)</li>
        </ul>

        <h2>Prérequis</h2>
        <ul>
            <li>Base de PHP</li>
            <li>Base de SQL</li>
            <li>Base de HTML/CSS</li>
        </ul>

        <h2>Limites du projet</h2>
        <ul>
            <li>Pas d'usage de framework pour la structuration du projet</li>
            <li>Pas de prise en compte de la sécurité au début du projet</li>
            <li>Pas une initiation au gestionnaire de version git non plus</li>
            <li>Pas de problématique de déploiement (à dockeriser ?)</li>
        </ul>

        <p><em>Initié au lycée Léonard de Vinci - 77000 Melun</em></p>
    </div>

    <!-- Inclure les fichiers JS de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
    require_once 'footer.php';
?>

