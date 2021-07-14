<?php


namespace App\Http\Application\Service\Credit\Handler;


use App\Http\Application\Dto\CreditRequestDto;
use App\Http\Domain\Client\ClientService;
use App\Http\Domain\Product\Product;

class FourthProductHandler extends CreditHandler
{
    protected $clientService;
    protected const MAX_SUM = 10000;

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

        if ( $client->getCreditCount() > 4 && $dto->getCreditSum() < self::MAX_SUM) {
            return new Product(
                4,
                'credit №4',
                17,
                1000,
                self::MAX_SUM
            );
        } else {
            return parent::handle($dto);
        }
    }
}
