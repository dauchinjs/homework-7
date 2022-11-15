<?php

namespace App;

use League\Csv\Reader;
use League\Csv\Statement;

class Csv {
    private array $companies;
    private array $header;
    private \League\Csv\TabularDataReader $records;

    public function getCsv() {
        $csv = Reader::createFromPath('/home/davids/Downloads/register.csv');
        $csv->setDelimiter(';');
        $csv->setHeaderOffset(0);

        $this->header = $csv->getHeader();

        $this->companies = [];

        $stmt = Statement::create()
            ->limit(30);
        $this->records = $stmt->process($csv);
    }
    public function getCompanies(): array {
        return $this->companies;
    }

    public function getHeader() {
        return $this->header;
    }

    public function getRecords() {
        return $this->records;
    }
}
