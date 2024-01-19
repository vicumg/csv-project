<?php

namespace App\Console\Commands;

use App\Dto\FieldSet;

interface DataGenerator
{
    public function generateData(FieldSet $fieldSet, $rows, $destinationPath): void;
}

