<?php

namespace Yoyu\KitsPVP;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\plugin\PluginBase;
use pocketmine\entity\Effect;
use pocketmine\item\Item;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\utils\Config;
use pocketmine\utils\Random;
use pocketmine\utils\TextFormat as color;
use pocketmine\permission\Permission;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginManager;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\level\sound\AnvilFallSound;
use pocketmine\level\sound\AnvilUseSound;
use pocketmine\level\sound\EndermanTeleportSound;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerPreLoginEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerDropItemEvent;

class Main extends PluginBase implements Listener{
    
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        
        $prefix = "§4[§6KITSPVP§4]";
        $prefixD = "§e>§7-----------§a<§e+§a>§7-----------§e<";
        $prefixE = "§e>§7------------§e+§7------------§e<";
        $sound1 = $sender->getPlayer();
        
        switch($command->getName()){
            case "kit":
            
                if(isset($args[0])){
                    if($sender instanceof Player){
                    switch(strtolower($args[0])){
                        
                        case "free":
                            if(!$sender->hasPermission("kit.free.command")){
                            $sender->sendMessage("§cYou do not have access to this command!");
                            break;
                            }
                            $sender->getPlayer()->getInventory()->clearAll();
                            $sender->getPlayer()->removeAllEffects();
                            $sender->getPlayer()->addEffect(Effect::getEffect(16)->setAmplifier(0)->setDuration(99999)->setVisible(true));
                            
                            $sender->getInventory()->addItem(Item::get(272, 0, 1));
                            $sender->getInventory()->addItem(Item::get(260, 0, 5));
                            $sender->getInventory()->addItem(Item::get(282, 0, 1));
                            $sender->getInventory()->addItem(Item::get(332, 0, 10));
                            $Item = Item::get(280, 0, 1);
                            $Item->addEnchantment(Enchantment::getEnchantment(Enchantment::TYPE_WEAPON_SHARPNESS)->setLevel(1));
                            $sender->getInventory()->addItem($Item);

                            $sender->getInventory()->setHelmet(Item::get(298, 0, 1));
                            $sender->getInventory()->setChestplate(Item::get(299, 0, 1));
                            $sender->getInventory()->setLeggings(Item::get(300, 0, 1));
                            $sender->getInventory()->setBoots(Item::get(301, 0, 1));
                            $sender->sendMessage($prefix."§aEnjoy your Kit :3!");
                            $sound1->getLevel()->addSound(new AnvilUseSound($sound1));
                            break;
                        case "archer":
                            if(!$sender->hasPermission("kit.archer.command")){
                            $sender->sendMessage("§cYou do not have access to this command!");
                            break;
                            }
                            $sender->getPlayer()->getInventory()->clearAll();
                            $sender->getPlayer()->removeAllEffects();
                            $sender->getPlayer()->addEffect(Effect::getEffect(16)->setAmplifier(0)->setDuration(99999)->setVisible(true));
                            
                            $sender->getInventory()->addItem(Item::get(268, 0, 1));
                            $sender->getInventory()->addItem(Item::get(261, 0, 1));
                            $sender->getInventory()->addItem(Item::get(262, 0, 64));
                            $sender->getInventory()->addItem(Item::get(332, 0, 10));
                            $sender->getInventory()->addItem(Item::get(260, 0, 5));
                            $sender->getInventory()->addItem(Item::get(280, 0, 1));
                            
                            $sender->getInventory()->setHelmet(Item::get(298, 0, 1));
                            $sender->getInventory()->setChestplate(Item::get(299, 0, 1));
                            $sender->getInventory()->setLeggings(Item::get(304, 0, 1));
                            $sender->getInventory()->setBoots(Item::get(309, 0, 1));
                            $sender->sendMessage($prefix."§aYou have selected the §6Archer §aKit");
                            $sound1->getLevel()->addSound(new AnvilUseSound($sound1));
                            break;
                        case "tank":
                            if(!$sender->hasPermission("kit.tank.command")){
                            $sender->sendMessage("§cYou need VIP to use this kit!");
                            break;
                            }
                            $sender->getPlayer()->getInventory()->clearAll();
                            $sender->getPlayer()->removeAllEffects();
                            $sender->getPlayer()->addEffect(Effect::getEffect(10)->setAmplifier(0)->setDuration(99999)->setVisible(true));
                            $sender->getPlayer()->addEffect(Effect::getEffect(16)->setAmplifier(0)->setDuration(99999)->setVisible(true));
                            
                            $Item = Item::get(267, 0, 1);
                            $Item->addEnchantment(Enchantment::getEnchantment(Enchantment::TYPE_WEAPON_SHARPNESS)->setLevel(2));
                            $sender->getInventory()->addItem($Item);
                            $sender->getInventory()->addItem(Item::get(261, 0, 1));
                            $sender->getInventory()->addItem(Item::get(262, 0, 25));
                            $sender->getInventory()->addItem(Item::get(282, 0, 2));
                            $sender->getInventory()->addItem(Item::get(332, 0, 16));
                            
                            $sender->getInventory()->setHelmet(Item::get(310, 0, 1));
                            $sender->getInventory()->setChestplate(Item::get(307, 0, 1));
                            $sender->getInventory()->setLeggings(Item::get(312, 0, 1));
                            $sender->getInventory()->setBoots(Item::get(313, 0, 1));
                            $sender->sendMessage($prefix."§aYou have selecter the §dTank §aKit");
                            $sound1->getLevel()->addSound(new AnvilFallSound($sound1));
                            break;
                        case "knight":
                            if(!$sender->hasPermission("kit.knight.command")){
                            $sender->sendMessage("§cYou need VIP to use this kit!");
                            break;
                            }
                            $sender->getPlayer()->getInventory()->clearAll();
                            $sender->getPlayer()->removeAllEffects();
                            $sender->getPlayer()->addEffect(Effect::getEffect(16)->setAmplifier(0)->setDuration(99999)->setVisible(true));
                            
                            $sender->getInventory()->addItem(Item::get(267, 0, 1));
                            $sender->getInventory()->addItem(Item::get(261, 0, 1));
                            $sender->getInventory()->addItem(Item::get(262, 0, 10));
                            $sender->getInventory()->addItem(Item::get(373, 30, 1));
                            $sender->getInventory()->addItem(Item::get(282, 0, 1));
                            
                            $sender->getInventory()->setHelmet(Item::get(302, 0, 1));
                            $sender->getInventory()->setChestplate(Item::get(307, 0, 1));
                            $sender->getInventory()->setLeggings(Item::get(304, 0, 1));
                            $sender->getInventory()->setBoots(Item::get(309, 0, 1));
                            $sender->sendMessage($prefix."§aYou have selecter the §dKnight §aKit!");
                            $sound1->getLevel()->addSound(new AnvilFallSound($sound1));
                            break;
                        case "warrior":
                            if(!$sender->hasPermission("kit.warrior.command")){
                            $sender->sendMessage("§cEnjoy your free kit!");
                            break;
                            }
                            $sender->getPlayer()->getInventory()->clearAll();
                            $sender->getPlayer()->removeAllEffects();
                            $sender->getPlayer()->addEffect(Effect::getEffect(16)->setAmplifier(0)->setDuration(99999)->setVisible(true));
                            
                            $sender->getInventory()->addItem(Item::get(258, 0, 1));
                            $sender->getInventory()->addItem(Item::get(373, 30, 1));
                            $sender->getInventory()->addItem(Item::get(260, 0, 5));
                            $sender->getInventory()->addItem(Item::get(373, 30, 1));
                            $sender->getInventory()->addItem(Item::get(282, 0, 1));
                            
                            $sender->getInventory()->setHelmet(Item::get(298, 0, 1));
                            $sender->getInventory()->setChestplate(Item::get(299, 0, 1));
                            $sender->getInventory()->setLeggings(Item::get(304, 0, 1));
                            $sender->getInventory()->setBoots(Item::get(305, 0, 1));
                            $sender->sendMessage($prefix."§aYou have selecter the §6Warrior §aKit!");
                            $sound1->getLevel()->addSound(new AnvilUseSound($sound1));
                            break;
                        case "miner":
                            if(!$sender->hasPermission("kit.miner.command")){
                            $sender->sendMessage("§cYou need VIP to use this kit!");
                            break;
                            }
                            $sender->getPlayer()->getInventory()->clearAll();
                            $sender->getPlayer()->removeAllEffects();
                            $sender->getPlayer()->addEffect(Effect::getEffect(1)->setAmplifier(1)->setDuration(99999)->setVisible(true));
                            $sender->getPlayer()->addEffect(Effect::getEffect(16)->setAmplifier(0)->setDuration(99999)->setVisible(true));

                            $Item = Item::get(278, 0, 1);
                            $Item->addEnchantment(Enchantment::getEnchantment(Enchantment::TYPE_WEAPON_SHARPNESS)->setLevel(4));
                            $sender->getInventory()->addItem($Item);
                            $sender->getInventory()->addItem(Item::get(282, 0, 1));
                            $sender->getInventory()->addItem(Item::get(282, 0, 1));
                            $sender->getInventory()->addItem(Item::get(260, 0, 5));
                            $sender->getInventory()->addItem(Item::get(322, 0, 1));
                            
                            $sender->getInventory()->setHelmet(Item::get(314, 0, 1));
                            $sender->getInventory()->setChestplate(Item::get(299, 0, 1));
                            $sender->getInventory()->setLeggings(Item::get(316, 0, 1));
                            $sender->getInventory()->setBoots(Item::get(317, 0, 1));
                            $sender->sendMessage($prefix."§aYou have selecter the §dMiner §aKit!");
                            $sound1->getLevel()->addSound(new EndermanTeleportSound($sound1));
                            break;
                        case "admin":
                            if(!$sender->hasPermission("kit.admin.command")){
                            $sender->sendMessage("§cYou Dont Have Permission to use this Kits!");
                            break;
                            }
                            $sender->getPlayer()->getInventory()->clearAll();
                            $sender->getPlayer()->removeAllEffects();
                            $sender->getPlayer()->addEffect(Effect::getEffect(11)->setAmplifier(4)->setDuration(99999)->setVisible(true));
                            $sender->getPlayer()->addEffect(Effect::getEffect(1)->setAmplifier(2)->setDuration(99999)->setVisible(true));
                            $sender->getPlayer()->addEffect(Effect::getEffect(16)->setAmplifier(0)->setDuration(99999)->setVisible(true));

                            $sender->getInventory()->addItem(Item::get(261, 0, 1));
                            $Item = Item::get(349, 0, 1);
                            $Item->addEnchantment(Enchantment::getEnchantment(Enchantment::TYPE_WEAPON_SHARPNESS)->setLevel(8));
                            $Item->setCustomName("§o§bSlap Them All~!");
                            $sender->getInventory()->addItem($Item);
                            $Item = Item::get(280, 0, 1);
                            $Item->addEnchantment(Enchantment::getEnchantment(Enchantment::TYPE_WEAPON_FIRE_ASPECT)->setLevel(1));
                            $Item->setCustomName("§o§bLengend Stick~!");
                            $sender->getInventory()->addItem($Item);
                            $sender->getInventory()->addItem(Item::get(262, 0, 128));
                            $sender->getInventory()->addItem(Item::get(332, 0, 80));
                            $sender->getInventory()->addItem(Item::get(322, 0, 64));
                            
                            $sender->getInventory()->setHelmet(Item::get(314, 0, 1));
                            $sender->getInventory()->setChestplate(Item::get(315, 0, 0));
                            $sender->getInventory()->setLeggings(Item::get(316, 0, 0));
                            $sender->getInventory()->setBoots(Item::get(317, 0, 0));
                            $sender->sendMessage($prefix."§aLets GO KILL EVERYONE! XD");
                            $sound1->getLevel()->addSound(new AnvilUseSound($sound1));
                            break;
                    }       
                }
                }
                return false;
            case "kits":
                $sender->sendMessage($prefixD);
                $sender->sendMessage(" ");
                $sender->sendMessage("§e*§bFree Kits §f§o-> §a/kit §7{Free/Archer/Warrior}");
                $sender->sendMessage("§e*§l§cVIP Kits§r §f§o-> §d/kit§r §7{Tank/Knight/Miner}");
                $sender->sendMessage(" ");
                $sender->sendMessage("             §d*§7Enjoy Your Kit and Have Fun!!");
                $sender->sendMessage("             §d*§7Version: §c1.0alpha");
                $sender->sendMessage(" ");
                $sender->sendMessage($prefixE);
        }
    
    }
    
    public function PlayerJoinEvent(PlayerJoinEvent $event){
        $player = $event->getPlayer();
        $name = $event->getPlayer()->getName();
        
        
        $player->getLevel()->addSound(new AnvilUseSound($player));
        
    }
    
    public function onDropItem(PlayerDropItemEvent $event){
        if($event->getPlayer()->getInventory()->getItemInHand()->getId() == 280){
            $event->getPlayer()->sendMessage("§cYou can't not drop this item!");
            $event->setCancelled();
        }
        if($event->getPlayer()->getInventory()->getItemInHand()->getId() == 282){
            $event->getPlayer()->sendMessage("§cYou can't not drop this item!");
            $event->setCancelled();
        }
        if($event->getPlayer()->getInventory()->getItemInHand()->getId() == 322){
            $event->getPlayer()->sendMessage("§ccYou can't not drop this item!");
            $event->setCancelled();
        }
    }
    
       public function onHurt(EntityDamageEvent $event){
	if($event instanceof EntityDamageByEntityEvent){
	   $damager = $event->getDamager();
			if($damager instanceof Player){
                        if($damager->getInventory()->getItemInHand()->getId() === 280){
				$event->getEntity()->addEffect(Effect::getEffect(19)->setAmplifier(0)->setDuration(120)->setVisible(true));
                                }
                                
                        }
               }
       }
       
        public function onUse(PlayerInteractEvent $event) {
            $player = $event->getPlayer();
            if(count($player->getEffects()) != 3) {
            if($event->getItem()->getID() == 282) {
            	$food = $player->getFood();
                $player->setFood($food + 8);
                $player->addEffect(Effect::getEffect(6)->setAmplifier(1)->setDuration(0)->setVisible(false));
		$player->sendPopup("§b§oTaken soup!");
                $player->getInventory()->removeItem(Item::get(282, 0, 1));
                $player->getInventory()->addItem(Item::get(281, 0, 1));
      }
            }
        }
        
        
        
       
       
}
