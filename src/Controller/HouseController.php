<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HouseController extends AbstractController
{
    public function getPage(): Response
    {
        return $this->render('house.html');
    }
}
