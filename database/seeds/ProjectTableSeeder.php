<?php

use Illuminate\Database\Seeder;
use Onlinecorrection\Models\Project;
use Onlinecorrection\Models\Document;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Project::class,5)->create();
    }
}
