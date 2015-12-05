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
        factory(Document::class,10)->create()->each(function($c){
            for($i = 0; $i <=5; $i++){
                $c->documents()->save(factory(Document::class)->make());
            }
        });
    }
}
