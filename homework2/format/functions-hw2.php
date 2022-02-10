<?php

$numberOfMovie = 1;

function printMovies(array $movies, int $input, int $numberOfMovie): void
{
	foreach ($movies as $movie)
	{
		if($movie['age_restriction'] <= $input and $input > 0)
		{
			printMessage(formatMovie($movie, $numberOfMovie));
			$numberOfMovie++;
		}
	}
}
function formatMovie(array $movie, int $numberOfMovie): string
{
	return "{$numberOfMovie}. {$movie['title']}, {$movie['age_restriction']}+. Rating - {$movie['rating']}";
}
