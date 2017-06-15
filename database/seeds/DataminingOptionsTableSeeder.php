<?php

use Illuminate\Database\Seeder;
use App\DataminingOption;

class DataminingOptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $model = new DataminingOption();

        $model->car_park       = 0;
        $model->garden         = 1;
        $model->one_bedroom    = 0;
        $model->two_bedroom    = 1;
        $model->three_bedroom  = 0;
        $model->one_bathroom   = 1;
        $model->two_bathroom   = 0;
        $model->three_bathroom = 1;
        $model->guest_room     = 0;
        $model->library        = 1;
        $model->solar_pannels  = 0;
        $model->house_name     = 'Makanjo Flats';
        $model->location       = 'Juja East';
        $model->description    = 'A good house';
        $model->price          = 1000000;

        $model->save();

        $model = new DataminingOption();

        $model->car_park       = 1;
        $model->garden         = 0;
        $model->one_bedroom    = 0;
        $model->two_bedroom    = 0;
        $model->three_bedroom  = 1;
        $model->one_bathroom   = 1;
        $model->two_bathroom   = 0;
        $model->three_bathroom = 0;
        $model->guest_room     = 0;
        $model->library        = 1;
        $model->solar_pannels  = 0;
        $model->house_name     = 'Budapest House';
        $model->location       = 'Thika East';
        $model->description    = 'A good house';
        $model->price          = 500000;

        $model->save();
    }
}
