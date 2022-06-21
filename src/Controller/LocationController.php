<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Location;

class LocationController extends AbstractController
{
    #[Route('/location', name: 'app_location')]
    public function index(): Response
    {
        return $this->render('location/index.html.twig', [
            'controller_name' => 'LocationController',
        ]);
    }

    #[Route('/location/{id}', name: 'get_location')]
    public function getLocation(ManagerRegistry $doctrine, int $id): Response
    {
        $location = $doctrine->getRepository(Location::class)->find($id);

        if (!$location) {
            throw $this->createNotFoundException(
                'No location found for id ' . $id
            );
        }

        return $this->render('location/getLocation.html.twig', ['location' => $location]);
    }
}
