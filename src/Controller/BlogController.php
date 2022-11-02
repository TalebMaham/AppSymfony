<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Personne;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Workflow\Registry;

class BlogController extends AbstractController
{
    #[Route('/blog', name: 'app_blog')]
    public function index(): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    #[Route('/', name: 'home')]
    public function home(): Response
    {
        return $this->render('blog/home.html.twig', [
            'title' => "Bienvenu sur mon site symfony",
            'age' => 31
        ]);
    }
    


    /**
     * @Route("/show", name="blog_show")
     */
    public function show(){
        return $this->render('mon/mon_ajax.html.twig'); 
     }


      /**
     * @Route("/workflow", name="blog_show")
     */
    public function workflow(Registry $workflowRegistry){

        $personne = new Personne(); 
        
        $workflow = $workflowRegistry->get(new Personne(), 'personne');

        try{
            $workflow->apply($workflow, 'to_yahya');
        }catch(Exception $exception){

        }
        return $this->render('mon/workflow.html.twig'); 
     }

}
