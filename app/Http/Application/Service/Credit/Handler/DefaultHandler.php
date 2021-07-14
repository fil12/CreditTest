<?php


namespace App\Http\Application\Service\Credit\Handler;


use App\Http\Application\Dto\CreditRequestDto;
use App\Http\Domain\Product\Product;

class DefaultHandler extends CreditHandler
{
    /**
     * @param CreditRequestDto $dto
     * @return Product
     */
    public function handle(CreditRequestDto $dto): Product
    {
        dd($this);
      return new Product(
          6,
          'Minimal credit',
          22,
          1000,
          5000
      );
    }
}
