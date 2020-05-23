<?php

use Illuminate\Database\Seeder;
use App\Colour;

class ColourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colour = [
            [
                'colour'=>'Blue Denim',
            ],
            [
                'colour'=>'Black',
            ],
            [
                'colour'=>'Black - White',
            ],
            [
                'colour'=>'Grey',
            ],
            [
                'colour'=>'Red',
            ],
            [
                'colour'=>'Dark Grey - White',
            ],
            [
                'colour'=>'Green',
            ],
        ];

        foreach ($colour as $key => $value) {
            Colour::create($value);
        }
    }
}