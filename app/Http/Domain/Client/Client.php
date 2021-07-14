<?php


namespace App\Http\Domain\Client;


use App\Http\Domain\Common\Model;

class Client extends Model
{
    protected $id;
    protected $firstName;
    protected $secondName;
    protected $lastName;
    protected $age;
    protected $gender;
    protected $creditCount;
    protected $creditSum;

    /**
     * Client constructor.
     * @param $id
     * @param $firstName
     * @param $secondName
     * @param $lastName
     * @param $age
     * @param $gender
     */
    public function __construct(
        int $id,
        string $firstName,
        string $secondName,
        string $lastName,
        int $age,
        string $gender,
        int $creditCount,
        int $creditSum
    )
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->secondName = $secondName;
        $this->lastName = $lastName;
        $this->age = $age;
        $this->gender = $gender;
        $this->creditCount = $creditCount;
        $this->creditSum = $creditSum;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getSecondName(): string
    {
        return $this->secondName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @return int
     */
    public function getCreditCount(): int
    {
        return $this->creditCount;
    }

    /**
     * @return int
     */
    public function getCreditSum(): int
    {
        return $this->creditSum;
    }
}
