<?php


namespace App\Http\Application\Service\Credit;


use App\Http\Application\Dto\CreditRequestDto;
use App\Http\Application\Service\Credit\Handler\CreditHandler;
use App\Http\Application\Service\Credit\Handler\DefaultHandler;
use App\Http\Application\Service\Credit\Handler\FifthProductHandler;
use App\Http\Application\Service\Credit\Handler\FirstProductHandler;
use App\Http\Application\Service\Credit\Handler\FourthProductHandler;
use App\Http\Application\Service\Credit\Handler\SecondProductHandler;
use App\Http\Application\Service\Credit\Handler\ThirdProductHandler;
use App\Http\Domain\Client\ClientService;

class ChainFactory
{
    protected $clientService;

    public function __construct(
        ClientService $clientService
    ) {
        $this->clientService = $clientService;
    }

    public function create(): CreditHandler
    {
        $firstProduct = new FirstProductHandler($this->clientService);
        $secondProduct = new SecondProductHandler($this->clientService);
        $thirdProduct = new ThirdProductHandler($this->clientService);
        $fourthProduct = new FourthProductHandler($this->clientService);
        $fifthProduct = new FifthProductHandler($this->clientService);
        $defaultProduct = new DefaultHandler();

        $firstProduct
            ->setNext($secondProduct)
            ->setNext($thirdProduct)
            ->setNext($fourthProduct)
            ->setNext($fifthProduct)
            ->setNext($defaultProduct);

        return $firstProduct;
    }
}
