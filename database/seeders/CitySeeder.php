<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            [
                'name' => 'Aalborg',
            ],
            [
                'name' => 'Aarhus',
            ],
            [
                'name' => 'Aba',
            ],
            [
                'name' => 'Abeokuta',
            ],
            [
                'name' => 'Abovyan',
            ],
            [
                'name' => 'Abuja',
            ],
            [
                'name' => 'Accra',
            ],
            [
                'name' => 'Adana',
            ],
            [
                'name' => 'Zaria',
            ],
            [
                'name' => 'Zenica',
            ],
            [
                'name' => 'Zhodzina',
            ],
            [
                'name' => 'Zilina',
            ],
            [
                'name' => 'Zvolen',
            ],
            [
                'name' => 'Zürich',
            ],
            [
                'name' => 'Other'
            ]
        ];

        City::insert($cities);
    }
}
