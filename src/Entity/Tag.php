<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TagRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=TagRepository::class)
 */
class Tag
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=512)
     */
    private $tag_desc;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTagDesc(): ?string
    {
        return $this->tag_desc;
    }

    public function setTagDesc(string $tag_desc): self
    {
        $this->tag_desc = $tag_desc;

        return $this;
    }
}
