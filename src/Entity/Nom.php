<?php

namespace App\Entity;

use App\Repository\NomRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NomRepository::class)
 */
class Nom
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
    private $nomFichierEnvoye;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFichierEnvoye(): ?string
    {
        return $this->nomFichierEnvoye;
    }

    public function setNomFichierEnvoye(string $nomFichierEnvoye): self
    {
        $this->nomFichierEnvoye = $nomFichierEnvoye;

        return $this;
    }
}
