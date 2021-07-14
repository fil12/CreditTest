<?php


namespace App\Http\Application\Service\Credit\Handler;


use App\Http\Application\Dto\CreditRequestDto;
use App\Http\Domain\Client\ClientService;
use App\Http\Domain\Product\Product;

class FirstProductHandler extends CreditHandler
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
        $now =  new \DateTime('now');
        if (is_null($client) &&
            $now->format('d.m.Y') != self::PROMOTION_DATE ||

            $now->format('d.m.Y') != self::PROMOTION_DATE &&
            $client->getCreditSum() == 0
        ) {
            return new Product(
                1,
                'First credit',
                15,
                1000,
                10000
            );
        } else {
            return parent::handle($dto);
        }
    }
}
