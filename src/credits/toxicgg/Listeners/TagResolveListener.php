<?php
declare(strict_types = 1);

namespace credits\toxicgg\Listeners;

use credits\toxicgg\Main;
use Ifera\ScoreHud\event\TagsResolveEvent;
use pocketmine\event\Listener;
use function count;
use function explode;

class TagResolveListener implements Listener{

	/** @var Main */
	private $plugin;

	public function __construct(Main $plugin){
		$this->plugin = $plugin;
	}

	public function onTagResolve(TagsResolveEvent $event){
		$player = $event->getPlayer();
		$tag = $event->getTag();
		$tags = explode('.', $tag->getName(), 2);
		$value = "";

		if($tags[0] !== 'cscore' || count($tags) < 2){
			return;
		}

		switch($tags[1]){
			case "credits":
				$value = $this->plugin->credits->getCredits($player);
				break;
		}

		$tag->setValue($value);
	}
}
