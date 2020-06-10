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
use App\Repository\CityRepository;
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
 *        normalizationContext={ "groups"={ "city:read" }, "swagger_definition_name"="Read" }
 * )
 * @ORM\Entity(repositoryClass=CityRepository::class)
 * @ORM\Table(name="city")
 * @ApiFilter( SearchFilter::class, properties={ "city_name": "partial" } )
 */
class City
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

    //      -               -               -               C O U N T R Y   I D               -               -               -
    /**
     * @ORM\ManyToOne(targetEntity=Country::class, inversedBy="cities")
     * @ORM\JoinColumn(nullable=false)
     */
    private $city_country_id;

    //      -               -               -               Z I P               -               -               -
    /**
     * @ORM\Column(type="smallint")
     */
    private $city_zip;

    //      -               -               -               N A M E               -               -               -
    /**
     * @ORM\Column(type="string", length=512)
     */
    private $city_name;

    //      -               -               -               P R O V I N C E               -               -               -
    /**
     * @ORM\Column(type="string", length=512, nullable=true)
     */
    private $city_province;


    //      -               -               -               U S E R S               -               -               -
    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="user_city_id")
     */
    private $users;


    //      __________________________________________________________________________________
    //                                                                        M E T H O D S
    //      __________________________________________________________________________________

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }


    //      -               -               -              getter ID               -               -               -
    /**
     * The ID of the city
     *
     * @Groups( { "city:read" } )
     */
    public function getId(): ?int
    {
        return $this->id;
    }


    //      -               -               -              getter & setter COUNTRY ID               -               -               -
    /**
     * The ID of the country the city is located in
     *
     * @Groups( { "city:read" } )
     */
    public function getCityCountryId(): ?country
    {
        return $this->city_country_id;
    }

    /**
     * The ID of the country the city is located in
     */
    public function setCityCountryId(?user $city_country_id): self
    {
        $this->city_country_id = $city_country_id;

        return $this;
    }


    //      -               -               -              getter & setter ZIP               -               -               -
    /**
     * The ZIP code of the city
     *
     * @Groups( { "city:read" } )
     */
    public function getCityZip(): ?int
    {
        return $this->city_zip;
    }

    /**
     * The ZIP code of the city
     */
    public function setCityZip(int $city_zip): self
    {
        $this->city_zip = $city_zip;

        return $this;
    }


    //      -               -               -              getter & setter NAME               -               -               -
    /**
     * The name of the city
     *
     * @Groups( { "city:read", "country:read" } )
     */
    public function getCityName(): ?string
    {
        return $this->city_name;
    }

    /**
     * The name of the city
     */
    public function setCityName(string $city_name): self
    {
        $this->city_name = $city_name;

        return $this;
    }


    //      -               -               -              getter & setter PROVINCE               -               -               -
    /**
     * The province the city is located in
     *
     * @Groups( { "city:read" } )
     */
    public function getCityProvince(): ?string
    {
        return $this->city_province;
    }

    /**
     * The province the city is located in
     */
    public function setCityProvince(string $city_province): self
    {
        $this->city_province = $city_province;

        return $this;
    }


    //      -               -               -              getter, adder & remover IMAGE               -               -               -
    /**
     * The users that live in a certain city
     *
     * @return Collection|User[]
     * @Groups( { "city:read" } )

     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setUserCityId($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getUserCityId() === $this) {
                $user->setUserCityId(null);
            }
        }

        return $this;
    }

}