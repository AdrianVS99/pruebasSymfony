<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: ArticleRepository::class)]

class Article
{
    
    #[ORM\Id()]
    #[ORM\GeneratedValue()]
    #[ORM\Column]
     
    
    private ?int $id = null; 
    
    
    #[ORM\Column(length: 255)]
    private ?string $article = null; 
   

    
    #[ORM\Column(length: 255)]
    private ?float $precio = null; 
    
    
    #[ORM\Column(length: 255)]
    private ?int $stock = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $descripcion = null; 
     
   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArticle(): ?string
    {
        return $this->article;
    }

    public function setArticle(string $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getPrecio(): ?float
    {
        return $this->precio;
    }

    public function setPrecio(float $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): static
    {
        $this->descripcion = $descripcion;

        return $this;
    }
}
