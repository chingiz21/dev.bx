<?php

namespace Weapon\RomeWeapon;

use Weapon\Bow;

class RomeBow extends Bow
{
	public function getPower(): int
	{
		return parent::getPower() + 10;
	}
}