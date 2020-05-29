<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ReviewRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ReviewRepository::class)
 */
class Review
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
    private $review_rating;

    /**
     * @ORM\Column(type="text")
     */
    private $review_desc;

    /**
     * @ORM\Column(type="integer")
     */
    private $review_location_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $review_user_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReviewRating(): ?int
    {
        return $this->review_rating;
    }

    public function setReviewRating(int $review_rating): self
    {
        $this->review_rating = $review_rating;

        return $this;
    }

    public function getReviewDesc(): ?string
    {
        return $this->review_desc;
    }

    public function setReviewDesc(string $review_desc): self
    {
        $this->review_desc = $review_desc;

        return $this;
    }

    public function getReviewLocationId(): ?int
    {
        return $this->review_location_id;
    }

    public function setReviewLocationId(int $review_location_id): self
    {
        $this->review_location_id = $review_location_id;

        return $this;
    }

    public function getReviewUserId(): ?int
    {
        return $this->review_user_id;
    }

    public function setReviewUserId(int $review_user_id): self
    {
        $this->review_user_id = $review_user_id;

        return $this;
    }
}
