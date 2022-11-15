<?php

namespace App;

class Company {
    private string $companyName;
    private string $registrationCode;

    public function __construct(string $companyName, string $registrationCode) {
        $this->companyName = $companyName;
        $this->registrationCode = $registrationCode;
    }

    public function getName(): string
    {
        return $this->companyName;
    }

    public function getRegistrationCode(): string
    {
        return $this->registrationCode;
    }

    public function getCompanyInfo(): string {
        return "Company: " . $this->getName() . " | Registration code: " . $this->getRegistrationCode() . PHP_EOL;
    }
}

