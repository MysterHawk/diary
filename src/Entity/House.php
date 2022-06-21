<?php

namespace App\Entity;

use App\Repository\HouseRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

#[ApiResource]


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
    private $rating;

    #[ORM\Column(type: 'integer')]
    private $monthly_cost;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $extra_costs;

    #[ORM\Column(type: 'integer')]
    private $guarantee;

    #[ORM\Column(type: 'integer')]
    private $annual_cost;

    #[ORM\Column(type: 'text', nullable: true)]
    private $note;

    #[ORM\Column(type: 'integer')]
    private $fk_contact;

    #[ORM\Column(type: 'integer')]
    private $fk_location;

    #[ORM\Column(type: 'integer')]
    private $size;

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

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(?int $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getMonthlyCost(): ?int
    {
        return $this->monthly_cost;
    }

    public function setMonthlyCost(int $monthly_cost): self
    {
        $this->monthly_cost = $monthly_cost;

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

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getGuarantee(): ?int
    {
        return $this->guarantee;
    }

    public function setGuarantee(int $guarantee): self
    {
        $this->guarantee = $guarantee;

        return $this;
    }

    public function getAnnualCost(): ?int
    {
        return $this->annual_cost;
    }

    public function setAnnualCost(int $annual_cost): self
    {
        $this->annual_cost = $annual_cost;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(int $size): self
    {
        $this->size = $size;

        return $this;
    }
}
