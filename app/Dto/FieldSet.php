<?php

namespace App\Dto;

use App\Enum\DataType;

class FieldSet
{
    private array $fieldset = [];

    public function addField(DataType $dataType, $name): void
    {
        $this->fieldset[] = new Field($dataType, $name);
    }

    /**
     * @return Field[]
     */
    public function getFields(): array
    {
        return $this->fieldset;
    }
}
