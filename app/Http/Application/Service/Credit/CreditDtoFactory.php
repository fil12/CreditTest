<?php


namespace App\Http\Application\Service\Credit;


use App\Http\Application\Dto\CreditRequestDto;
use Illuminate\Http\Request;

class CreditDtoFactory
{
    public function create(array $data): CreditRequestDto
    {

        return new CreditRequestDto(
            $data['firstName'] ?? null,
            $data['secondName'] ?? null,
            $data['lastName'] ?? null,
            $data['age'] ?? null,
            $data['gender'] ?? null,
            $data['creditSum'] ?? null
        );
    }
}
