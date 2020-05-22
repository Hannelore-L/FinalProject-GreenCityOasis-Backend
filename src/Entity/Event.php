<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EventRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=EventRepository::class)
 */
class Event
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $event_id;

    /**
     * @ORM\Column(type="text")
     */
    private $event_desc;

    /**
     * @ORM\Column(type="date")
     */
    private $event_start_date;

    /**
     * @ORM\Column(type="date")
     */
    private $event_end_date;

    /**
     * @ORM\Column(type="string", length=512)
     */
    private $event_time;

    public function getEventId(): ?int
    {
        return $this->event_id;
    }

    public function getEventDesc(): ?string
    {
        return $this->event_desc;
    }

    public function setEventDesc(string $event_desc): self
    {
        $this->event_desc = $event_desc;

        return $this;
    }

    public function getEventStartDate(): ?\DateTimeInterface
    {
        return $this->event_start_date;
    }

    public function setEventStartDate(\DateTimeInterface $event_start_date): self
    {
        $this->event_start_date = $event_start_date;

        return $this;
    }

    public function getEventEndDate(): ?\DateTimeInterface
    {
        return $this->event_end_date;
    }

    public function setEventEndDate(\DateTimeInterface $event_end_date): self
    {
        $this->event_end_date = $event_end_date;

        return $this;
    }

    public function getEventTime(): ?string
    {
        return $this->event_time;
    }

    public function setEventTime(string $event_time): self
    {
        $this->event_time = $event_time;

        return $this;
    }
}
