<?php

namespace App\Entity;

use App\Repository\ExtensionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExtensionRepository::class)
 */
class Extension
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
    private $extensionFichier;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExtensionFichier(): ?string
    {
        return $this->extensionFichier;
    }

    public function setExtensionFichier(string $extensionFichier): self
    {
        $this->extensionFichier = $extensionFichier;

        return $this;
    }
}
