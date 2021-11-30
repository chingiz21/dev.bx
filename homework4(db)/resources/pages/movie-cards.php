<?php
/** @var array $movies */
/** @var array $itemOfMovies */
/** @var array $config */
?>
<?php foreach ($movies as $itemOfMovies): ?>
	<?php $movie = array_change_key_case($itemOfMovies, CASE_LOWER); ?>
	<?= renderTemplate("./resources/blocks/_movieCard.php", ['movie' => $movie]) ?>
<?php endforeach; ?>