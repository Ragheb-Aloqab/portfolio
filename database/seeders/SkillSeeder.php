<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            ['name_en'=>'Laravel','icon_class'=>'fa-brands fa-laravel','level'=>95],
            ['name_en'=>'PHP','icon_class'=>'fa-brands fa-php','level'=>90],
            ['name_en'=>'MySQL','icon_class'=>'fa-solid fa-database','level'=>85],
            ['name_en'=>'TailwindCSS','icon_class'=>'fa-solid fa-wind','level'=>88],
            ['name_en'=>'JavaScript','icon_class'=>'fa-brands fa-js','level'=>80],
            ['name_en'=>'HTML','icon_class'=>'fa-brands fa-html5','level'=>95],
            ['name_en'=>'CSS','icon_class'=>'fa-brands fa-css3','level'=>90],
        ];

        foreach($skills as $s){
            Skill::create($s);
        }
    }
}