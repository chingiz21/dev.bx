<?php
/** @var array $navLinks */
/** @var string $code */
?>

<?php foreach ($navLinks as $link => $name): ?>
	<?= renderTemplate("./resources/blocks/_navLinks.php", ['link' => $link, 'name' => $name, 'code' => $code]) ?>
<?php endforeach; ?>



