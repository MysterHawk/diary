<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Contact;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(): Response
    {
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }

    #[Route('/contact/{id}', name: 'get_contact')]
    public function getContact(ManagerRegistry $doctrine, int $id): Response
    {
        $contact = $doctrine->getRepository(Contact::class)->find($id);

        if (!$contact) {
            throw $this->createNotFoundException(
                'No contact found for id ' . $id
            );
        }

        return $this->render('contact/getContact.html.twig', ['contact' => $contact]);
    }
}
