<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListingController extends AbstractController
{
    #[Route('/listing/antwerp/houses', name: 'app_listing_houses_antwerp')]
    public function listing_houses_antwerp(): Response
    {
        return $this->render('listing/antwerpHouses.html.twig');
    }
}
