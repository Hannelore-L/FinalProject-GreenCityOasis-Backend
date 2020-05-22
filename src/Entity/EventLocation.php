<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EventLocationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=EventLocationRepository::class)
 */
class EventLocation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $event_location_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $event_location_location_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $event_location_event_id;

    public function getEventLocationId(): ?int
    {
        return $this->event_location_id;
    }

    public function getEventLocationLocationId(): ?int
    {
        return $this->event_location_location_id;
    }

    public function setEventLocationLocationId(int $event_location_location_id): self
    {
        $this->event_location_location_id = $event_location_location_id;

        return $this;
    }

    public function getEventLocationEventId(): ?int
    {
        return $this->event_location_event_id;
    }

    public function setEventLocationEventId(int $event_location_event_id): self
    {
        $this->event_location_event_id = $event_location_event_id;

        return $this;
    }
}
