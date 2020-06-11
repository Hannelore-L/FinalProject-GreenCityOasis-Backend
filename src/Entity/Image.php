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
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\NumericFilter;
use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


//      __________________________________________________________________________________
//                                                                             C L A S S
//      __________________________________________________________________________________
/**
 * Image
 * @ApiResource(
 *     collectionOperations={ "get", "post" },
 *     itemOperations={ "get", "put" },
 *     normalizationContext={ "groups"={ "image:read" }, "swagger_definition_name"="Read" },
 *     denormalizationContext={ "groups"={ "image:write" }, "swagger_definition_name"="Write" }
 * )
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 * @ORM\Table(name="image")
 * @ApiFilter( NumericFilter::class, properties={ "image_location_id" } )
 */
class Image
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

    //      -               -               -               N A M E               -               -               -
    /**
     * @ORM\Column(type="string", length=512)
     * @Groups({"image_info:write"})
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min=2,
     *     minMessage="Please use at least 2 characters"
     * )
     */
    private $image_name;

    //      -               -               -               F I L E   N A M E               -               -               -
    /**
     * @ORM\Column(type="string", length=512)
     * @Assert\NotBlank()
     */
    private $image_file_name;

    //      -               -               -               E X T E N S I O N               -               -               -
    /**
     * @ORM\Column(type="string", length=512)
     * @Assert\NotBlank()
     */
    private $image_extension;

    //      -               -               -               U P L O A D E D   A T               -               -               -
    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank()
     */
    private $image_uploaded_at;

    //      -               -               -               U S E R   I D               -               -               -
    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="images")
     * @ORM\JoinColumn(nullable=false)
     */
    private $image_user_id;

    //      -               -               -               L O C A T I O N   I D               -               -               -
    /**
     * @ORM\ManyToOne(targetEntity=Location::class, inversedBy="images")
     * @ORM\JoinColumn(nullable=false)
     */
    private $image_location_id;

    //      -               -               -               C O O R D I N A T E S               -               -               -
    /**
     * @ORM\Column(type="string", length=512)
     */
    private $image_coordinates;

    //      -               -               -               I S   D E L E T E D               -               -               -
    /**
     * @ORM\Column(type="boolean")
     * @Assert\NotBlank()
     */
    private $image_is_deleted;


    //      __________________________________________________________________________________
    //                                                                        M E T H O D S
    //      __________________________________________________________________________________

    //      -               -               -              getter ID               -               -               -
    /**
     * The ID of the location
     *
     * @Groups( { "image:read" } )
     */
    public function getId(): ?int
    {
        return $this->id;
    }


    //      -               -               -              getter & setter NAME               -               -               -
    /**
     * The name of the image given by the user
     *
     * @Groups( { "image:read", "locations:read" } )
     */
    public function getImageName(): ?string
    {
        return $this->image_name;
    }

    /**
     * The name of the image given by the user
     *
     * @Groups( { "image:write" } )
     */
    public function setImageName(string $image_name): self
    {
        $this->image_name = $image_name;

        return $this;
    }


    //      -               -               -              getter & setter FILE NAME               -               -               -
    /**
     * The file name of the image without extension
     *
     * @Groups( { "image:read" } )
     */
    public function getImageFileName(): ?string
    {
        return $this->image_file_name;
    }

    /**
     * The file name of the image without extension
     *
     * @Groups( { "image:write" } )
     */
    public function setImageFileName(string $image_file_name): self
    {
        $this->image_file_name = $image_file_name;

        return $this;
    }


    //      -               -               -              getter & setter EXTENSION               -               -               -
    /**
     * The extension of the image file
     *
     * @Groups( { "image:read" } )
     */
    public function getImageExtension(): ?string
    {
        return $this->image_extension;
    }

    /**
     * The extension of the image file
     *
     * @Groups( { "image:write" } )
     */
    public function setImageExtension(string $image_extension): self
    {
        $this->image_extension = $image_extension;

        return $this;
    }


    //      -               -               -              getter & setter UPLOADED AT               -               -               -
    /**
     * The time and date the image was uploaded
     *
     * @Groups( { "image:read" } )
     */
    public function getImageUploadedAt(): ?\DateTimeInterface
    {
        return $this->image_uploaded_at;
    }

    /**
     * The time and date the image was uploaded
     *
     * @Groups( { "image:write" } )
     */
    public function setImageUploadedAt(\DateTimeInterface $image_uploaded_at): self
    {
        $this->image_uploaded_at = $image_uploaded_at;

        return $this;
    }


    //      -               -               -              getter & setter USER ID               -               -               -
    /**
     * The ID of the user that uploaded the image
     *
     * @Groups( { "image:read" } )
     */
    public function getImageUserId(): ?user
    {
        return $this->image_user_id;
    }

    /**
     * The ID of the user that uploaded the image
     *
     * @Groups( { "image:write" } )
     */
    public function setImageUserId(?user $image_user_id): self
    {
        $this->image_user_id = $image_user_id;

        return $this;
    }


    //      -               -               -              getter & setter LOCATION ID               -               -               -
    /**
     * The ID of the location the image is of
     *
     * @Groups( { "image:read" } )
     */
    public function getImageLocationId(): ?Location
    {
        return $this->image_location_id;
    }

    /**
     * The ID of the location the image is of
     *
     * @Groups( { "image:write" } )
     */
    public function setImageLocationId(?Location $image_location_id): self
    {
        $this->image_location_id = $image_location_id;

        return $this;
    }


    //      -               -               -              getter & setter COORDINATES               -               -               -
    /**
     * The coordinates of the image
     *
     * @Groups( { "image:read" } )
     */
    public function getImageCoordinates(): ?string
    {
        return $this->image_coordinates;
    }

    /**
     * The coordinates of the image
     *
     * @Groups( { "image:write" } )
     */
    public function setImageCoordinates(string $image_coordinates): self
    {
        $this->image_coordinates = $image_coordinates;

        return $this;
    }


    //      -               -               -              getter & setter IS DELETED               -               -               -
    /**
     * A soft delete for the image.
     *
     * @Groups( { "image:read" } )
     */
    public function getImageIsDeleted(): ?bool
    {
        return $this->image_is_deleted;
    }

    /**
     * A soft delete for the image.
     *
     * @Groups( { "image:write" } )
     */
    public function setImageIsDeleted(bool $image_is_deleted): self
    {
        $this->image_is_deleted = $image_is_deleted;

        return $this;
    }
}