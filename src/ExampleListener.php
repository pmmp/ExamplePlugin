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

namespace ExamplePlugin;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerRespawnEvent;

class ExampleListener implements Listener{

	/** @var MainClass */
	private $plugin;

	public function __construct(MainClass $plugin){
		$this->plugin = $plugin;
	}

	/**
	 * @param PlayerRespawnEvent $event
	 *
	 * @priority        NORMAL
	 */
	public function onRespawn(PlayerRespawnEvent $event) : void{
		$this->plugin->getServer()->broadcastMessage($event->getPlayer()->getDisplayName() . " has just respawned!");
	}

	/**
	 * This runs after all other priorities. We mustn't cancel the event at MONITOR priority, we can only observe the
	 * result.
	 *
	 * @priority MONITOR
	 */
	public function handlerNamesCanBeAnything(PlayerChatEvent $event) : void{
		if(!$event->isCancelled()){
			$this->plugin->getLogger()->info("Player " . $event->getPlayer()->getName() . " sent a message: " . $event->getMessage());
		}else{
			$this->plugin->getLogger()->info("Player " . $event->getPlayer()->getName() . " tried to send a message, but it was cancelled: " . $event->getMessage());
		}
	}
}
