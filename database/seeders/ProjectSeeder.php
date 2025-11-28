<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title_en' => 'Portfolio Website',
                'title_ar' => 'موقع بورتفوليو',
                'description_en'  => 'A modern Portfolio website with Laravel, Tailwind, Dashboard, Multilingual and Dark Mode.',
                'description_ar'  => 'موقع بورتفوليو حديث بلارافيل وتيلويند ولوحة تحكم ولغات متعددة ودارك مود.',
                'tech_stack'      => 'Laravel, Tailwind, Alpine.js',
                'project_url'     => 'https://example.com',
                'github_url'      => 'https://github.com',
                'thumbnail'       => 'defaults/project1.jpg',
                'is_featured'     => 1,
                'slug'            => Str::slug('Portfolio Website'),
            ],

            [
                'title_en' => 'E-Commerce System',
                'description_en'  => 'Full E-Commerce system with cart, checkout, payments.',
                'tech_stack'      => 'Laravel, MySQL, Tailwind',
                'thumbnail'       => 'defaults/project2.jpg',
                'is_featured'     => 0,
                'slug'            => Str::slug('E-Commerce System'),
            ],

            [
                'title_en' => 'Chat Application',
                'description_en'  => 'Real-time chat application with WebSockets.',
                'tech_stack'      => 'Laravel, Pusher, Alpine.js',
                'thumbnail'       => 'defaults/project3.jpg',
                'is_featured'     => 0,
                'slug'            => Str::slug('Chat Application'),
            ],
        ];

        foreach ($projects as $p){
            Project::create($p);
        }
    }
}
