<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectsTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $portfolioProject = Project::find(1);
        $portfolioProject->tags()->attach([1,2]);

        $portfolioProject = Project::find(2);
        $portfolioProject->tags()->attach([3,8]);
        
        $portfolioProject = Project::find(3);
        $portfolioProject->tags()->attach([4,5,8]);

        $portfolioProject = Project::find(4);
        $portfolioProject->tags()->attach([9]);

        $portfolioProject = Project::find(5);
        $portfolioProject->tags()->attach([5,8]);
    }
}
