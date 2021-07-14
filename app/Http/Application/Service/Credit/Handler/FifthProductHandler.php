<?php


namespace App\Http\Application\Service\Credit\Handler;


use App\Http\Application\Dto\CreditRequestDto;
use App\Http\Domain\Client\ClientService;
use App\Http\Domain\Product\Product;

class FifthProductHandler extends CreditHandler
{
    protected $clientService;
    protected const MIN_SUM = 10000;


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

        if ( $client->getCreditCount() > 4 && $dto->getCreditSum() > self::MIN_SUM) {
            return new Product(
                5,
                'credit №4',
                17,
                self::MIN_SUM,
                50000
            );
        } else {
            return parent::handle($dto);
        }
    }
}
