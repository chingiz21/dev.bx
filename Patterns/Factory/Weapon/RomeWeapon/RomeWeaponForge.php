<?php

namespace Weapon\RomeWeapon;

use Weapon\AbstractForge;
use Weapon\Bow;
use Weapon\Sword;

class RomeWeaponForge extends AbstractForge
{
	public function createBow(): Bow
	{
		return new RomeBow();
	}

	public function createSword(): Sword
	{
		return new RomeSword();
	}
}