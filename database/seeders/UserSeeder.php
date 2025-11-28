<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        User::create([
            'name'       => 'Ragheb Al-Oqab',
            'email'      => 'admin@example.com',
            'password'   => Hash::make('password'),
            'bio'        => 'I am a Full Stack Laravel Developer with strong experience in PHP, Laravel, Tailwind, Livewire, and building scalable systems.',
            'github'     => 'https://github.com/Ragheb-Aloqab',
            'linkedin'   => 'https://linkedin.com/',
            'twitter'    => 'https://twitter.com/',
            'behance'    => 'https://behance.net/',
            'profile_img'=> null,
            'cover_img'  => null,
            'cv_file'    => null,
        ]);
    }
}
