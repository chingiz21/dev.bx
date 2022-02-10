CREATE TABLE movie_title
(
    MOVIE_ID int not null,
    LANGUAGE_ID char(2) not null ,
    TITLE varchar(256) not null ,

	PRIMARY KEY (MOVIE_ID, LANGUAGE_ID),

	FOREIGN KEY FK_LANGUAGE_ID(LANGUAGE_ID)
		REFERENCES language(ID)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	FOREIGN KEY FK_MOVIE_ID(MOVIE_ID)
		REFERENCES movie(ID)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
);

CREATE TABLE language
(
	ID char(2) not null ,
	NAME varchar(256) not null,
	PRIMARY KEY (ID)
);

INSERT INTO language(ID, NAME)
VALUES ('ru', 'Russian'),
       ('en', 'English');

INSERT INTO movie_title (MOVIE_ID, LANGUAGE_ID, TITLE)
SELECT ID, 'ru', TITLE FROM movie;

INSERT INTO movie_title(TITLE) SELECT TITLE FROM movie;
/*В общем, долго я почему-то мучался с этой задачей, хотя вроде простая, но у меня возникли проблемы с ключами, а именно с тем, что при копировании данных из movie постоянно
  кидало ошибку с constraint foreign key. Ничего лучше, чем вписать дефолтные значения "ру", я не придумал. Скорей всего, это ошибочное решение, ибо если добавится фильм с
  кодом языка "en", то дефолт значение кода языка на этот фильм тоже пойдет "ру". надеюсь на ваш комментарий
 */

SELECT * FROM movie_title;
