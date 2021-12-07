<?php

namespace Weapon\RomeWeapon;

use Weapon\Sword;

class RomeSword extends Sword
{
	public function getPower(): int
	{
		return parent::getPower() + 40;
	}
}