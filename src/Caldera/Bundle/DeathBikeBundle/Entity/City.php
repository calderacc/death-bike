<?php

namespace Caldera\Bundle\DeathBikeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity as UniqueEntity;

/**
 * @JMS\ExclusionPolicy("all")
 */
class City
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @JMS\Expose
     * @JMS\Type("integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $slug;

    /**
     * @ORM\Column(type="string", length=255)
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $name;

    /**
     * @ORM\Column(type="float")
     * @JMS\Expose
     * @JMS\Type("float")
     */
    protected $latitude = 0;

    /**
     * @ORM\Column(type="float")
     * @JMS\Expose
     * @JMS\Type("float")
     */
    protected $longitude = 0;

    /**
     * @ORM\Column(type="string", length=5)
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $zip;

    /**
     * @ORM\Column(type="integer")
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $locId;

    /**
     * @ORM\Column(type="integer")
     * @JMS\Expose
     * @JMS\Type("integer")
     */
    protected $population;

    /**
     * @ORM\Column(type="integer")
     * @JMS\Expose
     * @JMS\Type("integer")
     */
    protected $area;

    public function __construct()
    {

    }

    /**
     * @return integer
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param string $slug
     * @return City
     */
    public function setSlug(string $slug): City
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $name
     * @return City
     */
    public function setName(string $name): City
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param float $latitude
     * @return City
     */
    public function setLatitude(float $latitude): City
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @param float $longitude
     * @return City
     */
    public function setLongitude(float $longitude): City
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * @param string $zip
     * @return City
     */
    public function setZip(string $zip): City
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * @return string
     */
    public function getZip(): string
    {
        return $this->zip;
    }

    /**
     * @param int $locId
     * @return City
     */
    public function setLocId(int $locId): City
    {
        $this->locId = $locId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getLocId(): int
    {
        return $this->locId;
    }

    /**
     * @param integer $population
     * @return City
     */
    public function setPopulation(int $population): City
    {
        $this->population = $population;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPopulation(): int
    {
        return $this->population;
    }

    /**
     * @param integer $area
     * @return City
     */
    public function setArea(int $area): City
    {
        $this->area = $area;

        return $this;
    }

    /**
     * @return integer
     */
    public function getArea(): int
    {
        return $this->area;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->name;
    }
}
