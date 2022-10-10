<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StoreProduct implements ShouldQueue
{

    private string $name;
    private string $type;
    private int $quantity;
    private string $price;

    public function __construct(string $name, string $type, int $quantity, string $price)
    {
        $this->name = $name;
        $this->type = $type;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    public function handle()
    {
        $newOrganization = new Product([
            'name' => $this->name,
            'type' => $this->type,
            'quantity' => $this->quantity,
            'price' => $this->price*100,
        ]);
        $newOrganization->save();
    }
}
