<?php

namespace App\tests;

use App\DTO\CriarSerieDTO;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use App\Repository\SeriesRepository;
use App\Service\CriarSerieService;

class CriarSerieTesteTest extends TestCase
{
    use ProphecyTrait;
   // public CriarSerieService $criarSerieService;
    

    public function testSomething(): void
    {
        $dto = new CriarSerieDTO('testeSerie');
        
        // ARRANGE - Preparar o teste
        
    

    $serieRepository = $this->createMock(SeriesRepository::class);
    // Configure the mock if needed, e.g.:
    // $serieRepository->method('salvar')->willReturn($nomeDaSerieEsperada);

    // ACT - Executar o teste

    $service = new CriarSerieService($serieRepository);
    $serie = $service->execute($dto);


        // ASSERT - Verificar o resultado
        //$this->assertINstaceOf(Series::class, $service);
        $this->assertEquals('testeSerie',$serie->getNome());
    }
}
