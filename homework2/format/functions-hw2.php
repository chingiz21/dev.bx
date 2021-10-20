<?php

function printMovies(array $movies, int $input, int $numberOfMovie): void
{
	foreach ($movies as $movie)
	{
		if($movie['age_restriction'] <= $input)
		{
			printMessage(formatMovie($movie, $numberOfMovie));
			$numberOfMovie++;
		}else
		{
			continue;
		}
	}
}
function formatMovie(array $movie, int $numberOfMovie): string
{
	return "{$numberOfMovie}. {$movie['title']}, {$movie['age_restriction']}+. Rating - {$movie['rating']}";
}
