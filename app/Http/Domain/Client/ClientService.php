<?php


namespace App\Http\Domain\Client;


use App\Http\Application\Dto\CreditRequestDto;
use function Composer\Autoload\includeFile;

class ClientService
{
    public function getClientByCreditDto(CreditRequestDto $dto): ?Client
    {
        $clients = (array) require "Data/clients.php";
        $clientFullName = $dto->getFirstName().' '.$dto->getSecondName().' '.$dto->getLastName();

        if (!is_array($clients)) {
            throw new \RuntimeException('Can`t get clients data.');
        }
        foreach ($clients as $item) {
            if ($clientFullName === $item['fullName']) {

                return new Client(
                    $item['id'],
                    $dto->getFirstName(),
                    $dto->getSecondName(),
                    $dto->getLastName(),
                    $item['age'],
                    $item['gender'],
                    $item['creditCount'],
                    $item['creditSum']
                );
            }
        }

        return null;
    }
}
