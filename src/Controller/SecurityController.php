<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SecurityController extends AbstractController
{
    #[Route(path: '/securities/{id}', methods: ['POST'])]
    public function get_security(Request $request, int $id): JsonResponse
    {    
        if($request->headers->has('force_fail')){
            return new JsonResponse(
                ["error" => "Securities engine failure message"],
                $request->headers->get("force_fail")
            );
        }
        return new JsonResponse([
            "quantity" => 5,
            "product_id" => $id
        ], 200);
    }
}


