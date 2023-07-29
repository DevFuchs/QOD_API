<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Quote as Qod;
use Doctrine\ORM\EntityManagerInterface;

class Quote extends AbstractController
{

    #[Route('/api/quote/test/{id}', name: 'quote_show')]
    public function getTestText(EntityManagerInterface $entityManager, int $id): Response
    {

        $quote = $entityManager->getRepository(Qod::class)->find($id);

        if (!$quote) {
            throw $this->createNotFoundException(
                'No quote found for id '.$id
            );
        }

        $response = [
            'text' => "{$quote->getQuote()}",
            'author' => "{$quote->getAuthor()}"
        ];

        return new JsonResponse($response);
    }

}