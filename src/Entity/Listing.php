<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ListingRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Controller\getListing;

#[ORM\Entity(repositoryClass: ListingRepository::class)]
/**
 * @ApiResource(itemOperations={
 * "get_listing"={
 *       "method" = "GET",
 *       "path" = "/houses/listings/{limiter}",
 *       "controller" = getListing::class,
 *       "read"=false,
 *          "openapi_context" = {
 *         "parameters" = {
 *           {
 *             "name" = "limiter",
 *             "in" = "path",
 *             "description" = "limit of elements in the results of the query",
 *             "type" = "int",
 *             "required" = false,
 *             "example"= "100",
 *           },
 *         },
 * }, 
 *  }
 * },)
 */
class Listing
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
