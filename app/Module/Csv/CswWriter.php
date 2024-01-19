<?php

namespace App\Module\Csv;

class CswWriter
{
    //todo: collect data in memory and write to file in chunks
    /**
     * @var false|resource
     */
    private $file;
    private int $columns = 0;

    public function createFile($destinationPath): void
    {
        $this->file = fopen($destinationPath, 'w');

    }

    public function writeHeader($header, $destinationPath): void
    {
        $this->columns = count($header);
        fputcsv($this->file, $header);
    }

    /**
     * @throws CsvException
     */
    public function writeRow($row, $destinationPath): void
    {
        if (count($row) !== $this->columns) {
            throw new CsvException("Row has different number of columns than header");
        }
        fputcsv($this->file, $row);
    }

    public function closeFile($destinationPath): void
    {
        fclose($this->file);
    }

    public function __destruct()
    {
        fclose($this->file);
    }
}
