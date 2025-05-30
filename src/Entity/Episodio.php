<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\EpisodioRepository;

#[ORM\Entity(repositoryClass: EpisodioRepository::class)]
class Episodio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column]
    private int $numero;

    #[ORM\ManyToOne(inversedBy: 'episodeos')]
    #[ORM\JoinColumn(nullable: false)]
    private Temporada $temporada;

    public function getId(): int
    {
        return $this->id;
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): static
    {
        $this->numero = $numero;

        return $this;
    }

    public function getTemporada(): Temporada
    {
        return $this->temporada;
    }

    public function setTemporada(Temporada $temporada): static
    {
        $this->temporada = $temporada;

        return $this;
    }
}
