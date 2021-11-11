<?php

//вернуть массив с фильмом с заданным параметром-айди
function getMovieById(array $movies, string $id): array
{
	return array_filter($movies, function($movie) use ($id) {
		return $movie['id'] == $id;
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
		return $movie['title'] === $name;
	});
}