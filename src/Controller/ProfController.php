<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


class ProfController extends AbstractController
{
    #[Route('/prof', name: 'app_prof')]
    
    public function index(UserRepository $userRepository): Response
    {
        $eleves = $userRepository->findAll(); 

        return $this->render('prof/index.html.twig', [
            'controller_name' => 'ProfController',
            'eleves' => $eleves
        ]);
    }
}
