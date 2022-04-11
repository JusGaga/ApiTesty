<?php

namespace App\Controller;

use App\Entity\Gladiator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TrainingController extends AbstractController
{
    /**
     * @Route("api/training/{id}/str", name="app_training", methods={"POST"})
     */
    public function strenght(Gladiator $gladiator,EntityManagerInterface $em)
    {
        $addValue = rand(1,3);
        $gladiatorNewStr = $gladiator->getStr() + $addValue;
        $gladiator->setStr($gladiatorNewStr);
        $em->persist($gladiator);
        $em->flush();
        return $this->json($gladiator, 201,[],['groups' => "gladiator_read"]);
        }
}