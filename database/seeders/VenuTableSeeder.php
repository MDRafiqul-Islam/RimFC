<?php

namespace Database\Seeders;

use App\Models\Venu;
use Illuminate\Database\Seeder;

class VenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Venu::create
        (
            [
                'name'=>'Aloron',
                'owner'=>'RIMFC',
                'capacity'=>500,
                'location'=>'Dhaka',
            ]
        );
    }
}
