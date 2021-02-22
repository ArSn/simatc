<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * MapPoint
 *
 * @ORM\Entity(repositoryClass="App\Repository\MapPointRepository")
 * @ORM\Table(name="map_point")
 * @ORM\Entity
 */
class MapPoint
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
     * @var string
     *
     * @ORM\Column(name="latitude", type="decimal", precision=9, scale=6, nullable=false)
     */
    private $latitude;

    /**
     * @var string
     *
     * @ORM\Column(name="longitude", type="decimal", precision=9, scale=6, nullable=false)
     */
    private $longitude;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Runway", mappedBy="mapPoint")
     */
    private $runway;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Taxiway", mappedBy="mapPoint")
     */
    private $taxiway;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->runway = new \Doctrine\Common\Collections\ArrayCollection();
        $this->taxiway = new \Doctrine\Common\Collections\ArrayCollection();
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

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(string $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(string $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * @return Collection|Runway[]
     */
    public function getRunway(): Collection
    {
        return $this->runway;
    }

    public function addRunway(Runway $runway): self
    {
        if (!$this->runway->contains($runway)) {
            $this->runway[] = $runway;
            $runway->addMapPoint($this);
        }

        return $this;
    }

    public function removeRunway(Runway $runway): self
    {
        if ($this->runway->removeElement($runway)) {
            $runway->removeMapPoint($this);
        }

        return $this;
    }

    /**
     * @return Collection|Taxiway[]
     */
    public function getTaxiway(): Collection
    {
        return $this->taxiway;
    }

    public function addTaxiway(Taxiway $taxiway): self
    {
        if (!$this->taxiway->contains($taxiway)) {
            $this->taxiway[] = $taxiway;
            $taxiway->addMapPoint($this);
        }

        return $this;
    }

    public function removeTaxiway(Taxiway $taxiway): self
    {
        if ($this->taxiway->removeElement($taxiway)) {
            $taxiway->removeMapPoint($this);
        }

        return $this;
    }

}
