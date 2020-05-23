<?php

use Illuminate\Database\Seeder;
use App\Material;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $material = [
            [
                'material'=>'Premium Cotton',
            ],
            [
                'material'=>'Denim',
            ],
            [
                'material'=>'Polyester',
            ],
            [
                'material'=>'Cotton',
            ],
            [
                'material'=>'Wool',
            ],
            [
                'material'=>'Corduroy',
            ],
            [
                'material'=>'Knit',
            ],
        ];

        foreach ($material as $key => $value) {
            Material::create($value);
        }
    }
}
