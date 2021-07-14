<?php


namespace App\Http\Application\Service\Credit\Handler;


use App\Http\Application\Dto\CreditRequestDto;
use App\Http\Domain\Client\ClientService;
use App\Http\Domain\Product\Product;

class SecondProductHandler extends CreditHandler
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

        if (
            is_null($client) &&
            $now->format('d.m.Y') == self::PROMOTION_DATE ||

            $now->format('d.m.Y') == self::PROMOTION_DATE &&
            $dto->getCreditSum() > 2000 &&
            $client->getCreditSum() == 0
        ) {
            return new Product(
                2,
                'promo credit',
                10,
                1000,
                15000
            );
        } else {
            return parent::handle($dto);
        }
    }
}
