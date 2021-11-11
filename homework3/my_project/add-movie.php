<?php
declare(strict_types=1);
/** @var array $config */
require_once "./config/app.php";
/** @var array $navLinks */
require_once "./data/navLinks.php";
/** @var array $movies */
require_once "./data/movies.php";
/** @var array $genres */
require_once "./lib/template-functions.php";
require_once "./lib/helper-functions.php";
require_once "./lib/movies-functions.php";

$page = "layout.php";

if ($_SERVER["REQUEST_METHOD"] === "POST")
{
	$movieName = $_POST['search-input'];
	$movies = getMovieByName($movies, $movieName);
}

$nav = renderTemplate("./resources/pages/navLink.php", [
	'navLinks' => $navLinks,
	'config' => $config
]);

renderLayout($page, $nav, [
	'config' => $config,
	'currentPage' => getFileName(__FILE__)
]);