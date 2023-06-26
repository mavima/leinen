<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->truncate();

        DB::table('categories')->insert([
            'name' => 'Tools'
        ]);
        DB::table('categories')->insert([
            'name' => 'Garden tools'
        ]);
        DB::table('categories')->insert([
            'name' => 'Sport equipment'
        ]);
        DB::table('categories')->insert([
            'name' => 'Outdoor equipment'
        ]);
        DB::table('categories')->insert([
            'name' => 'Kitchen utensils'
        ]);
        DB::table('categories')->insert([
            'name' => 'Home electronics'
        ]);
        DB::table('categories')->insert([
            'name' => 'Baby equipment'
        ]);
        DB::table('categories')->insert([
            'name' => 'Toys and games'
        ]);
        DB::table('categories')->insert([
            'name' => 'Other'
        ]);
    }
}
