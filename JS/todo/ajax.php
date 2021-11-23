<?php

header('content-type: application/json; charset=UTF-8');

const FILE_NAME = 'data_2.json';

$action = $_GET['action'] ?? null;

$result = [];

$returnResult = function(array $result): void {
	echo json_encode($result);
	return;
};

$saveItems = function() {
	$data = file_get_contents('php://input');

	// todo check header
	try
	{
		$response = json_decode($data, true);
	}
	catch(JsonException $e)
	{
		$response = null;
	}

	if ($response === null)
	{
		return [
			'error' => 'Incorrect json data',
		];
	}

	$items = (array)($response['items'] ?? null);

	file_put_contents(FILE_NAME, json_encode([
		'items' => $items,
	]));

	return [];
};

$loadItems = function() {
	if (!file_exists(FILE_NAME))
	{
		return [
			'items' => [],
		];
	}

	$encodedData = file_get_contents(FILE_NAME);
	try
	{
		$data = json_decode($encodedData, true);
	}
	catch(JsonException $e)
	{
		$data = [];
	}

	return [
		'items' => $data['items'] ?? [],
	];
};

$editItems = function() {
	//взять items['item][title] и затем заменить его на входящий текст
	//текст можно сохранить в переменную, которую берешь из input.value
	//при клике на edit передается текст в input.value
	//скорей всего, сначала нужно получить новый отредактированный текст, затем удалить старый и на его место поставить новый(кажется хуйней идеей, тк не сохраняется позиция)
	//нужно придумать, как просто редактировать сам текст в title
	//значит, нужно сначала разобраться в том, как получить доступ к json-y
	//затем понять как изменять текст


};

if ($action === 'save')
{
	return $returnResult($saveItems());
}
if ($action === 'load')
{
	return $returnResult($loadItems());
}

if ($action === 'edit')
{
	return $returnResult($editItems());
}

return $returnResult(['error' => 'Unknown action']);