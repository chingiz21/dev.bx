<?php
/** @var array $movies */
require "./format/movies.php";
require "functions.php";
require "./format/functions-hw2.php";

printMessage("Welcome to movie list!");
while(true) {
	$input = readline("Enter age: ");
	$numberOfMovie = 1;
	if ($input === '')
	{
		printMessage("Closing the session...");
		break;
	}
	if (is_numeric($input))
	{
		printMovies($movies, $input, $numberOfMovie);
	}else
	{
		printMessage("Wrong enter age!");
	}
}

