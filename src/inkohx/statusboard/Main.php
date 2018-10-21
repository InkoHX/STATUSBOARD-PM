<?php


namespace inkohx\statusboard;


use pocketmine\plugin\PluginBase;

class Main extends PluginBase
{
    /** @var Main */
    public static $instance;

    public function onLoad()
    {
        self::$instance = $this;
    }

    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
    }
}