<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Airport
 *
 * @ORM\Entity(repositoryClass="App\Repository\AirportRepository")
 * @ORM\Table(name="airport", indexes={@ORM\Index(name="fk_airport_map_point1_idx", columns={"arp_map_point_id"})})
 * @ORM\Entity
 */
class Airport
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
     * @var string
     *
     * @ORM\Column(name="city_name", type="string", length=255, nullable=false)
     */
    private $cityName;

    /**
     * @var \MapPoint
     *
     * @ORM\ManyToOne(targetEntity="MapPoint")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="arp_map_point_id", referencedColumnName="id")
     * })
     */
    private $arpMapPoint;

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

    public function getCityName(): ?string
    {
        return $this->cityName;
    }

    public function setCityName(string $cityName): self
    {
        $this->cityName = $cityName;

        return $this;
    }

    public function getArpMapPoint(): ?MapPoint
    {
        return $this->arpMapPoint;
    }

    public function setArpMapPoint(?MapPoint $arpMapPoint): self
    {
        $this->arpMapPoint = $arpMapPoint;

        return $this;
    }


}
