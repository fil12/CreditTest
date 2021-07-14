<?php

namespace App\Http\Application\Service\Credit;

use App\Http\Domain\Product\Product;
use App\Http\Domain\Product\Validation\CreditDtoValidator;
use Illuminate\Http\Request;

class CreditService
{
    protected $creditDtoFactory;
    protected $chainFactory;
    protected $creditDtoValidator;

    /**
     * CreditService constructor.
     * @param $creditDtoFactory
     */
    public function __construct(
        CreditDtoFactory $creditDtoFactory,
        ChainFactory $chainFactory,
        CreditDtoValidator $creditDtoValidator
    )
    {
        $this->creditDtoFactory = $creditDtoFactory;
        $this->chainFactory = $chainFactory;
        $this->creditDtoValidator = $creditDtoValidator;
    }

    public function getCredit(array $data): Product
    {
        $dto = $this->creditDtoFactory->create($data);
        $this->creditDtoValidator->validate($dto);
        $handler = $this->chainFactory->create();
        return $handler->handle($dto);
    }
}
