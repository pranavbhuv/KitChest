<?php

namespace KitChest\Command;

use KitChest\Main;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\item\Item;
use pocketmine\utils\TextFormat;
use pocketmine\Player;

class KitChestGiveCommand extends PluginCommand{

    public function __construct(Main $plugin){
        parent::__construct("kitgive", $plugin);
        $this->setAliases(["kitgive"]);
        $this->setPermission("kit.give");
        $this->setDescription("KitChest Give Command");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args){
        if(!$sender instanceof Player){
            $sender->sendMessage(TextFormat::RED . "Use this command in-game");
        }
        if(!$sender->hasPermission("kit.give")){
            $sender->sendMessage(TextFormat::RED . "You do not have permission to use this command.");
        }
        if(!isset($args[0])){
            $sender->sendMessage("Usage: /kit <kit name>");
            return false;
        }
        if($args[0] === "test"){
            $inv = $sender->getInventory();
            $inv->addItem(Item::get(Item::CHEST, 10, 1)->setCustomName(TextFormat::GREEN . "Test Kit"));
            $sender->sendMessage(TextFormat::GREEN . "You have now received the Test Kit!");
        }
        return true;
    }
}