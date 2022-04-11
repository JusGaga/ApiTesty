<?php

namespace App\Events;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Gladiator;
use Doctrine\ORM\EntityManagerInterface;
use Faker\Factory;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Security;

class GladiatorSubscribe implements EventSubscriberInterface
{
    private $security;
    private $em;


    public function __construct(Security $security, EntityManagerInterface $em)
    {
        $this->security = $security;
        $this->em = $em;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['createGladiator', EventPriorities::PRE_WRITE]
        ];
    }

    public function createGladiator(ViewEvent $event)
    {
        $faker = Factory::create("fr_FR");
        $gladiator = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if ($gladiator instanceof Gladiator && $method === "POST") {
        $user = $this->security->getUser();
        $rest = $user->getCoins() - 1;
            if ($rest >= 0) {
                $name = $faker->firstName();
                $str = rand(1, 100);
                $con = rand(1, 100);
                $inteligence = rand(1, 100);
                $dex = rand(1, 100);
                $cha = rand(1, 100);

                $total = ($str + $con + $inteligence + $dex + $cha) / 5;

                if($total >= 90){
                    $rarity = 5;
                }elseif ($total>= 80){
                    $rarity = 4;
                }elseif($total>=60){
                    $rarity = 3;
                }elseif ($total >= 40){
                    $rarity = 2;
                }else{
                    $rarity = 1;
                }


                $gladiator->setUser($user)
                    ->setCha($cha)
                    ->setCon($con)
                    ->setDex($dex)
                    ->setInteligence($inteligence)
                    ->setStr($str)
                    ->setRarity($rarity)
                    ->setHealth(20)
                    ->setName($name);

                $user->setCoins($rest);
                $this->em->persist($user);
                $this->em->flush();

            }
            else{
                throw new \Exception("Vous n'avez pas assez d'argent");
            }
        }
    }
}