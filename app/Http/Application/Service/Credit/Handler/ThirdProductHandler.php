<?php


namespace App\Http\Application\Service\Credit\Handler;


use App\Http\Application\Dto\CreditRequestDto;
use App\Http\Domain\Client\ClientService;
use App\Http\Domain\Product\Product;

class ThirdProductHandler extends CreditHandler
{
    protected $clientService;

    /**
     * FirstProductHandler constructor.
     * @param $clientService
     */
    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    public function handle(CreditRequestDto $dto): Product
    {
        $client = $this->clientService->getClientByCreditDto($dto);

        if ($client->getCreditCount() >= 2 && $client->getCreditCount() <= 4) {
            return new Product(
                3,
                'credit №3',
                20,
                1000,
                5000
            );
        } else {
            return parent::handle($dto);
        }
    }
}
