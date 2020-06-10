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
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


//      __________________________________________________________________________________
//                                                                             C L A S S
//      __________________________________________________________________________________
/**
 * @ApiResource(
 *     collectionOperations={ "get", "post" },
 *     itemOperations={ "get", "put", "delete" },
 *     normalizationContext={ "groups"={ "user:read" }, "swagger_definition_name"="Read" },
 *     denormalizationContext={ "groups"={ "user:write" }, "swagger_definition_name"="Write" }
 * )
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity( fields={ "user_email" } )
 * @UniqueEntity( fields={ "user_username" } )
 */
class User implements \Symfony\Component\Security\Core\User\UserInterface
//class User
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

    //      -               -               -               E M A I L               -               -               -
    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $user_email;

    //      -               -               -               P A S S W O R D               -               -               -
    /**
     * @var string The hashed password
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *     min="8",
     *     minMessage="Please use a password that at least 8 characters long."
     * )
     *
     */
    private $user_password;

    //      -               -               -               R O L E S               -               -               -
    /**
     * @ORM\Column(type="json")
     */
    private $user_roles;

    //      -               -               -               U S E R N A M E               -               -               -
    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min="2",
     *     minMessage="Please chose a username with a minimum of 2 characters."
     * )
     */
    private $user_username;

    //      -               -               -               F I R S T   N A M E               -               -               -
    /**
     * @ORM\Column(type="string", length=512)
     */
    private $user_first_name;

    //      -               -               -               L A S T   N A M E               -               -               -
    /**
     * @ORM\Column(type="string", length=512)
     */
    private $user_last_name;

    //      -               -               -               C I T Y   I D               -               -               -
    /**
     * @ORM\ManyToOne(targetEntity=City::class, inversedBy="users")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user_city_id;

    //      -               -               -               C O U N T R Y   I D               -               -               -
    /**
     * @ORM\ManyToOne(targetEntity=Country::class, inversedBy="users")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user_country_id;

    //      -               -               -               R E G K E Y               -               -               -
    /**
     * @ORM\Column(type="string", length=512)
     */
    private $user_regkey;


    //      -               -               -               I M A G E S               -               -               -
    /**
     * @ORM\OneToMany(targetEntity=Image::class, mappedBy="image_user_id")
     */
    private $images;

    //      -               -               -               R E V I E W S               -               -               -
    /**
     * @ORM\OneToMany(targetEntity=Review::class, mappedBy="review_user_id")
     */
    private $reviews;


    //      __________________________________________________________________________________
    //                                                                        M E T H O D S
    //      __________________________________________________________________________________

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->reviews = new ArrayCollection();
    }


    //      -               -               -              getter ID               -               -               -
    /**
     * The ID of the user
     *
     * @Groups( { "user:read" } )
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    //      -               -               -              getter & setter EMAIL               -               -               -
    /**
     * The email of the user
     *
     * @Groups( { "user:read" } )
     */
    public function getEmail(): ?string
    {
        return $this->user_email;
    }

    /**
     * The email of the user
     *
     * @Groups( { "user:write" } )
     */
    public function setEmail(string $user_email): self
    {
        $this->user_email = $user_email;

        return $this;
    }


    //      -               -               -              getter & setter PASSWORD               -               -               -
    /**
     * The password of the user
     */
    public function getPassword(): ?string
    {
        return $this->user_password;
    }

    /**
     * The password of the user
     *
     * @Groups( { "user:write" } )
     */
    public function setPassword(string $user_password): self
    {
        $this->user_password = $user_password;

        return $this;
    }


    //      -               -               -              getter & setter ROLES               -               -               -
    /**
     * The roles of the user
     *
     * @Groups( { "user:read" } )
     */
    public function getRoles(): array
    {
            $user_roles = $this->user_roles;

            // guarantee every user at least has ROLE_USER
            $user_roles[] = 'ROLE_USER';

            return array_unique($user_roles);
    }

    /**
     * The roles of the user
     *
     * @Groups( { "user:write" } )
     */
    public function setRoles(array $user_roles): self
    {
        $this->user_roles = $user_roles;

        return $this;
    }


    //      -               -               -              getter & setter USERNAME               -               -               -
    /**
     * The username of the user
     *
     * @Groups( { "user:read" } )
     */
    public function getUsername(): ?string
    {
        return $this->user_username;
    }

    /**
     * The username of the user
     *
     * @Groups( { "user:write" } )
     */
    public function setUsername(string $user_username): self
    {
        $this->user_username = $user_username;

        return $this;
    }


    //      -               -               -              setter SALT               -               -               -
    public function getSalt()
    {
    }

    //      -               -               -              ERASE CREDENTIALS               -               -               -
    public function eraseCredentials()
    {
    }



    //      -               -               -              getter & setter FIRST NAME               -               -               -
    /**
     * The first name of the user
     *
     * @Groups( { "user:read" } )
     */
    public function getUserFirstName(): ?string
    {
        return $this->user_first_name;
    }

    /**
     * The first name of the user
     *
     * @Groups( { "user:write" } )
     */
    public function setUserFirstName(string $user_first_name): self
    {
        $this->user_first_name = $user_first_name;

        return $this;
    }


    //      -               -               -              getter & setter LAST NAME               -               -               -
    /**
     * The last name of the user
     *
     * @Groups( { "user:read" } )
     */
    public function getUserLastName(): ?string
    {
        return $this->user_last_name;
    }

    /**
     * The last name of the user
     *
     * @Groups( { "user:write" } )
     */
    public function setUserLastName(string $user_last_name): self
    {
        $this->user_last_name = $user_last_name;

        return $this;
    }


    //      -               -               -              getter & setter CITY ID               -               -               -
    /**
     * The id of the city the user lives in
     *
     * @Groups( { "user:read" } )
     */
    public function getUserCityId(): ?city
    {
        return $this->user_city_id;
    }

    /**
     * The id of the city the user lives in
     *
     * @Groups( { "user:write" } )
     */
    public function setUserCityId(?city $user_city_id): self
    {
        $this->user_city_id = $user_city_id;

        return $this;
    }


    //      -               -               -              getter & setter COUNTRY ID               -               -               -
    /**
     * The id of the country the user lives in
     *
     * @Groups( { "user:read" } )
     */
    public function getUserCountryId(): ?country
    {
        return $this->user_country_id;
    }

    /**
     * The id of the country the user lives in
     *
     * @Groups( { "user:write" } )
     */
    public function setUserCountryId(?country $user_country_id): self
    {
        $this->user_country_id = $user_country_id;

        return $this;
    }


    //      -               -               -              getter & setter REGKEY               -               -               -
    /**
     * The regkey for the user
     *
     * @Groups( { "user:read" } )
     */
    public function getUserRegkey(): ?string
    {
        return $this->user_regkey;
    }

    /**
     * The regkey for the user
     *
     * @Groups( { "user:write" } )
     */
    public function setUserRegkey(string $user_regkey): self
    {
        $this->user_regkey = $user_regkey;

        return $this;
    }


    //      -               -               -              getter, adder & remover IMAGE               -               -               -
    /**
     * The images this user has posted
     *
     * @return Collection|Image[]
     * @Groups( { "user:read" } )

     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setImageUserId($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getImageUserId() === $this) {
                $image->setImageUserId(null);
            }
        }

        return $this;
    }


    //      -               -               -              getter, adder & remover REVIEW               -               -               -
    /**
     * The reviews belonging to these users
     *
     * @return Collection|Review[]
     * @Groups( { "user:read" } )
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(Review $review): self
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews[] = $review;
            $review->setReviewUserId($this);
        }

        return $this;
    }

    public function removeReview(Review $review): self
    {
        if ($this->reviews->contains($review)) {
            $this->reviews->removeElement($review);
            // set the owning side to null (unless already changed)
            if ($review->getReviewUserId() === $this) {
                $review->setReviewUserId(null);
            }
        }

        return $this;
    }
}