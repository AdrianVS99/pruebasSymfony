<?php

namespace App\Entity;

use App\Repository\EspecialidadRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EspecialidadRepository::class)]
class Especialidad
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $especialidad = null;

    #[ORM\OneToMany(mappedBy: 'especialidad', targetEntity: Profesor::class)]
    private Collection $profesor;

    public function __construct()
    {
        $this->profesor = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEspecialidad(): ?string
    {
        return $this->especialidad;
    }

    public function setEspecialidad(string $especialidad): static
    {
        $this->especialidad = $especialidad;

        return $this;
    }

    /**
     * @return Collection<int, Profesor>
     */
    public function getProfesor(): Collection
    {
        return $this->profesor;
    }

    public function addProfesor(Profesor $profesor): static
    {
        if (!$this->profesor->contains($profesor)) {
            $this->profesor->add($profesor);
            $profesor->setEspecialidad($this);
        }

        return $this;
    }

    public function removeProfesor(Profesor $profesor): static
    {
        if ($this->profesor->removeElement($profesor)) {
            // set the owning side to null (unless already changed)
            if ($profesor->getEspecialidad() === $this) {
                $profesor->setEspecialidad(null);
            }
        }

        return $this;
    }
}
