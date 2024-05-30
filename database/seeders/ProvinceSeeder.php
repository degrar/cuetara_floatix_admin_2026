<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use JsonException;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws JsonException
     */
    public function run(): void
    {
        $provinces = json_decode(
            json: file_get_contents(__DIR__ . '/../../duplex/static/provinces.json'),
            associative: true,
            flags: JSON_OBJECT_AS_ARRAY | JSON_THROW_ON_ERROR
        );

        Province::factory()
            ->createMany($provinces);
    }
}
