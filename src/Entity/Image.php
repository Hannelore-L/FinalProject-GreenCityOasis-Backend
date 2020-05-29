<?php

//        -        -        -        N A M E S P A C E        -        -        -
namespace App\Entity;

//        -        -        -        U S E        -        -        -
use App\Repository\ImageRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

//        -        -        -        C L A S S        -        -        -
/**
 * Image
 * @ApiResource(
 *     collectionOperations={ "get", "post" },
 *     itemOperations={ "get", "put" },
 * )
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 * @ORM\Table(name="image")
 */
class Image
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
     * @Groups({"image_info:write"})
     */
    private $image_name;

    /**
     * @ORM\Column(type="string", length=512)
     */
    private $image_file_name;

    /**
     * @ORM\Column(type="string", length=512)
     */
    private $image_extension;

    /**
     * @ORM\Column(type="datetime")
     */
    private $image_uploaded_at;

    /**
     * @ORM\Column(type="integer")
     */
    private $image_user_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $image_location_id;

    /**
     * @ORM\Column(type="string", length=512)
     */
    private $image_coordinates;

    /**
     * @ORM\Column(type="boolean")
     */
    private $image_is_deleted;


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

    public function getImageName(): ?string
    {
        return $this->image_name;
    }

    public function setImageName(string $image_name): self
    {
        $this->image_name = $image_name;

        return $this;
    }

    public function getImageFileName(): ?string
    {
        return $this->image_file_name;
    }

    public function setImageFileName(string $image_file_name): self
    {
        $this->image_file_name = $image_file_name;

        return $this;
    }

    public function getImageExtension(): ?string
    {
        return $this->image_extension;
    }

    public function setImageExtension(string $image_extension): self
    {
        $this->image_extension = $image_extension;

        return $this;
    }

    public function getImageUploadedAt(): ?\DateTimeInterface
    {
        return $this->image_uploaded_at;
    }

    public function setImageUploadedAt(\DateTimeInterface $image_uploaded_at): self
    {
        $this->image_uploaded_at = $image_uploaded_at;

        return $this;
    }

    public function getImageUserId(): ?int
    {
        return $this->image_user_id;
    }

    public function setImageUserId(int $image_user_id): self
    {
        $this->image_user_id = $image_user_id;

        return $this;
    }

    public function getImageLocationId(): ?int
    {
        return $this->image_location_id;
    }

    public function setImageLocationId(int $image_location_id): self
    {
        $this->image_location_id = $image_location_id;

        return $this;
    }

    public function getImageCoordinates(): ?string
    {
        return $this->image_coordinates;
    }

    public function setImageCoordinates(string $image_coordinates): self
    {
        $this->image_coordinates = $image_coordinates;

        return $this;
    }

    public function getImageIsDeleted(): ?bool
    {
        return $this->image_is_deleted;
    }

    public function setImageIsDeleted(bool $image_is_deleted): self
    {
        $this->image_is_deleted = $image_is_deleted;

        return $this;
    }
}
