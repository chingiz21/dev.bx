<?php
/** @var array $movie */
$minutes = $movie['duration'];
$hours = floor($minutes / 60);
?>

<div class="movie-card__wrapper">
	<div class="movie-card__wrapper-hidden">
		<div class="movie-card__wrapper-hidden-link">
			<a href="<?="http://dev.bx/homework3/my_project/movie-details.php?id=" . $movie['id']?>" >Подробнее</a>
		</div>
	</div>
	<div class="movie-card__img" <?= "style=\"background: url(resources/src/movie-cards/" . $movie['id']  . ".jpg) center no-repeat; background-size: 370px 430px\" "?>></div>
	<div class="movie-card__text">
		<div class="movie-card__title">
			<div class="movie-card__title-name">
				<?= $movie['title'] . " (" . $movie['release-date'] . ")" ?>
			</div>
			<div class="movie-card__title-nameEn">
				<?= $movie['original-title'] ?>
			</div>
		</div>
		<div class="movie-card__line"></div>
		<div class="movie-card__descr">
			<?= $movie['description'] ?>
		</div>
		<div class="movie-card__info">
			<div class="movie-card__info-time">
				<i class="far fa-clock"></i>
				<?= $movie['duration'] . " мин. "?> / <?= $hours . ":" . ($minutes - ($hours*60)) ?>
			</div>
			<div class="movie-card__info-genres">
				<?php foreach ( $movie['genres'] as $genre): ?>
					<?php if ($genre == end($movie['genres'])): ?>
						<?= $genre?>
					<?php else: ?>
						<?= $genre . ", "?>
					<?php endif; ?>
				<?php endforeach;?>
			</div>


		</div>
	</div>

</div>