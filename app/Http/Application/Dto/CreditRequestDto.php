<?php


namespace App\Http\Application\Dto;


class CreditRequestDto
{
    protected $firstName;
    protected $secondName;
    protected $lastName;
    protected $age;
    protected $gender;
    protected $creditSum;

    /**
     * CreditRequestDto constructor.
     * @param $firstName
     * @param $secondName
     * @param $lastName
     * @param $age
     * @param $gender
     * @param $creditSum
     */
    public function __construct($firstName, $secondName, $lastName, $age, $gender, $creditSum)
    {
        $this->firstName = $firstName;
        $this->secondName = $secondName;
        $this->lastName = $lastName;
        $this->age = $age;
        $this->gender = $gender;
        $this->creditSum = $creditSum;
    }


    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return (string) ucfirst($this->firstName);
    }

    /**
     * @return string
     */
    public function getSecondName(): string
    {
        return (string) ucfirst($this->secondName);
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return (string) ucfirst($this->lastName);
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return (int) $this->age;
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return (string) $this->gender;
    }

    /**
     * @return int
     */
    public function getCreditSum(): int
    {
        return (int) $this->creditSum;
    }
}
