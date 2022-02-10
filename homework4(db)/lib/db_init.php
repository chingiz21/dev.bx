<?php
declare(strict_types=1);
/** @var array $config */
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

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

