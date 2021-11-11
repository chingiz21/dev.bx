<?php
/** @var array $config */
/** @var string $nav */
/** @var string $content */
/** @var string $currentPage */
/** @var string $movieCard */
/** @var string $code */

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Cache-Control" content="no-cache">
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
			<div class="header-wrapper">
				<div class="search-form">
					<form action="index.php" method="post">
					<i class="fas fa-search"></i>
					<input class="search-input" type="search" name="search-input" placeholder="Поиск по каталогу..."
					   	id="search">
					<button class="search-button" type="submit">Искать</button>
				</div>
				<div class="header_addMovie">
					<button class="btn btn_addMovie">
						Добавить фильм
					</button>
				</div>
				</form>
			</div>
		</header>
		<div class="main-container__content">
			<?= $movieCard?>
		</div>
	</div>
</body>

</html>
