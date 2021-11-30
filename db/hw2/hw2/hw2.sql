#1.Вывести список фильмов, в которых снимались одновременно Арнольд Шварценеггер* и Линда Хэмилтон*.
# Формат: ID фильма, Название на русском языке, Имя режиссёра.

SELECT
       DISTINCT
       m.ID,
       mt.TITLE,
       d.NAME
FROM movie m
INNER JOIN movie_title mt on m.ID = mt.MOVIE_ID
INNER JOIN director d on m.DIRECTOR_ID = d.ID
INNER JOIN movie_actor ma on m.ID = ma.MOVIE_ID
WHERE
	ma.ACTOR_ID IN (1,3)
AND
	LANGUAGE_ID = 'ru';


# 2. Вывести список названий фильмов на англйском языке с "откатом" на русский, в случае если название на английском не задано.
#    Формат: ID фильма, Название.

SELECT
	m.ID,
    mt.TITLE
FROM movie m
INNER JOIN movie_title mt on m.ID = mt.MOVIE_ID
WHERE
	EXISTS(
	    SELECT 'X' FROM movie_title
	    WHERE mt.MOVIE_ID = m.ID
	    AND mt.LANGUAGE_ID = 'en'
	    )
OR EXISTS(
		SELECT 'X' FROM movie_title
		WHERE mt.MOVIE_ID = m.ID
		  AND mt.LANGUAGE_ID = 'ru'
	)
GROUP BY 1;

# 3. Вывести самый длительный фильм Джеймса Кэмерона*.
#  Формат: ID фильма, Название на русском языке, Длительность.
# (Бонус – без использования подзапросов)

SELECT
	m.ID,
    mt.TITLE,
    LENGTH
FROM movie m
INNER JOIN movie_title mt on m.ID = mt.MOVIE_ID
WHERE
	LENGTH = (SELECT MAX(LENGTH) FROM movie)
AND
    LANGUAGE_ID = 'ru';

SELECT
	ID,
    TITLE,
    LENGTH
FROM movie m
INNER JOIN movie_title mt on m.ID = mt.MOVIE_ID
ORDER BY LENGTH DESC LIMIT 1;

# 4. ** Вывести список фильмов с названием, сокращённым до 10 символов. Если название короче 10 символов – оставляем как есть. Если длиннее – сокращаем до 10 символов и добавляем многоточие.
#  Формат: ID фильма, сокращённое название
SELECT
	IF( CHAR_LENGTH(TITLE) > 10, CONCAT(SUBSTRING(TITLE, 1, 10), '...') , TITLE) AS TITLE
FROM movie_title;


# 5. Вывести количество фильмов, в которых снимался каждый актёр.
#    Формат: Имя актёра, Количество фильмов актёра.

SELECT
	NAME,
	COUNT(ma.MOVIE_ID) AS MOVIE_COUNT
FROM movie_actor ma
INNER JOIN movie m on ma.MOVIE_ID = m.ID
INNER JOIN actor a on ma.ACTOR_ID = a.ID
GROUP BY 1;

# 6. Вывести жанры, в которых никогда не снимался Арнольд Шварценеггер*.
#   Формат: ID жанра, название

SELECT
    DISTINCT
	ID,
    NAME,
    ACTOR_ID
FROM genre g
INNER JOIN movie_genre mg on g.ID = mg.GENRE_ID
INNER JOIN movie_actor ma on mg.MOVIE_ID = ma.MOVIE_ID
WHERE
	 NOT EXISTS(SELECT 'X' FROM movie_genre
	     WHERE ACTOR_ID IN (1));

# 7. Вывести список фильмов, у которых больше 3-х жанров.
#   Формат: ID фильма, название на русском языке

SELECT
	mt.MOVIE_ID,
    TITLE
FROM movie_genre mg
INNER JOIN movie_title mt on mg.MOVIE_ID = mt.MOVIE_ID
WHERE
	LANGUAGE_ID = 'ru'
GROUP BY 1
HAVING COUNT(mg.MOVIE_ID) > 3;


# 8. Вывести самый популярный жанр для каждого актёра.
#   Формат вывода: Имя актёра, Жанр, в котором у актёра больше всего фильмов.

SELECT
    DISTINCT
	NAME,
    GENRE_ID,
    COUNT(GENRE_ID)
FROM actor a
INNER JOIN movie_actor ma on a.ID = ma.ACTOR_ID
INNER JOIN movie_genre mg on ma.MOVIE_ID = mg.MOVIE_ID
WHERE GENRE_ID = (SELECT GENRE_ID FROM movie_genre
	GROUP BY GENRE_ID
    ORDER BY COUNT(NAME)
    DESC
    LIMIT 1)
GROUP BY NAME;

# * Во всех запросах по конкретному актёру / режиссёру, можно в запросы сразу подставлять ID актёра  / режиссёра. Поиск по имени делать не требуется.
# ** Обратите внимание, что для подсчета длины строки в символах, а не байтах, в MySQL используется функция LENGTH_CHAR