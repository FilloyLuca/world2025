<?php
/**
 * Fragment Header HTML page
 *
 * PHP version 7
 *
 * @category  Page_Fragment
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */

 
  require_once 'inc/manager-db.php';
  $lesContinents = getContinent() ;
  $lesPays = getAllCountries();

?><!doctype html>
<html lang="fr" class="h-100">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <title>Homepage : GeoWorld</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet">

  <style>

    .dropdown-menu{
      max-height: 400px;
      overflow-y: auto;
    }

    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

  </style>

  <!-- Custom styles for this template -->
  <link href="css/custom.css" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">
<header>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="Home.php">GeoWorld</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <!--<a class="nav-link" href="Map.php">Map <span class="sr-only">(current)</span></a>-->
          <a class="nav-link" href="Map.php">Map <span class="sr-only">(current)</span></a>
        </li>
        <!--
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        -->
        <!--
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li>
        -->


        <!----
        //Ma partie en dur je crois ça s'apelle comme ça 
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
             aria-expanded="false">Dropdown</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="index2.php?name=Asia">Asie</a>
            <a class="dropdown-item" href="index2.php?name=Africa">Afrique</a>
            <a class="dropdown-item" href="index2.php?name=North America">Amerique Du Nord</a>
            <a class="dropdown-item" href="index2.php?name=Antarctica">Antartique</a>
            <a class="dropdown-item" href="index2.php?name=Europe">Europe</a>
            <a class="dropdown-item" href="index2.php?name=Oceania">Oceanie</a>
          </div>
        </li>
        ----->
          
        <!--Dropdown Pays-->
        <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">Pays</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                      <?php foreach($lesPays as $pays) : ?>
                        <a class="dropdown-item" href="detailsPays.php?name=<?= $pays->Name ; ?>"><?= $pays->Name; ?> </a>
                      <?php endforeach ; ?>
                    </div>
        </li>

        <!--Dropdown Continents-->
        <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">Continents</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                      <?php foreach($lesContinents as $leContinent) : ?>
                        <a class="dropdown-item" href="index2.php?name=<?= $leContinent->continent ; ?>"><?= $leContinent->continent; ?> </a>
                      <?php endforeach ; ?>
                    </div>
        </li>

                
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="todo-projet.php">
            Présentation-Atelier-de-Prof-SLAM
          </a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
        <input class="form-control mr-sm-2" type="text" name="query" placeholder="Search" aria-label="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
</header>
