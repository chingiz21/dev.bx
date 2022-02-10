<?php
declare(strict_types=1);
/** @var array $config */
require_once "./config/app.php";
/** @var array $navLinks */
require_once "./lib/template-functions.php";
require_once "./lib/helper-functions.php";
require_once "./lib/movies-functions.php";
/** @var array $movies */

$database = dbInit($config);
$page = "movie-details.php";
$navLinks = generateNavLinks($database);

$actorsList = getActors($database);

$genresList = getGenres($database);


$nav = renderTemplate("./resources/pages/navLink.php", [
	'navLinks' => $navLinks,
	'config' => $config
]);

if (isset($_GET['id']))
{
	$id = $_GET['id'];
	$movies = getMovieById($database, $id, $actorsList);
}

$movieNumber = array_key_last($movies);

renderLayout($page, $nav, [
	'config' => $config,
	'movies' => $movies,
	'movieNumber' => $movieNumber,
	'currentPage' => getFileName(__FILE__)
]);