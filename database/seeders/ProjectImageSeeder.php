<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\ProjectImage;

class ProjectImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        $project = Project::first();

        if(!$project) return;

        for ($i=1; $i<=3; $i++){
            $project->images()->create([
                'image_path' => 'defaults/sample'.$i.'.jpg'
            ]);
        }
    }
}
