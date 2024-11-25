<?php

namespace Database\Seeders;

use App\Models\Retailer;
use Illuminate\Database\Seeder;

class RetailerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws JsonException
     */
    public function run(): void
    {
        $retailer = json_decode(
            json: file_get_contents(__DIR__ . '/../../duplex/static/retailers.json'),
            associative: true,
            flags: JSON_OBJECT_AS_ARRAY | JSON_THROW_ON_ERROR
        );

        Retailer::factory()
            ->createMany($retailer);
    }
}
