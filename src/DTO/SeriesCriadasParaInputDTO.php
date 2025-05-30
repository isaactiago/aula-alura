<?php

namespace App\DTO;

class SeriesCriadasParaInputDTO
{
    public function __construct(
        public  string $nomeSerie = '',
        public  int $quantidadeDeTemporadas = 0,
        public  int $epsodiosPorTemporada = 0
    ){

    }
}
