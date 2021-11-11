<?php

declare(strict_types=1);
/** @var array $config */
require_once "./config/app.php";
/** @var array $navLinks */
require_once "./data/navLinks.php";
/** @var array $movies */
require_once "./data/movies.php";
require_once "./lib/template-functions.php";
require_once "./lib/helper-functions.php";
$page = "./resources/pages/layout.php";


if (isset($code))
{
	$movies = getMovieByGenre($movies, $code, $genres);
}


$nav = renderTemplate("./resources/pages/navLink.php", [
	'navLinks' => $navLinks,
	'config' => $config
]);

$movieCard = renderTemplate("./resources/pages/movie-cards.php", [
	'movies' => $movies,
	'config' => $config
]);
//
renderLayout($page, $nav, [
	'config' => $config,
	'movieCard' => $movieCard,
	'currentPage' => getFileName(__FILE__)
]);