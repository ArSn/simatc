<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Taxiway
 *
 * @ORM\Entity(repositoryClass="App\Repository\TaxiwayRepository")
 * @ORM\Table(name="taxiway", indexes={@ORM\Index(name="fk_taxiway_airport1_idx", columns={"airport_id"})})
 * @ORM\Entity
 */
class Taxiway
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

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
     * @ORM\ManyToMany(targetEntity="MapPoint", inversedBy="taxiway")
     * @ORM\JoinTable(name="taxiway_map_point",
     *   joinColumns={
     *     @ORM\JoinColumn(name="taxiway_id", referencedColumnName="id")
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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
