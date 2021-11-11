<?php

function escape(string $output)
{
	return htmlspecialchars($output, ENT_QUOTES);
}

function getFileName($path): string
{
	return basename($path, ".php");
}