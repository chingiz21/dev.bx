<?php

function escape(string $output)
{
	return htmlspecialchars($output, ENT_QUOTES);
}

function getFileName($path): string
{
	return basename($path, ".php");
}

function generateNavlinks($database): array
{
	$navLinks = [];
	$genres = getGenres($database);
	foreach ($genres as $genre)
	{
		$navLinks[$genre['CODE']] = $genre['NAME'];
	}
	return $navLinks;
}