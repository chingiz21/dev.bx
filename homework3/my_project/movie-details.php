<?php
declare(strict_types=1);
/** @var array $config */
require_once "./config/app.php";
/** @var array $navLinks */
require_once "./data/navLinks.php";
require_once "./lib/template-functions.php";
require_once "./lib/helper-functions.php";
require_once "./lib/movies-functions.php";
/** @var array $movies */
require_once "./data/movies.php";

$page = "movie-details.php";

$nav = renderTemplate("./resources/pages/navLink.php", [
	'navLinks' => $navLinks,
	'config' => $config
]);

if (isset($_GET['id']))
{
	$id = $_GET['id'];
	$movies = getMovieById($movies, $id);
}

$movieNumber = array_key_last($movies);

renderLayout($page, $nav, [
	'config' => $config,
	'movies' => $movies,
	'movieNumber' => $movieNumber,
	'currentPage' => getFileName(__FILE__)
]);