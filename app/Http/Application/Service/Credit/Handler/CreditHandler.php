<?php


namespace App\Http\Application\Service\Credit\Handler;


use App\Http\Application\Dto\CreditRequestDto;
use App\Http\Domain\Product\Product;

abstract class CreditHandler implements CreditHandlerInterface
{
    public const PROMOTION_DATE = '15.07.2021';

    private $nextHandler;

    public function setNext(CreditHandlerInterface $handler): CreditHandlerInterface
    {
        $this->nextHandler = $handler;
        return $handler;
    }

    public function handle(CreditRequestDto $dto): Product
    {
        if ($this->nextHandler) {
            return $this->nextHandler->handle($dto);
        }

        throw new \InvalidArgumentException('Unfortunately, we could not find suitable loan conditions for you.');
    }
}
