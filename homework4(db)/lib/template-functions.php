<?php

function renderTemplate(string $path, array $templateData = []): string
{
	if(!file_exists($path))
	{
		return "";
	}

	extract($templateData, EXTR_OVERWRITE);

	ob_start();

	include $path;

	return ob_get_clean();
}
//переделал функцию из лекции и добавил параметр, который будет рендерить нужную страницу
function renderLayout(string $page, string $content, array $templateData = []): void
{
	$data = array_merge($templateData, [
		'content' => $content
	]);
	$result = renderTemplate("./resources/pages/" . $page, $data);

	echo $result;
}

function dbInit($config) {
	$database = mysqli_init();
	$host = $config['db_config']['host'];
	$user = $config['db_config']['user'];
	$password = $config['db_config']['pass'];
	$dbName = $config['db_config']['db_name'];

	$connectionResult = mysqli_real_connect(
		$database,
		$host,
		$user,
		$password,
		$dbName
	);

	if (!$connectionResult)
	{
		$error = mysqli_connect_errno($database) . " : " . mysqli_connect_error($database);
		trigger_error($error, E_USER_ERROR);
	}

	$result = mysqli_set_charset($database, 'utf8');
	if (!$result)
	{
		trigger_error(mysqli_error($database), E_USER_ERROR);
	}

	return $database;
}