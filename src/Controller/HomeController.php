<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home_index')]
    public function index(): Response
    {   
        // $content = $this ->renderView('/home/index.html.twig');
        // return new Response($content);

        return $this->render('/home/index.html.twig');
        
        // return $this->json([
        //     'message' => 'Welcome to your new controller!',
        //     'path' => 'src/Controller/HomeController.php',
        // ]);
    }
}
