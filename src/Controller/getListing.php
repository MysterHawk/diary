<?php

namespace App\Controller;

use Doctrine\DBAL\Connection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class getListing extends AbstractController
{
    public function __invoke(Connection $connection, int $limiter = 0)
    {
        return $connection->fetchAllAssociative('SELECT * FROM `house`');
    }
}
