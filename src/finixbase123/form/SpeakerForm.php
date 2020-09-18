<?php

namespace finixbase123\form;

use pocketmine\form\Form;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat;
use finixbase123\Speaker;
use onebone\economyapi\EconomyAPI;

class SpeakerForm implements Form
{

    public function jsonSerialize() : array
    {
        return [
            'type' => 'custom_form',
            'title' => Speaker::PREFIX
            'content' => ['type' => 'input', 'text' => '내용을 적어주세요.']
        ];
    }

    public function handleResponse(Player $player, $data): void
    {
        if($data[0] == null)
        {
            $player->sendMessage(Speaker::PREFIX . '빈칸없이 적어주세요.');
            return;
        }
        if(EconomyAPI::getInstance()->myMoney($player) < Speaker::MONEY)
        {
            $player->sendMessage(Speaker::PREFIX . '돈이 부족합니다. 현재 돈 : ' . EconomyAPI::getInstance()->myMoney($player) . '/ 당신이 필요한 돈 : ' . Speaker::MONEY);
            return;
        }
        $text = $data[0];
        $str = str_replace('&',TextFormat::ESCAPE, $text);
        Server::getInstance()->broadcastMessage(Speaker::PREFIX . $str);
        EconomyAPI::getInstance()->reduceMoney($player, Speaker::MONEY);
    }

}
