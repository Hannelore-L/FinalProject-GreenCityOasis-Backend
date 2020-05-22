<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LocationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=LocationRepository::class)
 */
class Location
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $location_id;

    /**
     * @ORM\Column(type="string", length=512)
     */
    private $location_title;

    /**
     * @ORM\Column(type="string", length=512)
     */
    private $location_unique;

    /**
     * @ORM\Column(type="string", length=512)
     */
    private $location_address_text;

    /**
     * @ORM\Column(type="string", length=512)
     */
    private $location_address_info;

    /**
     * @ORM\Column(type="text")
     */
    private $location_desc;

    /**
     * @ORM\Column(type="datetime")
     */
    private $location_created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $location_edited_at;

    /**
     * @ORM\Column(type="boolean")
     */
    private $location_is_deleted;

    public function getLocationId(): ?int
    {
        return $this->location_id;
    }

    public function getLocationTitle(): ?string
    {
        return $this->location_title;
    }

    public function setLocationTitle(string $location_title): self
    {
        $this->location_title = $location_title;

        return $this;
    }

    public function getLocationUnique(): ?string
    {
        return $this->location_unique;
    }

    public function setLocationUnique(string $location_unique): self
    {
        $this->location_unique = $location_unique;

        return $this;
    }

    public function getLocationAddressText(): ?string
    {
        return $this->location_address_text;
    }

    public function setLocationAddressText(string $location_address_text): self
    {
        $this->location_address_text = $location_address_text;

        return $this;
    }

    public function getLocationAddressInfo(): ?string
    {
        return $this->location_address_info;
    }

    public function setLocationAddressInfo(string $location_address_info): self
    {
        $this->location_address_info = $location_address_info;

        return $this;
    }

    public function getLocationDesc(): ?string
    {
        return $this->location_desc;
    }

    public function setLocationDesc(string $location_desc): self
    {
        $this->location_desc = $location_desc;

        return $this;
    }

    public function getLocationCreatedAt(): ?\DateTimeInterface
    {
        return $this->location_created_at;
    }

    public function setLocationCreatedAt(\DateTimeInterface $location_created_at): self
    {
        $this->location_created_at = $location_created_at;

        return $this;
    }

    public function getLocationEditedAt(): ?\DateTimeInterface
    {
        return $this->location_edited_at;
    }

    public function setLocationEditedAt(\DateTimeInterface $location_edited_at): self
    {
        $this->location_edited_at = $location_edited_at;

        return $this;
    }

    public function getLocationIsDeleted(): ?bool
    {
        return $this->location_is_deleted;
    }

    public function setLocationIsDeleted(bool $location_is_deleted): self
    {
        $this->location_is_deleted = $location_is_deleted;

        return $this;
    }
}