<?php


namespace App\Controller;

use App\Entity\Personne;
use App\Form\FormulaireType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmailController extends AbstractController
{

    #[Route('/email', name: 'app_blog')]
    public function index(Request $request): Response
    {
        $personne  = new Personne(); 
        $form = $this->createForm(FormulaireType::class, $personne);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {

           return  $this->render('emails/resultat.html.twig', ['nom'=>$personne->getNom(), 'prenom'=>$personne->getPrenom(), 'ecole'=>$personne->getEcole(), 'entreprise'=> $personne->getEntreprise()]);
        }

        return $this->render('emails/formulaire.html.twig', [
            'ici' =>"ici",
            'form' => $form->createView()
        ]);
    }



    #[Route('/res', name: 'resultat')]
    public function resultat(string $nom, string $prenom, string $ecole, string $entreprise ): Response
    {
        dd($nom);
  
        return $this->render('emails/resultat.html.twig', [
            'nom' => $nom,
            'prenom'  => $prenom,
            'ecole'=> $ecole,
            'entreprise'  => $entreprise
        ]);
    }

}