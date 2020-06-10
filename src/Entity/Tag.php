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
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\TagRepository;
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
 *     normalizationContext={ "groups"={ "tag:read" }, "swagger_definition_name"="Read" }
 * )
 * @ORM\Entity(repositoryClass=TagRepository::class)
 * @ApiFilter( SearchFilter::class, properties={ "tag_desc": "exact" } )
 */
class Tag
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
     * @ORM\ManyToMany(targetEntity=Location::class, inversedBy="tags")
     */
    private $tag_location_id;

    //      -               -               -               D E S C R I P T I O N               -               -               -
    /**
     * @ORM\Column(type="string", length=512)
     */
    private $tag_desc;


    //      __________________________________________________________________________________
    //                                                                        M E T H O D S
    //      __________________________________________________________________________________

    public function __construct()
    {
        $this->tag_location_id = new ArrayCollection();
    }

    //      -               -               -              getter ID               -               -               -
    /**
     * The ID of the user
     *
     * @Groups( { "tag:read", "locations:read" } )
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    //      -               -               -              getter, adder & remover LOCATION ID               -               -               -
    /**
     * The ID of the location that has this tag
     *
     * @Groups( { "tag:read" } )
     */
    /**
     * @return Collection|location[]
     */
    public function getTagLocationId(): Collection
    {
        return $this->tag_location_id;
    }

    public function addTagLocationId(location $tagLocationId): self
    {
        if (!$this->tag_location_id->contains($tagLocationId)) {
            $this->tag_location_id[] = $tagLocationId;
        }

        return $this;
    }

    public function removeTagLocationId(location $tagLocationId): self
    {
        if ($this->tag_location_id->contains($tagLocationId)) {
            $this->tag_location_id->removeElement($tagLocationId);
        }

        return $this;
    }

    //      -               -               -              getter & setter DESCRIPTION               -               -               -
    /**
     * The name of the tag
     *
     * @Groups( { "tag:read", "locations:read" } )
     */
    public function getTagDesc(): ?string
    {
        return $this->tag_desc;
    }

    /**
     * The name of the tag
     */
    public function setTagDesc(string $tag_desc): self
    {
        $this->tag_desc = $tag_desc;

        return $this;
    }
}