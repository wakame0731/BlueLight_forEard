<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 *
 *
*/

declare(strict_types=1);

namespace pocketmine\item;

use pocketmine\block\Block;
use pocketmine\block\BlockFactory;
use pocketmine\level\Level;
use pocketmine\Player;
use pocketmine\math\Vector3;

class Carrot extends Food{
	public function __construct(int $meta = 0){
		parent::__construct(self::CARROT, $meta, "Carrot");
	}

	public function getFoodRestore() : int{
		return 3;
	}

	public function getSaturationRestore() : float{
		return 4.8;
	}

	/** 
   	* @return bool 
   	*/ 
	   public function canBeActivated() : bool{ 
    	return true; 
	}
	  
  	public function onActivate(Level $level, Player $player, Block $block, Block $target, int $face, Vector3 $facePos) : bool{ 
    	if($target->getId()===Block::FARMLAND and $face===Vector3::SIDE_UP){ 
      		$this->count--; 
      		$level->setBlock($target->getSide(Vector3::SIDE_UP),Block::get(Block::CARROT_BLOCK,0), true); 
      		return true; 
    	} 
    return false; 
  	} 		
}
