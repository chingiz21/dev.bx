<?php

namespace Weapon\BarbarianWeapon;

use Weapon\AbstractForge;
use Weapon\Bow;
use Weapon\Sword;

class BarbarianWeaponForge extends AbstractForge
{

	public function createBow(): Bow
	{
		return new BarbarianBow();
	}

	public function createSword(): Sword
	{
		return new BarbarianSword();
	}
}