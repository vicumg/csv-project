<?php

namespace App\Module\Csv;

use App\Console\Commands\DataGenerator;
use App\Dto\FieldSet;
use App\Exception\UnknownDataType;
use Exception;
use Illuminate\Support\Facades\Log;


class CsvCreator implements DataGenerator
{
    public function __construct(
        private readonly DataCreator $stringGenerator,
        private readonly CswWriter $csvWriter
    )
    {
    }

    /**
     * @throws Exception
     */
    public function generateData(FieldSet $fieldSet, $rows, $destinationPath): void
    {
        $this->csvWriter->createFile($destinationPath);
        $header = $this->generateHeader($fieldSet);
        $this->csvWriter->writeHeader($header, $destinationPath);
        try {
            for ($i=0; $i<$rows; $i++) {
                $row = $this->generateRow($fieldSet);
                $this->csvWriter->writeRow($row, $destinationPath);
            }
        }catch (UnknownDataType $e){
            Log::error($e->getMessage());
            throw new Exception("Unknown data type");
        }

        $this->csvWriter->closeFile($destinationPath);
    }

    private function generateRow(FieldSet $fieldSet): array
    {
        $row = [];
        foreach ($fieldSet->getFields() as $field) {
            $row[] = $this->stringGenerator->generateData($field->getDataType());
        }
        return $row;
    }

    private function generateHeader(FieldSet $fieldSet): array
    {
        $header = [];
        foreach ($fieldSet->getFields() as $field) {
            $header[] = $field->getName();
        }
        return $header;
    }
}
