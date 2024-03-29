<?php
declare(strict_types=1);

namespace credits\toxicgg;

use Laith98Dev\Credits\Main as Credits;
use credits\toxicgg\Listeners\EventListener;
use credits\toxicgg\Listeners\TagResolveListener;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase{
  
  /** @var Credits */
  public $credits;
  
  protected function onEnable(): void{
	  $this->credits = $this->getServer()->getPluginManager()->getPlugin("Credits");

          $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
          $this->getServer()->getPluginManager()->registerEvents(new TagResolveListener($this), $this);
  }
}
