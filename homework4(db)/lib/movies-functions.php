<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


function getMovieById($database, string $id, array $actorsList): array
{
	$id = (int)$id;

	$query = querySelectOfMovies() . ' where m.ID = ' . $id . ' group by 1';
	$result = mysqli_query($database, $query,MYSQLI_STORE_RESULT);

//	if (!$result)
//	{
//		$error = mysqli_errno($database) . ': ' . mysqli_error($database);
//		trigger_error($error, E_USER_ERROR);
//	}

	$result2 = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return returnModifiedArray($result2, $actorsList, 'ACTORS');
}

function getMovieByName(array $movies, string $name): array
{
	return array_filter($movies, function($movie) use ($name) {
		$movieName = mb_strtolower($movie['TITLE'], "UTF-8");
		$name = mb_strtolower(trim(strip_tags($name)), "UTF-8");
		if (mb_strpos($movieName, $name, 0,"UTF-8") > -1)
			{
				return $movie['TITLE'];
			}
	});
}

function getActors($database): array
{
	$query = 'select ID, NAME from actor';

	$result = mysqli_query($database, $query, MYSQLI_STORE_RESULT);
	return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getGenres($database): array
{
	$query = 'SELECT CODE, NAME FROM genre';

	$result = mysqli_query($database, $query,MYSQLI_STORE_RESULT);

	return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function querySelectOfMovies(): string
{
	$query = 'select
				distinct
				m.ID,
				TITLE,
				ORIGINAL_TITLE,
				DESCRIPTION,
				DURATION,
				AGE_RESTRICTION,
				RELEASE_DATE,
				RATING,
				d.NAME as Director,
				(select group_concat(distinct GENRE_ID) from movie_genre where movie_genre.MOVIE_ID = m.ID) as GENRES,
                (select group_concat(distinct ACTOR_ID) from movie_actor where MOVIE_ID = m.ID) as ACTORS
			from movie m
			inner join director d on m.DIRECTOR_ID = d.ID
			inner join movie_genre mg on m.ID = mg.MOVIE_ID
			inner join genre g on mg.GENRE_ID = g.ID
			';

	return $query;
}

function getListOfMovies($database, array $genres, string $searchKey = '')
{
	if ($searchKey === '')
	{
		$query = querySelectOfMovies() . 'group by 1';

		$queryResult = mysqli_query($database, $query, MYSQLI_STORE_RESULT);
		$assocArray = mysqli_fetch_all($queryResult, MYSQLI_ASSOC);
		return returnModifiedArray($assocArray, $genres);
	}

	$searchKey = mysqli_real_escape_string($database, $searchKey);
	$query = querySelectOfMovies() . 'where g.CODE = \'' . $searchKey . '\' ' . ' group by 1';

	$queryResult = mysqli_query($database, $query, MYSQLI_STORE_RESULT);
	$assocArray = mysqli_fetch_all($queryResult, MYSQLI_ASSOC);

	return returnModifiedArray($$assocArray, $genres);

}

function returnModifiedArray(array $arr, array $keyList, string $key = 'GENRES')
{
	$newArray = [];
	foreach ($arr as &$movie)
	{
		$movieItems = explode(',', $movie[$key]);
		foreach ($movieItems as $item)
		{
			$item = (int)$item - 1;
			$result = $keyList[$item]['NAME'];
			$newArray[] = $result;
		}
		$movie[$key] = $newArray;
		$newArray = [];
	}
	return $arr;
}


//region OLD METHODS
//function returnModifiedArray(array $arr, array $genres) {
//	$newArray = [];
//	foreach ($arr as &$movie)
//	{
//		$movieGenres = explode(',', $movie['GENRES']);
//		foreach ($movieGenres as $genre)
//		{
//			$genre = (int)$genre - 1;
//			$result = $genres[$genre]['NAME'];
//			$newArray[] = $result;
//		}
//		$movie['GENRES'] = $newArray;
//		$newArray = [];
//	}
//	return $arr;
//}
//
//function returnModifiedArrayByActors(array $arr, array $actorsList)
//{
//	$newArray = [];
//
//	foreach ($arr as &$movie)
//	{
//		$movieActors = explode(',', $movie['ACTORS']);
//
//		foreach ($movieActors as $actor)
//		{
//			$actor = (int)$actor - 1;
//			$result = $actorsList[$actor]['NAME'];
//			$newArray[] = $result;
//		}
//		$movie['ACTORS'] = $newArray;
//		$newArray = [];
//	}
//	return $arr;
//}
//endregion

//region FAILED ATTEMPTS
// $query = "select
// 				distinct
// 				m.ID,
// 				TITLE,
// 				ORIGINAL_TITLE,
// 				DESCRIPTION,
// 				DURATION,
// 				AGE_RESTRICTION,
// 				RELEASE_DATE,
// 				RATING,
// 				d.NAME as Director,
// 				(select group_concat(distinct GENRE_ID) from movie_genre where movie_genre.MOVIE_ID = m.ID) as Genres,
//                 (select group_concat(distinct ACTOR_ID) from movie_actor where MOVIE_ID = m.ID) as Actors
// 			from movie m
// 			inner join director d on m.DIRECTOR_ID = d.ID
// 			inner join movie_genre mg on m.ID = mg.MOVIE_ID
// 			inner join genre g on mg.GENRE_ID = g.ID
// 			?
// 			group by 1";

// $preparedStatement = mysqli_prepare($database, $query);
//
// mysqli_stmt_bind_param($preparedStatement, 's', $searchKey);
// mysqli_stmt_execute($preparedStatement);
// $result3 = mysqli_stmt_get_result($preparedStatement);
//endregion
