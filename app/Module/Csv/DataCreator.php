<?php

namespace App\Module\Csv;
use App\Enum\DataType;

interface DataCreator
{
    public function generateData(DataType $dataType): string;
}
