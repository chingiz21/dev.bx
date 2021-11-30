<?php
//region init params
declare(strict_types=1);
/** @var array $config */
require_once "./config/app.php";
/** @var array $navLinks */
/** @var array $movies */
/** @var array $genres */
require_once "./lib/template-functions.php";
require_once "./lib/helper-functions.php";
require_once "./lib/movies-functions.php";
/** @var array $database */
require_once "./lib/db_init.php";
//endregion

$page = 'layout.php';
$code = '';
$currentPage = getFileName(__FILE__);

$navLinks = generateNavLinks($database);

$genresList = getGenres($database);

if (isset($_GET['genre']))
{
	$code = $_GET['genre'];
	$currentPage = '';
	$movies = getListOfMovies($database, $genresList, $code);
}else
{
	$movies = getListOfMovies($database, $genresList);
}

if (isset($_GET['search-input']))
{
	$movieName = $_GET['search-input'];
	$movies = getMovieByName($movies, $movieName);
}


// if ($_SERVER["REQUEST_METHOD"] === "POST")
// {
// 	$movieName = $_POST['search-input'];
// 	$movies = getMovieByName($movies, $movieName);
// }

$nav = renderTemplate("./resources/pages/navLink.php", [
	'navLinks' => $navLinks,
	'code' => $code,
	'config' => $config
]);

$movieCard = renderTemplate("./resources/pages/movie-cards.php", [
	'movies' => $movies,
	'config' => $config
]);

renderLayout($page, $nav, [
	'config' => $config,
	'movieCard' => $movieCard,
	'currentPage' => $currentPage
]);