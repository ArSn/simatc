<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Runway
 *
 * @ORM\Entity(repositoryClass="App\Repository\RunwayRepository")
 * @ORM\Table(name="runway", indexes={@ORM\Index(name="fk_runway_airport_idx", columns={"airport_id"})})
 * @ORM\Entity
 */
class Runway
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
    private $updatedAt;

    /**
     * @var bool
     *
     * @ORM\Column(name="number", type="boolean", nullable=false)
     */
    private $number;

    /**
     * @var string|null
     *
     * @ORM\Column(name="alignment", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $alignment;

    /**
     * @var int|null
     *
     * @ORM\Column(name="heading", type="smallint", nullable=true)
     */
    private $heading;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="reverse_number", type="boolean", nullable=true)
     */
    private $reverseNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reverse_alignment", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $reverseAlignment;

    /**
     * @var int|null
     *
     * @ORM\Column(name="reverse_heading", type="smallint", nullable=true)
     */
    private $reverseHeading;

    /**
     * @var int|null
     *
     * @ORM\Column(name="length_in_feet", type="smallint", nullable=true)
     */
    private $lengthInFeet;

    /**
     * @var int|null
     *
     * @ORM\Column(name="length_in_meters", type="smallint", nullable=true)
     */
    private $lengthInMeters;

    /**
     * @var \Airport
     *
     * @ORM\ManyToOne(targetEntity="Airport")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="airport_id", referencedColumnName="id")
     * })
     */
    private $airport;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="MapPoint", inversedBy="runway")
     * @ORM\JoinTable(name="runway_map_point",
     *   joinColumns={
     *     @ORM\JoinColumn(name="runway_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="map_point_id", referencedColumnName="id")
     *   }
     * )
     */
    private $mapPoint;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->mapPoint = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getNumber(): ?bool
    {
        return $this->number;
    }

    public function setNumber(bool $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getAlignment(): ?string
    {
        return $this->alignment;
    }

    public function setAlignment(?string $alignment): self
    {
        $this->alignment = $alignment;

        return $this;
    }

    public function getHeading(): ?int
    {
        return $this->heading;
    }

    public function setHeading(?int $heading): self
    {
        $this->heading = $heading;

        return $this;
    }

    public function getReverseNumber(): ?bool
    {
        return $this->reverseNumber;
    }

    public function setReverseNumber(?bool $reverseNumber): self
    {
        $this->reverseNumber = $reverseNumber;

        return $this;
    }

    public function getReverseAlignment(): ?string
    {
        return $this->reverseAlignment;
    }

    public function setReverseAlignment(?string $reverseAlignment): self
    {
        $this->reverseAlignment = $reverseAlignment;

        return $this;
    }

    public function getReverseHeading(): ?int
    {
        return $this->reverseHeading;
    }

    public function setReverseHeading(?int $reverseHeading): self
    {
        $this->reverseHeading = $reverseHeading;

        return $this;
    }

    public function getLengthInFeet(): ?int
    {
        return $this->lengthInFeet;
    }

    public function setLengthInFeet(?int $lengthInFeet): self
    {
        $this->lengthInFeet = $lengthInFeet;

        return $this;
    }

    public function getLengthInMeters(): ?int
    {
        return $this->lengthInMeters;
    }

    public function setLengthInMeters(?int $lengthInMeters): self
    {
        $this->lengthInMeters = $lengthInMeters;

        return $this;
    }

    public function getAirport(): ?Airport
    {
        return $this->airport;
    }

    public function setAirport(?Airport $airport): self
    {
        $this->airport = $airport;

        return $this;
    }

    /**
     * @return Collection|MapPoint[]
     */
    public function getMapPoint(): Collection
    {
        return $this->mapPoint;
    }

    public function addMapPoint(MapPoint $mapPoint): self
    {
        if (!$this->mapPoint->contains($mapPoint)) {
            $this->mapPoint[] = $mapPoint;
        }

        return $this;
    }

    public function removeMapPoint(MapPoint $mapPoint): self
    {
        $this->mapPoint->removeElement($mapPoint);

        return $this;
    }

}
