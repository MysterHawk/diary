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
        return $connection->fetchAllAssociative("SELECT
                                                        `h`.`id`,
                                                        `h`.`name`,
                                                        `h`.`fk_location`,
                                                        `l`.`address` || ' ' || `l`.`address_number` || ', ' || `l`.`zip_code` as `address`,
                                                        `h`.`fk_contact`,
                                                        `c`.`name` || ' ' || `c`.`surname` as `contact`,
                                                        `h`.`size`,
                                                        `h`.`rating`,
                                                        `h`.`monthly_cost`,
                                                        `h`.`extra_costs`,
                                                        `h`.`guarantee`,
                                                        `h`.`annual_cost`,
                                                        `h`.`url`
                                                    FROM
                                                        `house` `h`
                                                    LEFT JOIN location l ON
                                                        `h`.`fk_location` = `l`.`id`
                                                    LEFT JOIN contact c ON
                                                        `h`.`fk_contact` = `c`.`id`
                                                    WHERE
                                                        1");
    }
}
