<?php


namespace inkohx\statusboard;


use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use Miste\scoreboardspe\API\{
    Scoreboard, ScoreboardDisplaySlot, ScoreboardSort, ScoreboardAction
};
use pocketmine\utils\TextFormat;

class EventListener implements Listener
{
    public function onJoin(PlayerJoinEvent $event): void
    {
        $player = $event->getPlayer();
        $scoreboard = new Scoreboard(Main::$instance->getServer()->getPluginManager()->getPlugin("ScoreboardsPE")->getPlugin(), TextFormat::GREEN . "≫    STATUSBOARD    ≪", ScoreboardAction::CREATE);
        $scoreboard->create(ScoreboardDisplaySlot::SIDEBAR, ScoreboardSort::DESCENDING);
        $scoreboard->setLine($player, 1, TextFormat::GREEN . "≫ Name " . $player->getName() . " ≪");
        $scoreboard->setLine($player, 2, TextFormat::GREEN . "≫ Online " . count(Main::$instance->getServer()->getOnlinePlayers()) . " / " . Main::$instance->getServer()->getMaxPlayers() . " ≪");
        $scoreboard->setLine($player, 4, TextFormat::GREEN . "≫ Ping " . $player->getPing() . "ms ≪");
        $scoreboard->setLine($player, 5, TextFormat::GREEN . "≫ TPS " . Main::$instance->getServer()->getTicksPerSecond() . " ≪");
        $scoreboard->setLine($player, 7, TextFormat::GREEN . "≫ Dev: InkoHX ≪");
    }
}