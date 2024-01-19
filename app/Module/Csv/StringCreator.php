<?php
namespace App\Module\Csv;

use App\Enum\DataType;
use App\Exception\UnknownDataType;

class StringCreator implements DataCreator
{
    const Male = "male";
    const Female = "female";

    /**
     * @throws UnknownDataType
     */
    public function generateData(DataType $dataType): string
    {
        $result = match ($dataType) {
            DataType::FirstName => $this->firstName(),
            DataType::LastName => $this->lastName(),
            DataType::Gender => $this->gender(),
            DataType::Age => $this->age(),
            DataType::MobileNumber => $this->phoneNumber(),
            DataType::Email => $this->email(),
            DataType::City => $this->city(),
            DataType::Login => $this->login(),
            DataType::CarModel => $this->carModel(),
            DataType::Salary => $this->salary(),
            default => throw new UnknownDataType(),
        };

        return (string)$result;
    }

    private function firstName(): string
    {
        return fake()->firstName();
    }

    public function age(): int
    {
        return fake()->numberBetween(16, 70);
    }

    private function lastName(): string
    {
        return fake()->lastName();
    }

    private function gender(): string
    {
        return rand(0, 1) ? self::Female : self::Male;
    }

    private function phoneNumber(): string
    {
        return fake()->phoneNumber();
    }

    private function email(): string
    {
        return fake()->email();
    }

    private function city(): string
    {
        return fake()->city();
    }

    private function login(): string
    {
        return fake()->userName();
    }

    private function carModel(): string
    {
        return fake()->randomElement(['BMW', 'Audi', 'Mercedes', 'Toyota', 'Honda', 'Ford', 'Fiat', 'Skoda', 'Volkswagen']);
    }

    private function salary(): int
    {
        return fake()->numberBetween(1000, 10000);
    }

}
