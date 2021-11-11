<?php
/** @var string $link */
/** @var string $name */
/** @var string $currentPage */
/** @var array $config */
/** @var string $code */
$linkPage = "dev.bx/homework3/my_project/index.php";
?>
<li class="<?= $link == $code ? "nav-menu__active" : "" ?>"><a href="<?= "http://dev.bx/homework3/my_project/index.php?genre=" . $link ?>"><?= $name?></a></li>


