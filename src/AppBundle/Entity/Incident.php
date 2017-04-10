<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\IncidentRepository")
 * @ORM\Table(name="incident")
 * @JMS\ExclusionPolicy("all")
 */
class Incident
{
    const ACCIDENT_TYPE_SOLO = 'solo';
    const ACCIDENT_TYPE_UNKNOWN = 'unknown';
    const ACCIDENT_TYPE_OTHER = 'other';
    const ACCIDENT_TYPE_CROSSING = 'crossing';
    const ACCIDENT_TYPE_RAILROADCROSSING = 'railroadcrossing';
    const ACCIDENT_TYPE_RIGHTOFWAY = 'rightofway';
    const ACCIDENT_TYPE_REDLIGHT= 'redlight';
    const ACCIDENT_TYPE_RIGHTTURN = 'rightturm';
    const ACCIDENT_TYPE_FRONTAL = 'frontal';
    const ACCIDENT_TYPE_OVERTAKE = 'overtake';
    const ACCIDENT_TYPE_RAM = 'ram';
    const ACCIDENT_TYPE_PULLIN = 'pullin';
    const ACCIDENT_TYPE_DOORING = 'dooring';

    const ACCIDENT_SEX_MALE = 'm';
    const ACCIDENT_SEX_FEMALE = 'f';

    const ACCIDENT_LOCATION_CITY = 'city';
    const ACCIDENT_LOCATION_LAND = 'land';

    const ACCIDENT_INFRASTRUCTURE_ROAD = 'road';
    const ACCIDENT_INFRASTRUCTURE_CYCLEPATH = 'cyclepath';
    const ACCIDENT_INFRASTRUCTURE_SIDEWALK = 'sidewalk';
    const ACCIDENT_INFRASTRUCTURE_FREEDSIDEWALK = 'freedsidewalk';
    const ACCIDENT_INFRASTRUCTURE_COMBINED = 'combined';
    const ACCIDENT_INFRASTRUCTURE_RADFAHRSTREIFEN = 'radfahrstreifen';
    const ACCIDENT_INFRASTRUCTURE_SCHUTZSTREIFEN = 'schutzstreifen';
    const ACCIDENT_INFRASTRUCTURE_FAHRRADSTRASSE = 'fahrradstrasse';
    const ACCIDENT_INFRASTRUCTURE_OTHER = 'other';

    const ACCIDENT_OPPONENT_PEDESTRIAN = 'pedestrian';
    const ACCIDENT_OPPONENT_CYCLIST = 'cyclist';
    const ACCIDENT_OPPONENT_MOTORCYCLE = 'motorcycle';
    const ACCIDENT_OPPONENT_CAR = 'car';
    const ACCIDENT_OPPONENT_TRUCK = 'truck';
    const ACCIDENT_OPPONENT_TRACTOR = 'tractor';
    const ACCIDENT_OPPONENT_TRAIN = 'train';
    const ACCIDENT_OPPONENT_TRAM = 'tram';
    const ACCIDENT_OPPONENT_ANIMAL = 'animal';
    const ACCIDENT_OPPONENT_NONE = 'none';
    const ACCIDENT_OPPONENT_UNKNOWN = 'unknown';

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="NONE")
     * @JMS\Expose
     * @JMS\Type("integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $slug;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $title;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $description;

    /**
     * @ORM\Column(type="string", length=255)
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $geometryType;
    /**
     * @ORM\Column(type="string", length=255)
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $incidentType;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $dangerLevel;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $street;

    /**
     * @ORM\Column(type="string", length=16, nullable=true)
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $houseNumber;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $zipCode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $suburb;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $district;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $town;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $village;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $city;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $polyline;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @JMS\Expose
     * @JMS\Type("float")
     */
    protected $latitude = null;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @JMS\Expose
     * @JMS\Type("float")
     */
    protected $longitude = null;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @JMS\Expose
     * @JMS\Type("DateTime")
     */
    protected $dateTime;

    /**
     * @ORM\Column(type="boolean")
     * @JMS\Expose
     * @JMS\Type("boolean")
     */
    protected $expires;

    /**
     * @ORM\Column(type="datetime")
     * @JMS\Expose
     * @JMS\Type("DateTime")
     */
    protected $visibleFrom;

    /**
     * @ORM\Column(type="datetime")
     * @JMS\Expose
     * @JMS\Type("DateTime")
     */
    protected $visibleTo;

    /**
     * @ORM\Column(type="boolean")
     * @JMS\Expose
     * @JMS\Type("boolean")
     */
    protected $enabled = true;

    /**
     * @ORM\Column(type="datetime")
     * @JMS\Expose
     * @JMS\Type("DateTime")
     */
    protected $creationDateTime;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $permalink;

    /**
     * @ORM\Column(type="integer")
     */
    protected $views = 0;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $streetviewLink;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $accidentType = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $accidentLocation = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $accidentInfrastructure = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $accidentOpponent = null;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $accidentSex = null;

    /**
     * @ORM\Column(type="integer", length=255, nullable=true)
     * @JMS\Expose
     * @JMS\Type("integer")
     */
    protected $accidentAge = null;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @JMS\Expose
     * @JMS\Type("boolean")
     */
    protected $accidentPedelec = null;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @JMS\Expose
     * @JMS\Type("boolean")
     */
    protected $accidentHelmet = null;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @JMS\Expose
     * @JMS\Type("float")
     */
    protected $accidentAlcohol = null;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @JMS\Expose
     * @JMS\Type("boolean")
     */
    protected $accidentCyclistCaused = null;

    public function __construct()
    {
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function setLatitude(float $latitude): CoordinateInterface
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLongitude(float $longitude): CoordinateInterface
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function getPin(): string
    {
        return $this->latitude . ',' . $this->longitude;
    }

    public function getViews(): int
    {
        return $this->views;
    }

    public function setViews(int $views): ViewableInterface
    {
        $this->views = $views;

        return $this;
    }

    public function incViews(): int
    {
        return ++$this->views;
    }

    public function setSlug(string $slug): Incident
    {
        $this->slug = $slug;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setTitle(string $title): Incident
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setDescription(string $description): Incident
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setGeometryType(string $geometryType): Incident
    {
        $this->geometryType = $geometryType;

        return $this;
    }

    public function getGeometryType(): ?string
    {
        return $this->geometryType;
    }

    public function setIncidentType(string $incidentType): Incident
    {
        $this->incidentType = $incidentType;

        return $this;
    }

    public function getIncidentType(): ?string
    {
        return $this->incidentType;
    }

    public function setDangerLevel(string $dangerLevel): Incident
    {
        $this->dangerLevel = $dangerLevel;

        return $this;
    }

    public function getDangerLevel(): ?string
    {
        return $this->dangerLevel;
    }

    public function setAddress(string $address): Incident
    {
        $this->address = $address;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setStreet(string $street): Incident
    {
        $this->street = $street;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setHouseNumber(string $houseNumber): Incident
    {
        $this->houseNumber = $houseNumber;

        return $this;
    }

    public function getHouseNumber(): ?string
    {
        return $this->houseNumber;
    }

    public function setZipCode(string $zipCode): Incident
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setSuburb(string $suburb): Incident
    {
        $this->suburb = $suburb;

        return $this;
    }

    public function getSuburb(): ?string
    {
        return $this->suburb;
    }

    public function setDistrict(string $district): Incident
    {
        $this->district = $district;

        return $this;
    }

    public function getDistrict(): ?string
    {
        return $this->district;
    }

    public function setTown(string $town): Incident
    {
        $this->town = $town;
    }

    public function getTown(): ?string
    {
        return $this->town;
    }

    public function setVillage(string $village): Incident
    {
        $this->village = $village;

        return $this;
    }

    public function getVillage(): ?string
    {
        return $this->village;
    }

    public function setCity(string $city): Incident
    {
        $this->city = $city;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setPolyline($polyline): Incident
    {
        $this->polyline = $polyline;

        return $this;
    }

    public function getPolyline(): ?string
    {
        return $this->polyline;
    }

    public function setDateTime(\DateTime $dateTime): Incident
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    public function getDateTime(): ?\DateTime
    {
        return $this->dateTime;
    }

    public function setExpires(bool $expires): Incident
    {
        $this->expires = $expires;

        return $this;
    }

    public function getExpires(): ?bool
    {
        return $this->expires;
    }

    public function setVisibleFrom(\DateTime $visibleFrom): Incident
    {
        $this->visibleFrom = $visibleFrom;

        return $this;
    }

    public function getVisibleFrom(): ?\DateTime
    {
        return $this->visibleFrom;
    }

    public function setVisibleTo(\DateTime $visibleTo): Incident
    {
        $this->visibleTo = $visibleTo;

        return $this;
    }

    public function getVisibleTo(): ?\DateTime
    {
        return $this->visibleTo;
    }

    public function setEnabled(bool $enabled): Incident
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setCreationDateTime(\DateTime $creationDateTime): Incident
    {
        $this->creationDateTime = $creationDateTime;

        return $this;
    }

    public function getCreationDateTime(): ?\DateTime
    {
        return $this->creationDateTime;
    }

    public function setPermalink(string $permalink): Incident
    {
        $this->permalink = $permalink;

        return $this;
    }

    public function getPermalink(): ?string
    {
        return $this->permalink;
    }

    public function setStreetviewLink(string $streetviewLink): Incident
    {
        $this->streetviewLink = $streetviewLink;

        return $this;
    }

    public function getStreetviewLink(): ?string
    {
        return $this->streetviewLink;
    }

    /**
     * @JMS\VirtualProperty
     * @JMS\SerializedName("Timestamp")
     */
    public function getTimestamp(): int
    {
        return $this->dateTime->format('U');
    }

    /**
     * @JMS\VirtualProperty
     * @JMS\SerializedName("CreationTimestamp")
     */
    public function getCreationTimestamp(): int
    {
        return $this->creationDateTime->format('U');
    }

    /**
     * @JMS\VirtualProperty
     * @JMS\SerializedName("VisibleFromTimestamp")
     */
    public function getVisibleFromTimestamp(): int
    {
        return $this->creationDateTime->format('U');
    }

    /**
     * @JMS\VirtualProperty
     * @JMS\SerializedName("VisibleToTimestamp")
     */
    public function getVisibleToTimestamp(): int
    {
        return $this->creationDateTime->format('U');
    }

    public function getCyclewaysId(): string
    {
        if (!$this->permalink) {
            return 'undefined';
        }

        $code = substr($this->permalink, -5);

        $cyclewaysId = strtoupper($code);

        return $cyclewaysId;
    }

    public function getAccidentType(): ?string
    {
        return $this->accidentType;
    }

    public function setAccidentType(string $accidentType): Incident
    {
        $this->accidentType = $accidentType;

        return $this;
    }

    public function getAccidentLocation(): ?string
    {
        return $this->accidentLocation;
    }

    public function setAccidentLocation(string $accidentLocation): Incident
    {
        $this->accidentLocation = $accidentLocation;

        return $this;
    }

    public function getAccidentInfrastructure(): ?string
    {
        return $this->accidentInfrastructure;
    }

    public function setAccidentInfrastructure(string $accidentInfrastructure): Incident
    {
        $this->accidentInfrastructure = $accidentInfrastructure;

        return $this;
    }

    public function getAccidentOpponent(): ?string
    {
        return $this->accidentOpponent;
    }

    public function setAccidentOpponent(string $accidentOpponent): Incident
    {
        $this->accidentOpponent = $accidentOpponent;

        return $this;
    }

    public function getAccidentSex(): ?string
    {
        return $this->accidentSex;
    }

    public function setAccidentSex(string $accidentSex): Incident
    {
        $this->accidentSex = $accidentSex;

        return $this;
    }

    public function getAccidentAge(): ?int
    {
        return $this->accidentAge;
    }

    public function setAccidentAge(int $accidentAge): Incident
    {
        $this->accidentAge = $accidentAge;

        return $this;
    }

    public function getAccidentPedelec(): ?bool
    {
        return $this->accidentPedelec;
    }

    public function setAccidentPedelec(bool $accidentPedelec): Incident
    {
        $this->accidentPedelec = $accidentPedelec;

        return $this;
    }

    public function getAccidentHelmet(): ?bool
    {
        return $this->accidentHelmet;
    }

    public function setAccidentHelmet(bool $accidentHelmet): Incident
    {
        $this->accidentHelmet = $accidentHelmet;

        return $this;
    }

    public function getAccidentAlcohol(): ?float
    {
        return $this->accidentAlcohol;
    }

    public function setAccidentAlcohol(float $accidentAlcohol): Incident
    {
        $this->accidentAlcohol = $accidentAlcohol;

        return $this;
    }

    public function getAccidentCyclistCaused(): ?bool
    {
        return $this->accidentCyclistCaused;
    }

    public function setAccidentCyclistCaused(string $accidentCyclistCaused): Incident
    {
        $this->accidentCyclistCaused = $accidentCyclistCaused;

        return $this;
    }
}
