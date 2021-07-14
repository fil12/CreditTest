<?php

namespace Tests\Unit\Application\Service;

use App\Http\Application\Service\Credit\ChainFactory;
use App\Http\Application\Service\Credit\CreditDtoFactory;
use App\Http\Application\Service\Credit\CreditService;
use App\Http\Application\Service\Credit\Handler\FirstProductHandler;
use App\Http\Application\Service\Credit\Handler\SecondProductHandler;
use App\Http\Domain\Client\ClientService;
use App\Http\Domain\Product\Product;
use App\Http\Domain\Product\Validation\CreditDtoValidator;
use PHPUnit\Framework\TestCase;

class CreditServiceTest extends TestCase
{
    protected $creditDtoFactory;
    protected $chainFactory;
    protected $creditDtoValidator;
    protected $service;

    protected function setUp(): void
    {
        $this->creditDtoFactory = $this->createMock(CreditDtoFactory::class);
        $this->chainFactory = $this->createMock(ChainFactory::class);
        $this->creditDtoValidator = $this->createMock(CreditDtoValidator::class);

        $this->service = new CreditService(
            $this->creditDtoFactory,
            $this->chainFactory,
            $this->creditDtoValidator
        );
    }

    public function testGetCredit()
    {
        $data = [
                'firstName' => 'Peter',
                'secondName' => 'Jone',
                'lastName' => 'Pan',
                'age' => 18,
                'gender' => 'male',
                'creditSum' => '5000'
            ];

        $firstProduct = new FirstProductHandler(new ClientService());
        $secondProduct = new SecondProductHandler(new ClientService());
        $firstProduct->setNext($secondProduct);
        $this->creditDtoFactory
            ->expects($this->once())
            ->method('create');
        $this->creditDtoValidator
            ->expects($this->once())
            ->method('validate');
        $this->chainFactory
            ->expects($this->once())
            ->method('create')
            ->willReturn($firstProduct);
       $result = $this->service->getCredit($data);
      $this->assertInstanceOf(Product::class, $result);
    }
}
