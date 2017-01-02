<?php

namespace Caldera\Bundle\DeathBikeBundle\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\ExclusionPolicy("all")
 */
class City
{
    /**
     * @JMS\Expose
     * @JMS\Type("integer")
     */
    protected $id;

    /**
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $slug;

    /**
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $name;

    /**
     * @JMS\Expose
     * @JMS\Type("float")
     */
    protected $latitude = 0;

    /**
     * @JMS\Expose
     * @JMS\Type("float")
     */
    protected $longitude = 0;

    /**
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $zip;

    /**
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $locId;

    /**
     * @JMS\Expose
     * @JMS\Type("integer")
     */
    protected $population;

    /**
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
