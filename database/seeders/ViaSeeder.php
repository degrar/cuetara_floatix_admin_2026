<?php

namespace Database\Seeders;

use App\Models\Via;
use Illuminate\Database\Seeder;

class ViaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws JsonException
     */
    public function run(): void
    {
        $via = json_decode(
            json: file_get_contents(__DIR__ . '/../../duplex/static/vias.json'),
            associative: true,
            flags: JSON_OBJECT_AS_ARRAY | JSON_THROW_ON_ERROR
        );

        Via::factory()
            ->createMany($via);
    }
}
