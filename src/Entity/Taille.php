<?php

namespace App\Entity;

use App\Repository\TailleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TailleRepository::class)
 */
class Taille
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $tailleFichier;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTailleFichier(): ?float
    {
        return $this->tailleFichier;
    }

    public function setTailleFichier(float $tailleFichier): self
    {
        $this->tailleFichier = $tailleFichier;

        return $this;
    }
}
