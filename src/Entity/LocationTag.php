<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LocationTagRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=LocationTagRepository::class)
 */
class LocationTag
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $location_tag_location_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $location_tag_tag_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocationTagLocationId(): ?int
    {
        return $this->location_tag_location_id;
    }

    public function setLocationTagLocationId(int $location_tag_location_id): self
    {
        $this->location_tag_location_id = $location_tag_location_id;

        return $this;
    }

    public function getLocationTagTagId(): ?int
    {
        return $this->location_tag_tag_id;
    }

    public function setLocationTagTagId(int $location_tag_tag_id): self
    {
        $this->location_tag_tag_id = $location_tag_tag_id;

        return $this;
    }
}
