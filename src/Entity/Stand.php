<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stand
 *
 * @ORM\Entity(repositoryClass="App\Repository\StandRepository")
 * @ORM\Table(name="stand", indexes={@ORM\Index(name="fk_stand_map_point1_idx", columns={"map_point_id"}), @ORM\Index(name="fk_stand_airport1_idx", columns={"airport_id"})})
 * @ORM\Entity
 */
class Stand
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
     * @var int|null
     *
     * @ORM\Column(name="heading", type="smallint", nullable=true)
     */
    private $heading;

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
     * @var \MapPoint
     *
     * @ORM\ManyToOne(targetEntity="MapPoint")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="map_point_id", referencedColumnName="id")
     * })
     */
    private $mapPoint;

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

    public function getHeading(): ?int
    {
        return $this->heading;
    }

    public function setHeading(?int $heading): self
    {
        $this->heading = $heading;

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

    public function getMapPoint(): ?MapPoint
    {
        return $this->mapPoint;
    }

    public function setMapPoint(?MapPoint $mapPoint): self
    {
        $this->mapPoint = $mapPoint;

        return $this;
    }


}
