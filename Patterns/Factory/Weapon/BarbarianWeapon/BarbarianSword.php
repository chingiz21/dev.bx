<?php

namespace Weapon\BarbarianWeapon;

use Weapon\Sword;

class BarbarianSword extends Sword
{
	public function getPower(): int
	{
		return parent::getPower() + 10;
	}
}