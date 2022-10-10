<?php

namespace App\Jobs;

use App\Models\Organization;
use Illuminate\Contracts\Queue\ShouldQueue;

class StoreOrganization implements ShouldQueue
{
    private string $name;
    private string $address;
    private int $contactNumber;
    private string $contactEmail;

    public function __construct(string $name, string $address, int $contactNumber, string $contactEmail)
    {

        $this->name = $name;
        $this->address = $address;
        $this->contactNumber = $contactNumber;
        $this->contactEmail = $contactEmail;
    }
    public function handle()
    {
        $newOrganization = new Organization([
            'name' => $this->name,
            'address' => $this->address,
            'contact_number' => $this->contactNumber,
            'contact_email' => $this->contactEmail,
        ]);
        $newOrganization->save();
    }
}
