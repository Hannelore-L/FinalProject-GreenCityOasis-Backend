<?php

//        -        -        -        N A M E S P A C E        -        -        -
namespace App\Entity;


//        -        -        -        U S E        -        -        -
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LocationRepository;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\Serializer\Annotation\SerializedName;


//        -        -        -        C L A S S        -        -        -
/**
 * @ApiResource(
 *     collectionOperations={ "get" },
 *     itemOperations={ "get" },
 *     normalizationContext={"groups"={"locations:read"}, "swagger_definition_name"="Read"},
 *     denormalizationContext={"groups"={"locations:write"}, "swagger_definition_name"="Write"}
 * )
 * @ORM\Entity(repositoryClass=LocationRepository::class)
 * @ApiFilter( BooleanFilter::class, properties={ "location_is_deleted" } )
 * @ApiFilter( SearchFilter::class, properties={ "location_title": "partial", "location_unique": "partial" } )
 */
class Location
{
    //        -        -        -        P R O P E R T I E S        -        -        -
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

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
     * @ORM\Column(type="boolean")
     */
    private $location_is_deleted;


//        -        -        -        M E T H O D S        -        -        -

    //  getter ID

    /**
     * The ID of the location
     *
     * @Groups( { "locations:read" } )
     */
    public function getId(): ?int
    {
        return $this->id;
    }


    //  getter & setter TITLE

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
     *
     * @Groups( { "locations:write" } )
     */
    public function setLocationTitle(string $location_title): self
    {
        $this->location_title = $location_title;

        return $this;
    }


    //  getter & setter UNIQUE

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
     *
     * @Groups( { "locations:write" } )
     */
    public function setLocationUnique(string $location_unique): self
    {
        $this->location_unique = $location_unique;

        return $this;
    }


    //  getter & setter ADDRESS TEXT

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
     *
     * @Groups( { "locations:write" } )
     */
    public function setLocationAddressText(string $location_address_text): self
    {
        $this->location_address_text = $location_address_text;

        return $this;
    }


    //  getter & setter ADDRESS INFO

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
     *
     * @Groups( { "locations:write" } )
     */
    public function setLocationAddressInfo(string $location_address_info): self
    {
        $this->location_address_info = $location_address_info;

        return $this;
    }


    //  getter & setter DESCRIPTION

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
     *
     * @Groups( { "locations:write" } )
     */
    public function setLocationDesc(string $location_desc): self
    {
        $this->location_desc = $location_desc;

        return $this;
    }


    //  getter & setter CREATED AT
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
     *
     * @Groups( { "locations:write" } )
     */
    public function setLocationCreatedAt(\DateTimeInterface $location_created_at): self
    {
        $this->location_created_at = $location_created_at;

        return $this;
    }

    //  getter & setter IS DELETED

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
     *
     * @Groups( { "locations:write" } )
     */
    public function setLocationIsDeleted(bool $location_is_deleted): self
    {
        $this->location_is_deleted = $location_is_deleted;

        return $this;
    }
}