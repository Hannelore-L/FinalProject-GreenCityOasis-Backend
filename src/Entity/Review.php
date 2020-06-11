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
use App\Repository\ReviewRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


//      __________________________________________________________________________________
//                                                                             C L A S S
//      __________________________________________________________________________________
/**
 * @ApiResource(
 *     collectionOperations={ "get", "post" },
 *     itemOperations={ "get", "put" },
 *     normalizationContext={ "groups"={ "review:read" }, "swagger_definition_name"="Read" },
 *     denormalizationContext={ "groups"={ "review:write" }, "swagger_definition_name"="Write" }
 * )
 * @ORM\Entity(repositoryClass=ReviewRepository::class)
 * @ORM\Table(name="review")
 * @ApiFilter( NumericFilter::class, properties={ "review_location_id" } )
 */
class Review
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

    //      -               -               -               R A T I N G               -               -               -
    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $review_rating;

    //      -               -               -               D E S C R I P T I O N               -               -               -
    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min=5,
     *     minMessage="Please use at least 5 characters"
     * )
     */
    private $review_desc;

    //      -               -               -               L O C A T I O N   I D               -               -               -
    /**
     * @ORM\ManyToOne(targetEntity=Location::class, inversedBy="reviews")
     * @ORM\JoinColumn(nullable=false)
     */
    private $review_location_id;

    //      -               -               -               U S E R   I D               -               -               -
    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="reviews")
     * @ORM\JoinColumn(nullable=false)
     */
    private $review_user_id;

    //      -               -               -               C R E A T E D   A T               -               -               -
    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank()
     */
    private $review_created_at;

    //      -               -               -               I S   D E L E T E D               -               -               -
    /**
     * @ORM\Column(type="boolean")
     * @Assert\NotBlank()
     */
    private $review_is_deleted;


    //      __________________________________________________________________________________
    //                                                                        M E T H O D S
    //      __________________________________________________________________________________

    //      -               -               -              getter ID               -               -               -
    /**
     * The ID of the review
     *
     * @Groups( { "review:read" } )
     */
    public function getId(): ?int
    {
        return $this->id;
    }


    //      -               -               -              getter & setter RATING               -               -               -
    /**
     * The rating of the location /10
     *
     * @Groups( { "review:read" } )
     */
    public function getReviewRating(): ?int
    {
        return $this->review_rating;
    }

    /**
     * The rating of the location /10
     *
     * @Groups( { "review:write" } )
     */
    public function setReviewRating(int $review_rating): self
    {
        $this->review_rating = $review_rating;

        return $this;
    }


    //      -               -               -              getter & setter DESCRIPTION               -               -               -
    /**
     * The body of the review
     *
     * @Groups( { "review:read", "user:read", "locations:read" } )
     */
    public function getReviewDesc(): ?string
    {
        return $this->review_desc;
    }

    /**
     * The body of the review
     *
     * @Groups( { "review:write" } )
     */
    public function setReviewDesc(string $review_desc): self
    {
        $this->review_desc = $review_desc;

        return $this;
    }


    //      -               -               -              getter & setter LOCATION ID               -               -               -
    /**
     * The ID of the location the review is about
     *
     * @Groups( { "review:read" } )
     */
    public function getReviewLocationId(): ?Location
    {
        return $this->review_location_id;
    }

    /**
     * The ID of the location the review is about
     *
     * @Groups( { "review:write" } )
     * @param Location|null $review_location_id
     * @return Review
     */
    public function setReviewLocationId(?Location $review_location_id): self
    {
        $this->review_location_id = $review_location_id;

        return $this;
    }


    //      -               -               -              getter & setter USER ID               -               -               -
    /**
     * The user ID of the user who wrote the review
     *
     * @Groups( { "review:read" } )
     */
    public function getReviewUserId(): ?user
    {
        return $this->review_user_id;
    }

    /**
     * The user ID of the user who wrote the review
     *
     * @Groups( { "review:write" } )
     */
    public function setReviewUserId(?user $review_user_id): self
    {
        $this->review_user_id = $review_user_id;

        return $this;
    }


    //      -               -               -              getter & setter CREATED AT               -               -               -
    /**
     * The time and date the review was written
     *
     * @Groups( { "review:read" } )
     */
    public function getReviewCreatedAt(): ?\DateTimeInterface
    {
        return $this->review_created_at;
    }

    /**
     * The time and date the review was written
     *
     * @Groups( { "review:write" } )
     */
    public function setReviewCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->review_created_at = $created_at;

        return $this;
    }


    //      -               -               -              getter & setter IS DELETED               -               -               -
    /**
     * A soft delete for the review
     *
     * @Groups( { "review:read" } )
     */
    public function getReviewIsDeleted(): ?bool
    {
        return $this->review_is_deleted;
    }

    /**
     * A soft delete for the review
     *
     * @Groups( { "review:write" } )
     */
    public function setReviewIsDeleted(bool $review_is_deleted): self
    {
        $this->review_is_deleted = $review_is_deleted;

        return $this;
    }
}