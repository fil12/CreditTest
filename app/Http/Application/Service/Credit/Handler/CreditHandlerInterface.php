<?php


namespace App\Http\Application\Service\Credit\Handler;


use App\Http\Application\Dto\CreditRequestDto;
use App\Http\Domain\Product\Product;

interface CreditHandlerInterface
{
    public function setNext(CreditHandlerInterface $handler): CreditHandlerInterface;

    public function handle(CreditRequestDto $dto): Product;
}
