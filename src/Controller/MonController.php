<?php

namespace App\Controller;

use App\Entity\Personne;
use Doctrine\Persistence\ManagerRegistry;
use PHPUnit\Util\Json;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MonController extends AbstractController
{
    #[Route('/mon', name: 'app_mon')]
    public function index(): Response
    {
        return $this->render('mon/index.html.twig', [
            'controller_name' => 'MonController',
        ]);
    }


    #[Route('/mapage', name: 'app_mon_ma_page')]
    public function mapage(ManagerRegistry $doctrine)
     {
             $m = $doctrine->getManager();

             $prenom = "Sidi";
             $nom = "Taleb";
             $entreprise = "CashFlowPositif";
             $ecole = "institut national superieur des technologies avancees" ; 


             $personne = new Personne();
             $personne->setPrenom($prenom);
             $personne->setNom($nom);
             $personne->setEntreprise($entreprise);
             $personne->setEcole($ecole);
             
            
            $m->persist($personne);
            $m->flush();

             return new JsonResponse(['prenom'=>$prenom, 'nom'=>$nom, 'entreprise'=>$entreprise, 'ecole'=>$ecole]);
    }
}
