<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Provider;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::factory()->count(1)->create();
    }
}
