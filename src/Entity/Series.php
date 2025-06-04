<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\SeriesRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SeriesRepository::class)]
class Series
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    

    /**
     * @var Collection<int, temporada>
     */
    #[ORM\OneToMany(targetEntity: temporada::class, mappedBy: 'series', orphanRemoval: true)]
    private Collection $temporadas;

    public function __construct(
        #[ORM\Column]
        #[Assert\NotBlank]
        #[Assert\Length(min:5)]
        private string $nome
    )
    {
        $this->temporadas = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return Collection<int, temporada>
     */
    public function getTemporadas(): Collection
    {
        return $this->temporadas;
    }

    public function addTemporada(temporada $temporada): static
    {
        if (!$this->temporadas->contains($temporada)) {
            $this->temporadas->add($temporada);
            $temporada->setSeries($this);
        }

        return $this;
    }

    public function removeTemporada(temporada $temporada): static
    {
        if ($this->temporadas->removeElement($temporada)) {
            // set the owning side to null (unless already changed)
            if ($temporada->getSeries() === $this) {
                $temporada->setSeries(null);
            }
        }

        return $this;
    }
}
