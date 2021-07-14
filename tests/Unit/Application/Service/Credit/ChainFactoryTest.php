<?php

namespace Tests\Unit\Application\Service\Credit;

use App\Http\Application\Service\Credit\ChainFactory;
use App\Http\Application\Service\Credit\Handler\CreditHandler;
use App\Http\Domain\Client\ClientService;
use PHPUnit\Framework\TestCase;

class ChainFactoryTest extends TestCase
{
    protected $clientService;
    protected $factory;

    protected function setUp(): void
    {
        $this->clientService = $this->createMock(ClientService::class);

        $this->factory = new ChainFactory($this->clientService);
    }

    public function testCreate()
    {
        $result = $this->factory->create();
        $this->assertInstanceOf(CreditHandler::class, $result);
    }
}
