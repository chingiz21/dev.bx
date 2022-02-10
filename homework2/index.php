<?php
/** @var array $movies */
require "./format/movies.php";
require "functions.php";
require "./format/functions-hw2.php";

printMessage("Welcome to movie list!");
while(true) {
	$input = readline("Enter age: ");
	if ($input === '')
	{
		printMessage("Closing the session...");
		break;
	}
	if (is_numeric($input))
	{
		printMovies($movies, (int)$input, $numberOfMovie);
	}else
	{
		printMessage("Wrong age!");
	}
}

