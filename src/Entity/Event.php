<?php

//      __________________________________________________________________________________
//                                                                     N A M E S P A C E
//      __________________________________________________________________________________
namespace App\Entity;

//      __________________________________________________________________________________
//                                                                                U S E
//      __________________________________________________________________________________
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


//      __________________________________________________________________________________
//                                                                             C L A S S
//      __________________________________________________________________________________
/**
 * @ApiResource(
 *     collectionOperations={ "get" },
 *     itemOperations={ "get" },
 *     normalizationContext={ "groups"={ "event:read" }, "swagger_definition_name"="Read" }
 *
 * )
 * @ORM\Entity(repositoryClass=EventRepository::class)
 */
class Event
{
    //      __________________________________________________________________________________
    //                                                                     P R O P E R T I E S
    //      __________________________________________________________________________________

    //      -               -               -               I D               -               -               -
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    //      -               -               -               L O C A T I O N   I D               -               -               -
    /**
     * @ORM\ManyToMany(targetEntity=Location::class, inversedBy="events")
     */
    private $event_location_id;

    //      -               -               -               D E S C R I P T I O N               -               -               -
    /**
     * @ORM\Column(type="text")
     */
    private $event_desc;

    //      -               -               -               S T A R T   D A T E               -               -               -
    /**
     * @ORM\Column(type="date")
     */
    private $event_start_date;

    //      -               -               -               E N D   D A T E               -               -               -
    /**
     * @ORM\Column(type="date")
     */
    private $event_end_date;

    //      -               -               -               T I M E S               -               -               -
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $event_times;


    //      __________________________________________________________________________________
    //                                                                        M E T H O D S
    //      __________________________________________________________________________________

    public function __construct()
    {
        $this->event_location_id = new ArrayCollection();
    }


    //      -               -               -              getter ID               -               -               -
    /**
     * The ID of the event
     *
     * @Groups( { "event:read" } )
     */
    public function getId(): ?int
    {
        return $this->id;
    }


    //      -               -               -              getter, adder & remover LOCATION ID               -               -               -

    /**
     * The ID of the location where the event will be
     *
     * @Groups( { "event:read" } )
     * @return Collection|location[]
     */
    public function getEventLocationId(): Collection
    {
        return $this->event_location_id;
    }

    public function addEventLocationId(location $eventLocationId): self
    {
        if (!$this->event_location_id->contains($eventLocationId)) {
            $this->event_location_id[] = $eventLocationId;
        }

        return $this;
    }

    public function removeEventLocationId(location $eventLocationId): self
    {
        if ($this->event_location_id->contains($eventLocationId)) {
            $this->event_location_id->removeElement($eventLocationId);
        }

        return $this;
    }


    //      -               -               -              getter & setter DESCRIPTION               -               -               -
    /**
     * The description of the event
     *
     * @Groups( { "event:read", "locations:read" } )
     */
    public function getEventDesc(): ?string
    {
        return $this->event_desc;
    }

    /**
     * The description of the event
     */
    public function setEventDesc(string $event_desc): self
    {
        $this->event_desc = $event_desc;

        return $this;
    }


    //      -               -               -              getter & setter START DATE               -               -               -
    /**
     * The start date of the event
     *
     * @Groups( { "event:read" } )
     */
    public function getEventStartDate(): ?\DateTimeInterface
    {
        return $this->event_start_date;
    }

    /**
     * The start date of the event
     */
    public function setEventStartDate(\DateTimeInterface $event_start_date): self
    {
        $this->event_start_date = $event_start_date;

        return $this;
    }


    //      -               -               -              getter & setter END DATE               -               -               -
    /**
     * The end date of the event
     *
     * @Groups( { "event:read" } )
     */
    public function getEventEndDate(): ?\DateTimeInterface
    {
        return $this->event_end_date;
    }

    /**
     * The end date of the event
     */
    public function setEventEndDate(\DateTimeInterface $event_end_date): self
    {
        $this->event_end_date = $event_end_date;

        return $this;
    }


    //      -               -               -              getter & setter TIMES               -               -               -
    /**
     * The time the event is active, written for example like 17:00 - 21:00
     *
     * @Groups( { "event:read" } )
     */
    public function getEventTimes(): ?string
    {
        return $this->event_times;
    }

    /**
     * The time the event is active, written for example like 17:00 - 21:00
     */
    public function setEventTimes(string $event_times): self
    {
        $this->event_times = $event_times;

        return $this;
    }
}
