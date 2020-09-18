<?php


namespace finixbase123\command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use finixbase123\form\SpeakerForm;

class SpeakerCommand extends Command
{

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        parent::__construct($name, $description, $usageMessage, $aliases);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        $sender->sendForm(new SpeakerForm());
    }

}