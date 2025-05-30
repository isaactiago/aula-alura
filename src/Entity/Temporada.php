<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TemporadaRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: TemporadaRepository::class)]
class Temporada
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column]
    private int $numero;

    /**
     * @var Collection<int, episodio>
     */
    #[ORM\OneToMany(targetEntity: episodio::class, mappedBy: 'temporada', orphanRemoval: true)]
    private Collection $episodeos;

    #[ORM\ManyToOne(inversedBy: 'temporadas')]
    #[ORM\JoinColumn(nullable: false)]
    private Series $series;

    public function __construct()
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

    public function addEpisodeo(episodio $episodeo): static
    {
        if (!$this->episodeos->contains($episodeo)) {
            $this->episodeos->add($episodeo);
            $episodeo->setTemporada($this);
        }

        return $this;
    }

    public function removeEpisodeo(episodio $episodeo): static
    {
        if ($this->episodeos->removeElement($episodeo)) {
            // set the owning side to null (unless already changed)
            if ($episodeo->getTemporada() === $this) {
                $episodeo->setTemporada(null);
            }
        }

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
}
