<?php

//вернуть массив с фильмом с заданным параметром-айди
function getMovieById(array $movies, string $id): array
{
	return array_filter($movies, function($movie) use ($id) {
		return (string)$movie['id'] === $id;
	});
}
//вернуть массив с фильмами с заданным параметром жанра
function getMovieByGenre(array $movies, string $genre, array $genres): array
{
	return array_filter($movies, function($movie) use ($genres, $genre) {
		if (in_array($genres[$genre], $movie['genres'], true)) {
			return $movie;
		}
	});
}
//тоже самое, только с поиском по имени
function getMovieByName(array $movies, string $name): array
{
	return array_filter($movies, function($movie) use ($name) {
		$movieName = mb_strtolower($movie['title'], "UTF-8");
		$name = trim(mb_strtolower(strip_tags($name), "UTF-8"));
		if (mb_strpos($movieName, $name, 0,"UTF-8") > -1)
			{
				return $movie['title'];
			}
	});
}