<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Project;
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $technologiesData = [
            [
                "name" => "Laravel",
                "color" => "#ff5733"
            ],
            [
                "name" => "Bootstrap",
                "color" => "#ffbd33"
            ],
            [
                "name" => "Vite",
                "color" => "#33ffbd"
            ],
            [
                "name" => "Vue",
                "color" => "#33ff57"
            ],
        ];

        foreach ($technologiesData as $technologyData){
            Technology::create($technologyData);
        }
    }
}
