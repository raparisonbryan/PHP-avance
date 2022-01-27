<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/homeAdmin", name="homeAdmin")
     */

    public function indexAdmin(): Response
    {
        return $this->render('/base.admin.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
