<?php

namespace App\Entity;

use App\Repository\HouseRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\getListing;

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
 * })
 */


#[ORM\Entity(repositoryClass: HouseRepository::class)]
class House
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 128)]
    private $name;

    #[ORM\Column(type: 'string', length: 128)]
    private $url;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private $stars;

    #[ORM\Column(type: 'integer')]
    private $price;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $extra_costs;

    #[ORM\Column(type: 'integer')]
    private $fk_contact;

    #[ORM\Column(type: 'integer')]
    private $fk_location;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getStars(): ?int
    {
        return $this->stars;
    }

    public function setStars(?int $stars): self
    {
        $this->stars = $stars;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getExtraCosts(): ?int
    {
        return $this->extra_costs;
    }

    public function setExtraCosts(?int $extra_costs): self
    {
        $this->extra_costs = $extra_costs;

        return $this;
    }

    public function getFkContact(): ?int
    {
        return $this->fk_contact;
    }

    public function setFkContact(int $fk_contact): self
    {
        $this->fk_contact = $fk_contact;

        return $this;
    }

    public function getFkLocation(): ?int
    {
        return $this->fk_location;
    }

    public function setFkLocation(int $fk_location): self
    {
        $this->fk_location = $fk_location;

        return $this;
    }
}
