<?php


namespace inkohx\statusboard;


use inkohx\statusboard\task\UpdateScoreboardTask;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use Miste\scoreboardspe\API\{
    Scoreboard, ScoreboardDisplaySlot, ScoreboardSort, ScoreboardAction
};
use pocketmine\utils\TextFormat;

class EventListener implements Listener
{
    public function onJoin(PlayerJoinEvent $event)
    {
        $player = $event->getPlayer();
        $scoreboard = new Scoreboard(Main::$instance->getServer()->getPluginManager()->getPlugin("ScoreboardsPE")->getPlugin(), TextFormat::GREEN . "      STATUSBOARD     ", ScoreboardAction::CREATE);
        $scoreboard->create(ScoreboardDisplaySlot::SIDEBAR, ScoreboardSort::DESCENDING);
        $scoreboard->addDisplay($player);
        $scoreboard->setLine(1, TextFormat::GREEN . "Name " . $player->getName() . "     ");
        $scoreboard->setLine(2, TextFormat::GREEN . "Online " . count(Main::$instance->getServer()->getOnlinePlayers()) . " / " . Main::$instance->getServer()->getMaxPlayers() . "     ");
        $scoreboard->setLine(4, TextFormat::GREEN . "Ping " . $player->getPing() . "ms     ");
        $scoreboard->setLine(5, TextFormat::GREEN . "TPS " . Main::$instance->getServer()->getTicksPerSecond() . "     ");
        $scoreboard->setLine(6, "\n");
        $scoreboard->setLine(7, TextFormat::GREEN . "     > Dev: InkoHX <");
        Main::$instance->getScheduler()->scheduleRepeatingTask(new UpdateScoreboardTask($scoreboard, $player), 40);
    }
}
