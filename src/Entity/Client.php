<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Assert\Length(
     *      min = 4,
     *      max = 20,
     *      minMessage = "blabla",
     *      maxMessage = "toto"
     * )
     */
    private $fname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lname;

    /**
     * @ORM\ManyToOne(targetEntity=Color::class)
     */
    private $favouriteColor;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFname(): ?string
    {
        return $this->fname;
    }

    public function setFname(string $fname): self
    {
        $this->fname = $fname;

        return $this;
    }

    public function getLname(): ?string
    {
        return $this->lname;
    }

    public function setLname(string $lname): self
    {
        $this->lname = $lname;

        return $this;
    }

    public function getFavouriteColor(): ?Color
    {
        return $this->favouriteColor;
    }

    public function setFavouriteColor(?Color $favouriteColor): self
    {
        $this->favouriteColor = $favouriteColor;

        return $this;
    }
}
