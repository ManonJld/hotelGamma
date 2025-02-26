<?php

namespace App\Entity;

use App\Repository\AccomodationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AccomodationRepository::class)
 */
class Accomodation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photo;

    /**
     * @ORM\Column(type="smallint")
     */
    private $beds;

    /**
     * @ORM\Column(type="smallint")
     */
    private $persons;

    /**
     * @ORM\Column(type="integer")
     */
    private $size;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $price;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Type::class, inversedBy="accomodations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="accomodations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity=Photo::class, mappedBy="accomodation", orphanRemoval=true)
     */
    private $photos;

    /**
     * @ORM\OneToMany(targetEntity=Booking::class, mappedBy="accomodation", orphanRemoval=true)
     */
    private $bookings;

    /**
     * @ORM\ManyToMany(targetEntity=Amenity::class, mappedBy="accomodations")
     */
    private $amenities;

    public function __construct()
    {
        $this->photos = new ArrayCollection();
        $this->bookings = new ArrayCollection();
        $this->amenities = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getBeds(): ?int
    {
        return $this->beds;
    }

    public function setBeds(int $beds): self
    {
        $this->beds = $beds;

        return $this;
    }

    public function getPersons(): ?int
    {
        return $this->persons;
    }

    public function setPersons(int $persons): self
    {
        $this->persons = $persons;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(int $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

// j'avais mis string pour le champ description par erreur donc j'ai modifié à la main pour le mettre en text et ai régénéré les getters and setters
    public function getDescription()
    {
        return $this->description;
    }


    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|Photo[]
     */
    public function getPhotos(): Collection
    {
        return $this->photos;
    }

    public function addPhoto(Photo $photo): self
    {
        if (!$this->photos->contains($photo)) {
            $this->photos[] = $photo;
            $photo->setAccomodation($this);
        }

        return $this;
    }

    public function removePhoto(Photo $photo): self
    {
        if ($this->photos->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getAccomodation() === $this) {
                $photo->setAccomodation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Booking[]
     */
    public function getBookings(): Collection
    {
        return $this->bookings;
    }

    public function addBooking(Booking $booking): self
    {
        if (!$this->bookings->contains($booking)) {
            $this->bookings[] = $booking;
            $booking->setAccomodation($this);
        }

        return $this;
    }

    public function removeBooking(Booking $booking): self
    {
        if ($this->bookings->removeElement($booking)) {
            // set the owning side to null (unless already changed)
            if ($booking->getAccomodation() === $this) {
                $booking->setAccomodation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Amenity[]
     */
    public function getAmenities(): Collection
    {
        return $this->amenities;
    }

    public function addAmenity(Amenity $amenity): self
    {
        if (!$this->amenities->contains($amenity)) {
            $this->amenities[] = $amenity;
            $amenity->addAccomodation($this);
        }

        return $this;
    }

    public function removeAmenity(Amenity $amenity): self
    {
        if ($this->amenities->removeElement($amenity)) {
            $amenity->removeAccomodation($this);
        }

        return $this;
    }

    public function getTitle()
    {
        return $this->getType()." ".$this->getCategory();

    }

    public function __toString()
    {
        return $this->getType()." ".$this->getCategory()." ".$this->getId();
    }

}
