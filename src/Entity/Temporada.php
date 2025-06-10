<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TemporadaRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use JsonSerializable;

#[ORM\Entity(repositoryClass: TemporadaRepository::class)]
class Temporada implements JsonSerializable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    /**
     * @var Collection<int, episodio>
     */
    #[ORM\OneToMany(targetEntity: Episodio::class, mappedBy: 'temporada', orphanRemoval: true,cascade:['persist','remove'])]
    private Collection $episodeos;

    #[ORM\ManyToOne(inversedBy: 'temporadas')]
    #[ORM\JoinColumn(nullable: false)]
    private Series $series;

    public function __construct(
        #[ORM\Column]
        private int $numero,
    )
    {
        $this->episodeos = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, episodio>
     */
    public function getEpisodeos(): Collection
    {
        return $this->episodeos;
    }

    public function addEpisodeo(episodio $episodeo): self
    {
        if (!$this->episodeos->contains($episodeo)) {
            $this->episodeos->add($episodeo);
            $episodeo->setTemporada($this);
        }

        return $this;
    }

    public function removeEpisodeo(episodio $episodeo): self
    {
        $this->episodeos->removeElement($episodeo);
        
        return $this;
    }

    public function getSeries(): Series
    {
        return $this->series;
    }

    public function setSeries(Series $series): static
    {
        $this->series = $series;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'temporadas' => $this->numero,
            'episodios' => $this->episodeos
        ];
    }
}
