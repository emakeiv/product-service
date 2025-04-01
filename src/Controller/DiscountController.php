<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\DiscountRepository;

class DiscountController extends AbstractController
{
    #[Route('/discount', name: 'app_discount')]
    public function index(DiscountRepository $repository): Response
    {
        return $this->render('discount/index.html.twig', [
            'discounts' =>  $repository -> findAll(),
        ]);
    }
}
