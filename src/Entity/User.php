<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
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
    private $user_username;

    /**
     * @ORM\Column(type="string", length=512)
     */
    private $user_first_name;

    /**
     * @ORM\Column(type="string", length=512)
     */
    private $user_last_name;

    /**
     * @ORM\Column(type="integer")
     */
    private $user_city_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $user_country_id;

    /**
     * @ORM\Column(type="string", length=512)
     */
    private $user_email;

    /**
     * @ORM\Column(type="string", length=512)
     */
    private $user_password;

    /**
     * @ORM\Column(type="boolean")
     */
    private $user_is_admin;

    /**
     * @ORM\Column(type="string", length=512)
     */
    private $user_regkey;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserUsername(): ?string
    {
        return $this->user_username;
    }

    public function setUserUsername(string $user_username): self
    {
        $this->user_username = $user_username;

        return $this;
    }

    public function getUserFirstName(): ?string
    {
        return $this->user_first_name;
    }

    public function setUserFirstName(string $user_first_name): self
    {
        $this->user_first_name = $user_first_name;

        return $this;
    }

    public function getUserLastName(): ?string
    {
        return $this->user_last_name;
    }

    public function setUserLastName(string $user_last_name): self
    {
        $this->user_last_name = $user_last_name;

        return $this;
    }

    public function getUserCityId(): ?int
    {
        return $this->user_city_id;
    }

    public function setUserCityId(int $user_city_id): self
    {
        $this->user_city_id = $user_city_id;

        return $this;
    }

    public function getUserCountryId(): ?int
    {
        return $this->user_country_id;
    }

    public function setUserCountryId(int $user_country_id): self
    {
        $this->user_country_id = $user_country_id;

        return $this;
    }

    public function getUserEmail(): ?string
    {
        return $this->user_email;
    }

    public function setUserEmail(string $user_email): self
    {
        $this->user_email = $user_email;

        return $this;
    }

    public function getUserPassword(): ?string
    {
        return $this->user_password;
    }

    public function setUserPassword(string $user_password): self
    {
        $this->user_password = $user_password;

        return $this;
    }

    public function getUserIsAdmin(): ?bool
    {
        return $this->user_is_admin;
    }

    public function setUserIsAdmin(bool $user_is_admin): self
    {
        $this->user_is_admin = $user_is_admin;

        return $this;
    }

    public function getUserRegkey(): ?string
    {
        return $this->user_regkey;
    }

    public function setUserRegkey(string $user_regkey): self
    {
        $this->user_regkey = $user_regkey;

        return $this;
    }
}
