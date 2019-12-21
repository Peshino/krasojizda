<?php

use App\Color;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database color seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/data/colors.json');
        $colors = json_decode($json);
        foreach ($colors as $color) {
            Color::create(array(
                'id' => $color->id,
                'name' => $color->name,
                'hex_code' => $color->hex_code,
                'rgb_code' => $color->rgb_code
            ));
        }
    }
}
