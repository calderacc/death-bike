<?php

namespace Caldera\Bundle\DeathBikeBundle\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\ExclusionPolicy("all")
 */
class Incident
{
    const INCIDENT_RAGE = 'rage';
    const INCIDENT_ROADWORKS = 'roadworks';
    const INCIDENT_DANGER = 'danger';
    const INCIDENT_POLICE = 'police';
    const INCIDENT_ACCIDENT = 'accident';
    const INCIDENT_DEADLY_ACCIDENT = 'deadly_accident';
    const INCIDENT_INFRASTRUCTURE = 'infrastructure';

    const DANGER_LEVEL_NONE = 'none';
    const DANGER_LEVEL_LOW = 'low';
    const DANGER_LEVEL_NORMAL = 'normal';
    const DANGER_LEVEL_HIGH = 'high';

    const GEOMETRY_POLYLINE = 'polyline';
    const GEOMETRY_MARKER = 'marker';

    /**
     * @JMS\Expose
     * @JMS\Type("integer")
     */
    protected $id;

    /**
     * @JMS\Expose
     * @JMS\Type("Caldera\Bundle\DeathBikeBundle\Entity\City")
     */
    protected $city;

    /**
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $slug;

    /**
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $title;

    /**
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $description;

    /**
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $geometryType;

    /**
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $incidentType;

    /**
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $dangerLevel;

    /**
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $address;

    /**
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $street;

    /**
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $houseNumber;

    /**
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $zipCode;

    /**
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $suburb;

    /**
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $district;

    /**
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $polyline;

    /**
     * @JMS\Expose
     * @JMS\Type("float")
     */
    protected $latitude = null;

    /**
     * @JMS\Expose
     * @JMS\Type("float")
     */
    protected $longitude = null;

    /**
     * @JMS\Expose
     * @JMS\Type("datetime")
     */
    protected $dateTime;

    /**
     * @JMS\Expose
     * @JMS\Type("boolean")
     */
    protected $expires;

    /**
     * @JMS\Expose
     * @JMS\Type("datetime")
     */
    protected $visibleFrom;

    /**
     * @JMS\Expose
     * @JMS\Type("datetime")
     */
    protected $visibleTo;

    /**
     * @JMS\Expose
     * @JMS\Type("boolean")

     */
    protected $enabled = true;

    /**
     * @JMS\Expose
     * @JMS\Type("datetime")
     */
    protected $creationDateTime;

    /**
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $permalink;

    /**
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $streetviewLink;

    public function __construct()
    {
        $this->creationDateTime = new \DateTime();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setLatitude(float $latitude): Incident
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLongitude(float $longitude): Incident
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Incident
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Incident
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Incident
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set geometryType
     *
     * @param string $geometryType
     *
     * @return Incident
     */
    public function setGeometryType($geometryType)
    {
        $this->geometryType = $geometryType;

        return $this;
    }

    /**
     * Get geometryType
     *
     * @return string
     */
    public function getGeometryType()
    {
        return $this->geometryType;
    }

    /**
     * Set incidentType
     *
     * @param string $incidentType
     *
     * @return Incident
     */
    public function setIncidentType($incidentType)
    {
        $this->incidentType = $incidentType;

        return $this;
    }

    /**
     * Get incidentType
     *
     * @return string
     */
    public function getIncidentType()
    {
        return $this->incidentType;
    }

    /**
     * Set dangerLevel
     *
     * @param string $dangerLevel
     *
     * @return Incident
     */
    public function setDangerLevel($dangerLevel)
    {
        $this->dangerLevel = $dangerLevel;

        return $this;
    }

    /**
     * Get dangerLevel
     *
     * @return string
     */
    public function getDangerLevel()
    {
        return $this->dangerLevel;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Incident
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set street
     *
     * @param string $street
     *
     * @return Incident
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set houseNumber
     *
     * @param string $houseNumber
     *
     * @return Incident
     */
    public function setHouseNumber($houseNumber)
    {
        $this->houseNumber = $houseNumber;

        return $this;
    }

    /**
     * Get houseNumber
     *
     * @return string
     */
    public function getHouseNumber()
    {
        return $this->houseNumber;
    }

    /**
     * Set zipCode
     *
     * @param string $zipCode
     *
     * @return Incident
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set suburb
     *
     * @param string $suburb
     *
     * @return Incident
     */
    public function setSuburb($suburb)
    {
        $this->suburb = $suburb;

        return $this;
    }

    /**
     * Get suburb
     *
     * @return string
     */
    public function getSuburb()
    {
        return $this->suburb;
    }

    /**
     * Set district
     *
     * @param string $district
     *
     * @return Incident
     */
    public function setDistrict($district)
    {
        $this->district = $district;

        return $this;
    }

    /**
     * Get district
     *
     * @return string
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * Set polyline
     *
     * @param string $polyline
     *
     * @return Incident
     */
    public function setPolyline($polyline)
    {
        $this->polyline = $polyline;

        return $this;
    }

    /**
     * Get polyline
     *
     * @return string
     */
    public function getPolyline()
    {
        return $this->polyline;
    }

    /**
     * Set dateTime
     *
     * @param \DateTime $dateTime
     *
     * @return Incident
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    /**
     * Get dateTime
     *
     * @return \DateTime
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * Set expires
     *
     * @param boolean $expires
     *
     * @return Incident
     */
    public function setExpires($expires)
    {
        $this->expires = $expires;

        return $this;
    }

    /**
     * Get expires
     *
     * @return boolean
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * Set visibleFrom
     *
     * @param \DateTime $visibleFrom
     *
     * @return Incident
     */
    public function setVisibleFrom($visibleFrom)
    {
        $this->visibleFrom = $visibleFrom;

        return $this;
    }

    /**
     * Get visibleFrom
     *
     * @return \DateTime
     */
    public function getVisibleFrom()
    {
        return $this->visibleFrom;
    }

    /**
     * Set visibleTo
     *
     * @param \DateTime $visibleTo
     *
     * @return Incident
     */
    public function setVisibleTo($visibleTo)
    {
        $this->visibleTo = $visibleTo;

        return $this;
    }

    /**
     * Get visibleTo
     *
     * @return \DateTime
     */
    public function getVisibleTo()
    {
        return $this->visibleTo;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     *
     * @return Incident
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set creationDateTime
     *
     * @param \DateTime $creationDateTime
     *
     * @return Incident
     */
    public function setCreationDateTime($creationDateTime)
    {
        $this->creationDateTime = $creationDateTime;

        return $this;
    }

    /**
     * Get creationDateTime
     *
     * @return \DateTime
     */
    public function getCreationDateTime()
    {
        return $this->creationDateTime;
    }

    /**
     * Set permalink
     *
     * @param string $permalink
     *
     * @return Incident
     */
    public function setPermalink($permalink)
    {
        $this->permalink = $permalink;

        return $this;
    }

    /**
     * Get permalink
     *
     * @return string
     */
    public function getPermalink()
    {
        return $this->permalink;
    }

    /**
     * Set streetviewLink
     *
     * @param string $streetviewLink
     *
     * @return Incident
     */
    public function setStreetviewLink($streetviewLink)
    {
        $this->streetviewLink = $streetviewLink;

        return $this;
    }

    /**
     * Get streetviewLink
     *
     * @return string
     */
    public function getStreetviewLink()
    {
        return $this->streetviewLink;
    }

    /**
     * @param City $city
     * @return Incident
     */
    public function setCity(City $city = null): Incident
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return City
     */
    public function getCity(): ?City
    {
        return $this->city;
    }
}
