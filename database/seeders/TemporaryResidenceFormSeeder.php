<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TemporaryResidenceForm;
class TemporaryResidenceFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TemporaryResidenceForm::factory()->count(5)->create();
    }

    // public function getDateFormat()
    // {
    //     return 'Y-m-d H:i:s'; // Customize the date format here
    // }
}
