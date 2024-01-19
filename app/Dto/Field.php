<?php

namespace App\Dto;

use App\Enum\DataType;

class Field
{
    public function __construct(private DataType $dataType, private string $name)
    {
    }

    public function getDataType(): DataType
    {
        return $this->dataType;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
