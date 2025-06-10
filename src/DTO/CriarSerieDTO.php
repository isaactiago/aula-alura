<?php

namespace App\DTO;

class CriarSerieDTO
{
    public function __construct(
        public readonly string $nome,
        public readonly int $temporada,
        public readonly int $episodios
    ){
    }
}