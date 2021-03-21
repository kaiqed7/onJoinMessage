<?php

namespace k0vbaska;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

use pocketmine\event\player\PlayerJoinEvent;

class Main extends PluginBase implements Listener {
    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
        $this->saveResource("config.yml");
    }
    
    public function onJoin(PlayerJoinEvent $event) {
        $event->setJoinMessage(null);
        $player = $event->getPlayer();
        $name = $player->getName();
        $message = $this->getConfig()->get("message");
        $message = str_replace("{name}", $name, $message);
        $this->getServer()->broadcastMessage($message);
    }
}
