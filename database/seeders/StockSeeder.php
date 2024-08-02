<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use JsonException;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws JsonException
     */
    public function run(): void
    {
        $stocks = json_decode(
            json: file_get_contents(__DIR__ . '/../../duplex/static/stock.json'),
            associative: true,
            flags: JSON_OBJECT_AS_ARRAY | JSON_THROW_ON_ERROR
        );

        Stock::factory()
            ->createMany($stocks);
    }
}
