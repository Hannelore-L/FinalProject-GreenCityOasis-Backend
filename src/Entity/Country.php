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
use App\Repository\CountryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


//      __________________________________________________________________________________
//                                                                             C L A S S
//      __________________________________________________________________________________
/**
 * @ApiResource(
 *        collectionOperations={ "get" },
 *        itemOperations={ "get" },
 *        normalizationContext={"groups"={"country:read"}, "swagger_definition_name"="Read"}
 * )
 * @ORM\Entity(repositoryClass=CountryRepository::class)
 * @ORM\Table(name="country")
 * @ApiFilter( SearchFilter::class, properties={ "country_name": "partial" } )
 */
class Country
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
     */
    private $country_name;


    //      -               -               -               C I T I E S               -               -               -
    /**
     * @ORM\OneToMany(targetEntity=City::class, mappedBy="city_country_id")
     */
    private $cities;


    //      -               -               -               U S E R S               -               -               -
    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="user_country_id")
     */
    private $users;


    //      __________________________________________________________________________________
    //                                                                        M E T H O D S
    //      __________________________________________________________________________________

    public function __construct()
    {
        $this->cities = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    //      -               -               -              getter ID               -               -               -
    /**
     * The ID of the country
     *
     * @Groups( { "country:read" } )
     */
    public function getId(): ?int
    {
        return $this->id;
    }


    //      -               -               -              getter & setter NAME               -               -               -
    /**
     * The name of the country
     *
     * @Groups( { "country:read" } )
     */
    public function getCountryName(): ?string
    {
        return $this->country_name;
    }

    /**
     * The name of the country
     */
    public function setCountryName(string $country_name): self
    {
        $this->country_name = $country_name;

        return $this;
    }


    //      -               -               -              getter, adder & remover CITY                -               -               -
    /**
     * The cities that belong to this country
     *
     * @return Collection|City[]
     * @Groups( { "country:read" } )

     */
    public function getCities(): Collection
    {
        return $this->cities;
    }

    public function addCity(City $city): self
    {
        if (!$this->cities->contains($city)) {
            $this->cities[] = $city;
            $city->setCityCountryId($this);
        }

        return $this;
    }

    public function removeCity(City $city): self
    {
        if ($this->cities->contains($city)) {
            $this->cities->removeElement($city);
            // set the owning side to null (unless already changed)
            if ($city->getCityCountryId() === $this) {
                $city->setCityCountryId(null);
            }
        }

        return $this;
    }


    //      -               -               -              getter, adder & remover USER               -               -               -
    /**
     * The users that live in a certain country
     *
     * @return Collection|User[]
     * @Groups( { "country:read" } )

     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setUserCountryId($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getUserCountryId() === $this) {
                $user->setUserCountryId(null);
            }
        }

        return $this;
    }
}