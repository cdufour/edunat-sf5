<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExoController extends AbstractController
{
    /**
     * @Route("/exos/exo1/{num}")
     */
    public function exo1($num): Response
    {
        return new Response($num * $num);
    }

    /**
     * @Route("/exos/exo2")
     */
    public function exo2(): Response
    {
        $photos = ['loup.jpg', 'lupus.jpg', 'wolf.jpg'];
        
        return $this->render('exo/exo2.html.twig', array(
            'photos' => $photos
        ));
    }
}
