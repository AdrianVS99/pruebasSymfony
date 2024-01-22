<?php

namespace App\Entity;

use App\Repository\AsignaturaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AsignaturaRepository::class)]
class Asignatura
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $asignatura = null;

    #[ORM\ManyToMany(targetEntity: Alumno::class, inversedBy: 'asignaturas')]
    private Collection $alumnos;

    public function __construct()
    {
        $this->alumnos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAsignatura(): ?string
    {
        return $this->asignatura;
    }

    public function setAsignatura(string $asignatura): static
    {
        $this->asignatura = $asignatura;

        return $this;
    }

    /**
     * @return Collection<int, Alumno>
     */
    public function getAlumnos(): Collection
    {
        return $this->alumnos;
    }

    public function addAlumno(Alumno $alumno): static
    {
        if (!$this->alumnos->contains($alumno)) {
            $this->alumnos->add($alumno);
        }

        return $this;
    }

    public function removeAlumno(Alumno $alumno): static
    {
        $this->alumnos->removeElement($alumno);

        return $this;
    }
}
