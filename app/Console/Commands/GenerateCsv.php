<?php

namespace App\Console\Commands;

use App\Dto\FieldSet;
use App\Enum\DataType;
use Illuminate\Console\Command;

class GenerateCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function __construct(private readonly DataGenerator $csvCreator )
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        echo "Generating CSV file...\n";
        $time = microtime(true);
        $file = storage_path("app/test.csv");

        $fieldSet = $this->getFieldSet();

        $this->csvCreator->generateData($fieldSet, 1000000, $file);
        $newTime = microtime(true);
        echo "CSV file storage/app/test.csv generated in " . ($newTime - $time) . " seconds\n";
    }

    private function getFieldSet(): FieldSet
    {
        $fieldSet = new FieldSet();
        $fieldSet->addField(DataType::FirstName, "first_name");
        $fieldSet->addField(DataType::LastName, "last_name");
        $fieldSet->addField(DataType::Age, "age");
        $fieldSet->addField(DataType::Gender, "gender");
        $fieldSet->addField(DataType::MobileNumber, "mobile_number");
        $fieldSet->addField(DataType::Email, "email");
        $fieldSet->addField(DataType::City, "city");
        $fieldSet->addField(DataType::Login, "login");
        $fieldSet->addField(DataType::CarModel, "car_model");
        $fieldSet->addField(DataType::Salary, "salary");

        return $fieldSet;
    }
}
