<?php
/** @var array $config */
/** @var string $nav */
/** @var string $content */
/** @var string $currentPage */
/** @var array $movies */
/** @var int $movieNumber */
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $config['title']?></title>
	<link rel="stylesheet" href="./resources/css/reset.css">
	<link rel="stylesheet" href="./resources/css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
		  integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>



<body>
<div class="wrapper">
	<nav>
		<div class="logo">
			<div class="logo-img"></div>
		</div>
		<div class="nav-menu">
			<ul>
				<?php foreach ($config['menu'] as $code => $name): ?>
					<li class="<?= $currentPage === $code ? "nav-menu__active" : "" ?>"><a href="<? $code . ".php"?>"><?= $name ?></a></li>
				<?php endforeach; ?>
				<?= $content?>
			</ul>
		</div>
	</nav>
	<div class="main-container">
		<header class="header">
			<div class="search-form">
				<i class="fas fa-search"></i>
				<input class="search-input" type="search" name="search-input" placeholder="Поиск по каталогу"
					   id="search">
				<button class="search-button" type="submit">Искать</button>
			</div>
			<div class="header_addMovie">
				<button class="btn btn_addMovie">
					Добавить фильм
				</button>
			</div>
		</header>
		<div class="main-container__content">
			<div class="movie-info-container">
				<div class="movie-info-wrapper">
					<div class="movie-info__head">
						<div class="movie-info__head-title">
							<div class="movie-info__head-name"><?= $movies[$movieNumber]['title'] ?></div>
							<div class="movie-info__head-like" id="like"><i class="fas fa-heart" id="likeButton"></i></div>
						</div>
						<div class="movie-info__head-titleEn">
							<div class="movie-info__head-titleEn-name">
								<?= $movies[$movieNumber]['original-title'] ?>
							</div>
							<div class="age-restrict"><?= $movies[$movieNumber]['age-restriction'] ?>+</div>
						</div>
						<div class="movie-info__head-titleHr"></div>
					</div>
					<div class="movie-info__content">
						<div class="movie-info__content-pict" <?= "style=\"background: url(resources/src/movie-cards/" . $movies[$movieNumber]['id']  . ".jpg) center no-repeat; background-size: 470px 730px\" "?>></div>
						<div class="movie-info__content-info">

							<div class="movie-info__content-rating">
								<div class="stars-outer">
									<div class="stars-inner"></div>
								</div>
								<div class="movie-info__content-rating-number" id="text-rating"><?= $movies[$movieNumber]['rating'] ?></div>
							</div>
							<div class="movie-info__content-text">
								<div class="movie-info__content-about">О фильме</div>
								<div class="movie-info__content-movieInfo">
									<div class="movie-info__content-movieInfo-titles">
										<span class="movieInfo-header">Год производства:</span>
										<span class="movieInfo-header">Режиссер:</span>
										<span class="movieInfo-header">В главных ролях:</span>
									</div>
									<div class="movie-info__content-movieInfo-descs">
										<span class="movieInfo-content"><?= $movies[$movieNumber]['release-date'] ?></span>
										<span class="movieInfo-content"><?= $movies[$movieNumber]['director'] ?></span>
										<span class="movieInfo-content">
											<?php foreach ( $movies[$movieNumber]['cast'] as $actor): ?>
												<?php if ($actor == end($movies[$movieNumber]['cast'])): ?>
													<?= $actor?>
												<?php else: ?>
													<?= $actor . ", "?>
												<?php endif; ?>
											<?php endforeach;?>
										</span>
									</div>
								</div>
								<div class="movie-info__content-descTitle">Описание</div>
								<div class="movie-info__content-desc"><?= $movies[$movieNumber]['description'] ?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>

<script src="./resources/js/likeButton.js"></script>

</html>
