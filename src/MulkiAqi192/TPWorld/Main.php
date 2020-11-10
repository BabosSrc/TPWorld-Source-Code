<?php

namespace MulkiAqi192\TPWorld;

use pocketmine\Server;
use pocketmine\Player;

use pocketmine\plugin\PluginBase as pl;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\event\Listener;

class main extends pl implements Listener {

	public function onEnable(){

	}

	public function onCommand(CommandSender $sender, Command $cmd, String $label, Array $args) : bool {
		if(!isset($args[0])){
			$sender->sendMessage("/tpworld 1v1lob - teleport to 1v1 lobby\n/tpworld lobby - teleport to lobby");
			return true;
		}

		switch($cmd->getName()){
			case "tpworld":

			 if(isset($args[0])){
			 	if($sender instanceof Player){
			 		switch(strtolower($args[0])){
			 			case "lobby":
			 			 $this->getServer()->loadLevel("lobby");
			 			 $sender->teleport($this->getServer()->getLevelByName("lobby")->getSafeSpawn());
			 			 $sender->sendMessage("You have been teleported to lobby!");
			 			 return true;
			 			case "1v1lob":
			 			 $this->getServer()->loadLevel("1v1lob");
			 			 $sender->teleport($this->getServer()->getLevelByName("1v1lob")->getSafeSpawn());
			 			 $sender->sendMessage("You have been teleported to 1v1 lobby!");
			 			 return true;
			 		}
			 	}
			 } else {
			 	$sender->sendMessage("Teleporting to another world in console? epic");
			 }
		}
	 return true;
	}

}