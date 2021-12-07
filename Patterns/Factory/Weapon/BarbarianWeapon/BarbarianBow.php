<?php

namespace Weapon\BarbarianWeapon;

use Weapon\Bow;

class BarbarianBow extends Bow
{
	public function getPower(): int
	{
		return parent::getPower() + 30;
	}
}