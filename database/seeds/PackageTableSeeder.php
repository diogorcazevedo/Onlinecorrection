<?php

use Illuminate\Database\Seeder;
use Onlinecorrection\Models\Package;

class PackageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Package::class,50)->create();
    }
}
