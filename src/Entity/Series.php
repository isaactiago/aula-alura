<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\SeriesRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use JsonSerializable;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SeriesRepository::class)]
class Series implements JsonSerializable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    /**
     * @var Collection<int, temporada>
     */
    #[ORM\OneToMany(targetEntity: Temporada::class, mappedBy: 'series', orphanRemoval: true, cascade:['persist','remove'])]
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

    public function addTemporada(temporada $temporada): self
    {
        if (!$this->temporadas->contains($temporada)) {
            $this->temporadas->add($temporada);
            $temporada->setSeries($this);
        }

        return $this;
    }

    public function removeTemporada(temporada $temporada): self
    {
        $this->temporadas->removeElement($temporada);

        return $this;
    }


    public function jsonSerialize(): array
    {
        return [
            'nome' => $this->nome,
            'temporadas' => $this->temporadas,
        ];
    }
}
