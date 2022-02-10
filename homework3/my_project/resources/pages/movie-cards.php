<?php
/** @var array $movies */
/** @var array $movie */
/** @var array $config */
?>
<?php foreach ($movies as $movie): ?>
	<?= renderTemplate("./resources/blocks/_movieCard.php", ['movie' => $movie]) ?>
<?php endforeach; ?>