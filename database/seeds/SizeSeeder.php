<?php

use Illuminate\Database\Seeder;
use App\Size;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $size = [
            [
                'size'=>'All Size',
            ],
            [
                'size'=>'S',
            ],
            [
                'size'=>'M',
            ],
            [
                'size'=>'L',
            ],
        ];

        foreach ($size as $key => $value) {
            Size::create($value);
        }
    }
}
