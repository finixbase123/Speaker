<?php

namespace finixbase123;

use finixbase123\command\SpeakerCommand;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Speaker extends PluginBase
{

    public const PREFIX = TextFormat::AQUA . '[ '. TextFormat::WHITE . '확성기 ' . TextFormat::AQUA . '] ' . TextFormat::WHITE;
    public const MONEY = 10000;

    function onEnable()
    {
        if($this->getServer()->getPluginManager()->getPlugin('EconomyAPI') == null)
        {
            $this->getServer()->getLogger()->error('EconomyAPI플러그인이 인식되지 않아 플러그인을 비활성화 시킵니다.');
            $this->getServer()->getPluginManager()->disablePlugin($this);
        }
        $this->getServer()->getCommandMap()->register('speaker', new SpeakerCommand('스피커', '스피커에 관련된 명령어 입니다.', '/스피커', ['speaker']));
    }

}
