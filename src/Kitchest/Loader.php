<?php

namespace KitChest;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\event\player\PlayerInteractEvent;

class Loader extends PluginBase implements Listener {
  
  public function onEnable()
  {
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
  }
  
  public function onInteract(PlayerInteractEvent $event)
  {
    $player = $event->getPlayer();
    $item = $player->getInventory()->getItemInHand();

    //TEST KIT
    if($item->getDamage() === 10) {
        $item->setCustomName("Test kit");
        $helmet = Item::get(310, 0, 1)->setCustomName("Test helmet");
        $e = Enchantment::getEnchantment((int) 0); //0 is for enchant id
        $helmet->addEnchantment(new EnchantmentInstance($e, (int) -0)); //0 is for level
        $e = Enchantment::getEnchantment((int) 0);
        $helmet->addEnchantment(new EnchantmentInstance($e, (int) -0));
        $chestplate = Item::get(311, 0, 1)->setCustomName("Test Chestplate");
        $e = Enchantment::getEnchantment((int) 0);
        $chestplate->addEnchantment(new EnchantmentInstance($e, (int) -0));
        $e = Enchantment::getEnchantment((int) 0);
        $chestplate->addEnchantment(new EnchantmentInstance($e, (int) -0));
        $leggings = Item::get(312, 0, 1)->setCustomName("Test Leggings");
        $e = Enchantment::getEnchantment((int) 0);
        $leggings->addEnchantment(new EnchantmentInstance($e, (int) -0));
        $e = Enchantment::getEnchantment((int) 0);
        $leggings->addEnchantment(new EnchantmentInstance($e, (int) -0));
        $boots = Item::get(313, 0, 1)->setCustomName("Test Boots");
        $e = Enchantment::getEnchantment((int) 0);
        $boots->addEnchantment(new EnchantmentInstance($e, (int) -0));
        $e = Enchantment::getEnchantment((int) 0);
        $boots->addEnchantment(new EnchantmentInstance($e, (int) -0));
        $player->getInventory()->addItem($helmet);
        $player->getInventory()->addItem($chestplate);
        $player->getInventory()->addItem($leggings);
        $player->getInventory()->addItem($boots);
        $player->getInventory()->removeItem($item);
    }

    //COPY THAT AND CHANGE THE DAMAGE ID FOR NEW KIT, KEEP IT HERE
  }
  
  public function onDisable(){
  }
}
