<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;       
use App\Models\Product;    

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        
        User::factory()->create([
            'name'  => 'test',
            'email' => 'test@gmail.com',
        ]);

        $this->call(ProductSeeder::class);
    }
}
