<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_categories')->delete();
        $serviceCategory=[
            [
            'name'=>'AC',
            'slug'=>'ac',
            'image'=>'1521969345.png'
            ],
            [
            'name'=>'Electronic',
            'slug'=>'electronic',
            'image'=>'1521969512.png'
            ],
            [
            'name'=>'Beauty',
            'slug'=>'beauty',
            'image'=>'1521969358.png'
            ],
            [
            'name'=>'HC',
            'slug'=>'hc',
            'image'=>'1521969409.png'
            ],
            [
            'name'=>'Repair',
            'slug'=>'repair',
            'image'=>'1521969576.png'
            ],
            [
            'name'=>'Maintenance',
            'slug'=>'maintenance',
            'image'=>'1521969512.png'
            ],
            [
            'name'=>'Electrical devices',
            'slug'=>'electrical-devices',
            'image'=>'1521969536.png'
            ],
            [
            'name'=>'Delivery',
            'slug'=>'delivery',
            'image'=>'1521969599.png'
            ],
        ];
        DB::table('service_categories')->insert($serviceCategory);
    }
}
