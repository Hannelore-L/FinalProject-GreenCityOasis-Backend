<?php

//      __________________________________________________________________________________
//                                                                     N A M E S P A C E
//      __________________________________________________________________________________
namespace App\Entity;


//      __________________________________________________________________________________
//                                                                                U S E
//      __________________________________________________________________________________
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\LocationRepository;
use Carbon\Carbon;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;


//      __________________________________________________________________________________
//                                                                             C L A S S
//      __________________________________________________________________________________
/**
 * @ApiResource(
 *     collectionOperations={ "get" },
 *     itemOperations={ "get" },
 *     normalizationContext={ "groups"={ "locations:read" }, "swagger_definition_name"="Read" }
 * )
 * @ORM\Entity(repositoryClass=LocationRepository::class)
 * @ApiFilter( BooleanFilter::class, properties={ "location_is_deleted" } )
 * @ApiFilter( SearchFilter::class, properties={ "location_title": "partial", "location_unique": "partial" } )
 */
class Location
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

    //      -               -               -               T I T L E               -               -               -
    /**
     * @ORM\Column(type="string", length=512)
     */
    private $location_title;

    //      -               -               -               UNIQUE               -               -               -
    /**
     * @ORM\Column(type="string", length=512)
     */
    private $location_unique;

    //      -               -               -               A D D R E S S   T E X T               -               -               -
    /**
     * @ORM\Column(type="string", length=512)
     */
    private $location_address_text;

    //      -               -               -               A D D R E S S   I N F O               -               -               -
    /**
     * @ORM\Column(type="string", length=512)
     */
    private $location_address_info;

    //      -               -               -               D E S C R I P T I O N               -               -               -
    /**
     * @ORM\Column(type="text")
     */
    private $location_desc;

    //      -               -               -               C R E A T E D   A T               -               -               -
    /**
     * @ORM\Column(type="datetime")
     */
    private $location_created_at;

    //      -               -               -               I S   D E L E T E D               -               -               -
    /**
     * @ORM\Column(type="boolean")
     */
    private $location_is_deleted;


    //      -               -               -               I M A G E S               -               -               -
    /**
     * @ORM\OneToMany(targetEntity=Image::class, mappedBy="image_location_id")
     */
    private $images;

    //      -               -               -               R E V I E W S               -               -               -
    /**
     * @ORM\OneToMany(targetEntity=Review::class, mappedBy="review_location_id")
     */
    private $reviews;

    //      -               -               -               T A G S               -               -               -
    /**
     * @ORM\ManyToMany(targetEntity=Tag::class, mappedBy="tag_location_id")
     */
    private $tags;

    /**
     * @ORM\ManyToMany(targetEntity=Event::class, mappedBy="event_location_id")
     */
    private $events;


    //      __________________________________________________________________________________
    //                                                                        M E T H O D S
    //      __________________________________________________________________________________

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->reviews = new ArrayCollection();
        $this->tags = new ArrayCollection();
        $this->events = new ArrayCollection();
    }


    //      -               -               -              getter ID               -               -               -
    /**
     * The ID of the location
     *
     * @Groups( { "locations:read" } )
     */
    public function getId(): ?int
    {
        return $this->id;
    }


    //      -               -               -              getter & setter TITLE               -               -               -
    /**
     * The title of the location
     *
     * @Groups( { "locations:read" } )
     */
    public function getLocationTitle(): ?string
    {
        return $this->location_title;
    }

    /**
     * The name of the location
     */
    public function setLocationTitle(string $location_title): self
    {
        $this->location_title = $location_title;

        return $this;
    }


    //      -               -               -              getter & setter UNIQUE               -               -               -
    /**
     * The unique property of the location
     *
     * @Groups( { "locations:read" } )
     */
    public function getLocationUnique(): ?string
    {
        return $this->location_unique;
    }

    /**
     * The unique property of the location
     */
    public function setLocationUnique(string $location_unique): self
    {
        $this->location_unique = $location_unique;

        return $this;
    }


    //      -               -               -              getter & setter ADDRESS TEXT               -               -               -
    /**
     * The address of the location in text format
     *
     * @Groups( { "locations:read" } )
     */
    public function getLocationAddressText(): ?string
    {
        return $this->location_address_text;
    }

    /**
     * The address of the location in text format
     */
    public function setLocationAddressText(string $location_address_text): self
    {
        $this->location_address_text = $location_address_text;

        return $this;
    }


    //      -               -               -              getter & setter ADDRESS INFO               -               -               -
    /**
     * The info about the address for maps
     *
     * @Groups( { "locations:read" } )
     */
    public function getLocationAddressInfo(): ?string
    {
        return $this->location_address_info;
    }

    /**
     * The info about the address for maps
     */
    public function setLocationAddressInfo(string $location_address_info): self
    {
        $this->location_address_info = $location_address_info;

        return $this;
    }


    //      -               -               -              getter & setter DESCRIPTION               -               -               -
    /**
     * The text description for the location
     *
     * @Groups( { "locations:read" } )
     */
    public function getLocationDesc(): ?string
    {
        return $this->location_desc;
    }

    /**
     * The text description for the location
     */
    public function setLocationDesc(string $location_desc): self
    {
        $this->location_desc = $location_desc;

        return $this;
    }

    //      -               -               -              getter & setter CREATED AT               -               -               -
    /**
     * The time the entry of the location was created
     */
    public function getLocationCreatedAt(): ?\DateTimeInterface
    {
        return $this->location_created_at;
    }

    /**
     * The time the entry of the location was created, written as (time) ago
     *
     * @Groups( { "locations:read" } )
     * @SerializedName( "locationCreatedAt" )
     */
    public function getLocationCreatedAtAgo(): string
    {
        return Carbon::instance($this->getLocationCreatedAt())->diffForHumans();
    }

    /**
     * The time the entry of the location was created
     */
    public function setLocationCreatedAt(\DateTimeInterface $location_created_at): self
    {
        $this->location_created_at = $location_created_at;

        return $this;
    }

    //      -               -               -              getter & setter IS DELETED               -               -               -
    /**
     * The soft delete for this location entry
     *
     * @Groups( { "locations:read" } )
     */
    public function getLocationIsDeleted(): ?bool
    {
        return $this->location_is_deleted;
    }

    /**
     * The soft delete for this location entry
     */
    public function setLocationIsDeleted(bool $location_is_deleted): self
    {
        $this->location_is_deleted = $location_is_deleted;

        return $this;
    }


    //      -               -               -              getter, adder & remover IMAGE               -               -               -
    /**
     * The images belonging to these locations
     *
     * @return Collection|Image[]
     * @Groups( { "locations:read" } )
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setImageLocationId($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getImageLocationId() === $this) {
                $image->setImageLocationId(null);
            }
        }

        return $this;
    }



    //      -               -               -              getter, adder & remover REVIEW               -               -               -
    /**
     * The reviews belonging to these locations
     *
     * @return Collection|Review[]
     * @Groups( { "locations:read" } )
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(Review $review): self
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews[] = $review;
            $review->setReviewLocationId($this);
        }

        return $this;
    }

    public function removeReview(Review $review): self
    {
        if ($this->reviews->contains($review)) {
            $this->reviews->removeElement($review);
            // set the owning side to null (unless already changed)
            if ($review->getReviewLocationId() === $this) {
                $review->setReviewLocationId(null);
            }
        }

        return $this;
    }

    //      -               -               -              getter, adder & remover TAG               -               -               -
    /**
     * @return Collection|Tag[]
     * @Groups( { "locations:read" } )
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tag $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
            $tag->addTagLocationId($this);
        }

        return $this;
    }

    public function removeTag(Tag $tag): self
    {
        if ($this->tags->contains($tag)) {
            $this->tags->removeElement($tag);
            $tag->removeTagLocationId($this);
        }

        return $this;
    }


    //      -               -               -              getter, adder & remover TAG               -               -               -
    /**
     * @return Collection|Event[]
     * @Groups( { "locations:read" } )
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(Event $event): self
    {
        if (!$this->events->contains($event)) {
            $this->events[] = $event;
            $event->addEventLocationId($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): self
    {
        if ($this->events->contains($event)) {
            $this->events->removeElement($event);
            $event->removeEventLocationId($this);
        }

        return $this;
    }
}