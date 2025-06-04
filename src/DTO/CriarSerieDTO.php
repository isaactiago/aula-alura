<?php

namespace App\DTO;

class CriarSerieDTO
{
    public function __construct(
        private string $nome
    ){
    }

    public function getNome(): string 
    {
        return $this->nome;
    }
}