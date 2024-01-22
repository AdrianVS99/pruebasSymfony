<?php

namespace App\Entity;

use App\Repository\ProfesorRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfesorRepository::class)]
class Profesor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $apellido = null;

    #[ORM\Column(length: 255)]
    private ?string $nif = null;

    // #[ORM\Column(length: 255)]
    // private ?string $fecha_nacimiento = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fecha_nacimienito = null;

    #[ORM\ManyToOne(inversedBy: 'profesor')]
    private ?Especialidad $especialidad = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(?string $apellido): static
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getNif(): ?string
    {
        return $this->nif;
    }

    public function setNif(string $nif): static
    {
        $this->nif = $nif;

        return $this;
    }

    // public function getFechaNacimiento(): ?string
    // {
    //     return $this->fecha_nacimiento;
    // }

    // public function setFechaNacimiento(string $fecha_nacimiento): static
    // {
    //     $this->fecha_nacimiento = $fecha_nacimiento;

    //     return $this;
    // }

    public function getFechaNacimienito(): ?\DateTimeInterface
    {
        return $this->fecha_nacimienito;
    }

    public function setFechaNacimienito(?\DateTimeInterface $fecha_nacimienito): static
    {
        $this->fecha_nacimienito = $fecha_nacimienito;

        return $this;
    }

    public function getEspecialidad(): ?Especialidad
    {
        return $this->especialidad;
    }

    public function setEspecialidad(?Especialidad $especialidad): static
    {
        $this->especialidad = $especialidad;

        return $this;
    }

}
