<?php

use Weapon\Bow;

spl_autoload_register(function ($class)
{
	include __DIR__ . '/' . str_replace("\\", "/", $class) . '.php';
});


$romeFactory = new \Weapon\RomeWeapon\RomeWeaponForge();
var_dump($romeFactory->createBow());
var_dump($romeFactory->createSword());

$barbarianFactory = new \Weapon\BarbarianWeapon\BarbarianWeaponForge();
var_dump($barbarianFactory->createBow());
var_dump($barbarianFactory->createSword());


$calculatePower = function ($sum, $warrior)
{
	$sum += $warrior->power();
	return $sum;
};




