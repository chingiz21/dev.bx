<?php
/** @var string $link */
/** @var string $name */
/** @var string $currentPage */
/** @var array $config */
/** @var string $code */
?>
<li class="<?= $link === $code ? "nav-menu__active" : "" ?>"><a href="<?= "index.php?genre=" . $link ?>"><?= $name?></a></li>


