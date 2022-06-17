<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HouseController extends AbstractController
{
    public function getPage(): Response
    #[Route('/house/{id}', name: 'app_house')]
    {
        return $this->render('house.html');
    #[Route('/house/create', name: 'app_house')]
    }
}
