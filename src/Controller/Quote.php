<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class Quote extends AbstractController
{

    #[Route('/api/quote/test')]
    public function getTestText(Request $request): Response
    {
        $data = $request->toArray();
        $name = isset($data['name']) ? $data['name'] : null;
        $test = [
            'text' => "Hallo {$name}"
        ];

        return new JsonResponse($test);
    }

}