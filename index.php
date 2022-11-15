<?php

require_once 'vendor/autoload.php';

use App\Company;
//use App\Csv;
use League\Csv\Reader;
use League\Csv\Statement;

$csv = Reader::createFromPath('/home/davids/Downloads/register.csv'); //klase
$csv->setDelimiter(';');
$csv->setHeaderOffset(0);

$header = $csv->getHeader();

$companies = [];

$stmt = Statement::create()
    ->limit(30);
$records = $stmt->process($csv); //klase

foreach($records as $record) {
    $companies [] = new Company($record['name'], $record['regcode']);
}


echo "1 - Output last 30 records. " . PHP_EOL .
    "2 - Enter your search by name. " . PHP_EOL .
    "3 - Enter your search by registration code. " . PHP_EOL .
    "4 - Exit " . PHP_EOL;
$input = readline("Enter your choice (1-4): ");
echo PHP_EOL . PHP_EOL;

if($input == 1) {
    foreach($companies as $company) {
        echo $company->getCompanyInfo();
    }
} else if($input == 2) {
    $companyName = readline("Enter company name: ");
    foreach($companies as $company) {
        if($company->getName() === $companyName) {
            echo $company->getCompanyInfo();
        }
    }
} else if($input == 3) {
    $registrationCode = readline("Enter registration code: ");
    foreach($companies as $company) {
        if($company->getRegistrationCode() === $registrationCode) {
            echo $company->getCompanyInfo();
        }
    }
} else if($input == 4) {
    exit;
}
