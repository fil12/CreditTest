<?php


namespace App\Http\Application\Service\Credit;


use App\Http\Application\Dto\CreditRequestDto;
use Illuminate\Http\Request;

class CreditDtoFactory
{
    public function create(Request $request): CreditRequestDto
    {
        $data = $request->request->all();
        return new CreditRequestDto(
            $data['firstName'],
            $data['secondName'],
            $data['lastName'],
            $data['age'],
            $data['gender'],
            $data['creditSum']
        );
    }
}
