<?php 

namespace credits\toxicgg\Listeners;

use credits\toxicgg\Main;
use Ifera\ScoreHud\event\PlayerTagUpdateEvent;
use Ifera\ScoreHud\scoreboard\ScoreTag;
use pocketmine\event\Listener;
use pocketmine\player\Player;

class EventListener implements Listener {
  
        /** @var Main */
	private $plugin;

	public function __construct(Main $plugin){
		$this->plugin = $plugin;
	}
 
  public function onCreditsChange(Player $player){ // not a real event
                $username = $player->getName();
    
		if(is_null($username)){
			return;
		}

		$player = $this->plugin->getServer()->getPlayerByPrefix($username);

		if($player instanceof Player && $player->isOnline()){
			(new PlayerTagUpdateEvent($player, new ScoreTag("credits", (string) $this->plugin->credits->getCredits())));
		}
  }
}
