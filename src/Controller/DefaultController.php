<?php

namespace App\Controller;

use PhpParser\Node\Expr\Throw_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class DefaultController extends AbstractController
{
    public function toJsonResponse(
       mixed $data = null,
       int $statusCode = Response::HTTP_OK 
    ): Response 
    {
        return $this->json([
            'data' => $data,
            'code' => $statusCode
        ],$statusCode);
    }

    public function toJsonResponseException(
        Throwable $previus,
        int $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR
    ):Response
    {
        return $this->json([
            'mensage' => $previus->getMessage(),
            'code' => $statusCode,
            'error' => (string) $previus
        ],$statusCode);
    }
}