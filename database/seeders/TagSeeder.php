<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'name' => 'PHP',
            'slug' => 'php',
        ]);
        Tag::create([
            'name' => 'Laravel',
            'slug' => 'laravel',
        ]);
        Tag::create([
            'name' => 'node.js',
            'slug' => 'node-js',
        ]);
        Tag::create([
            'name' => 'React',
            'slug' => 'react',
        ]);
        Tag::create([
            'name' => 'Javascript',
            'slug' => 'javascript',
        ]);
        Tag::create([
            'name' => 'C#',
            'slug' => 'c#',
        ]);
        Tag::create([
            'name' => 'ASP.Net',
            'slug' => 'asp-net',
        ]);
        Tag::create([
            'name' => 'CSS',
            'slug' => 'css',
        ]);
        Tag::create([
            'name' => 'SASS',
            'slug' => 'sass',
        ]);
    }
}
