<?php


namespace inkohx\statusboard\task;


use inkohx\statusboard\Main;
use pocketmine\Player;
use pocketmine\scheduler\Task;
use Miste\scoreboardspe\API\{
    Scoreboard, ScoreboardDisplaySlot, ScoreboardSort, ScoreboardAction
};

class UpdateScoreboardTask extends Task
{
    /* @var Scoreboard */
    private $scoreboard;

    /* @var Player */
    private $player;

    public function __construct(Scoreboard $scoreboard, Player $player)
    {
        $this->scoreboard = $scoreboard;
        $this->player = $player;
    }

    public function onRun(int $currentTick)
    {
        $this->scoreboard->setLine($this->player, 1, $this->randomColor() . "  Name " . $this->player->getName() . "     ");
        $this->scoreboard->setLine($this->player, 2, $this->randomColor() . "  Online " . count(Main::$instance->getServer()->getOnlinePlayers()) . " / " . Main::$instance->getServer()->getMaxPlayers() . " ");
        $this->scoreboard->setLine($this->player, 4, $this->randomColor() . "  Ping " . $this->player->getPing() . "ms     ");
        $this->scoreboard->setLine($this->player, 5, $this->randomColor() . "  TPS " . Main::$instance->getServer()->getTicksPerSecond() . "     ");
        $this->scoreboard->setLine($this->player, 6, "\n");
        $this->scoreboard->setLine($this->player, 7, $this->randomColor() . "     > Dev: InkoHX <");
    }

    private function randomColor(): string
    {
        return "§" . mt_rand(1, 9);
    }
}