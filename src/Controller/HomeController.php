<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        return $this->render('/base.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

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
