<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HouseController extends AbstractController
{
    #[Route('/house/{id}', name: 'app_house')]
    public function getHouse(): Response
    {
        return $this->render('house/getHouse.html.twig');
    }

    #[Route('/house/create', name: 'app_house')]
    public function createHouse(): Response
    {
        return $this->render('house/createHouse.html.twig');
    }
}
