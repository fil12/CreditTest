<?php


namespace App\Http\Domain\Product\Validation;


use App\Http\Application\Dto\CreditRequestDto;

class CreditDtoValidator
{
    public function validate(CreditRequestDto $dto): void
    {
        if (!is_string($dto->getFirstName())) {
            throw new \InvalidArgumentException('First name must be a string!');
        }
        if (!is_string($dto->getSecondName())) {
            throw new \InvalidArgumentException('Second name must be a string!');
        }
        if (!is_string($dto->getLastName())) {
            throw new \InvalidArgumentException('Last name must be a string!');
        }
        if (!is_string($dto->getGender())) {
            throw new \InvalidArgumentException('Gender value must be a string!');
        }
        if (!is_int($dto->getAge())) {
            throw new \InvalidArgumentException('Age must be a integer!');
        }
        if (!is_int($dto->getCreditSum())) {
            throw new \InvalidArgumentException('Credit sum must be a integer!');
        }
    }
}
