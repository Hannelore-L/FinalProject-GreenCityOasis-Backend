<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CityRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CityRepository::class)
 */
class City
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $city_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $city_country_id;

    /**
     * @ORM\Column(type="smallint")
     */
    private $city_zip;

    /**
     * @ORM\Column(type="string", length=512)
     */
    private $city_name;

    public function getCityId(): ?int
    {
        return $this->city_id;
    }

    public function getCityCountryId(): ?int
    {
        return $this->city_country_id;
    }

    public function setCityCountryId(int $city_country_id): self
    {
        $this->city_country_id = $city_country_id;

        return $this;
    }

    public function getCityZip(): ?int
    {
        return $this->city_zip;
    }

    public function setCityZip(int $city_zip): self
    {
        $this->city_zip = $city_zip;

        return $this;
    }

    public function getCityName(): ?string
    {
        return $this->city_name;
    }

    public function setCityName(string $city_name): self
    {
        $this->city_name = $city_name;

        return $this;
    }
}
