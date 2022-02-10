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