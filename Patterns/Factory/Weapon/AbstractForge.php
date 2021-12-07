<?php

namespace Weapon;

abstract class AbstractForge
{
	abstract public function createBow(): Bow;
	abstract public function createSword(): Sword;

}