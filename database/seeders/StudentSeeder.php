<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            ['name' => '生徒A', 'created_at' => Now()],
            ['name' => '生徒B', 'created_at' => Now()],
            ['name' => '生徒C', 'created_at' => Now()],
            ['name' => '生徒D', 'created_at' => Now()],
            ['name' => '生徒E', 'created_at' => Now()],
            ['name' => '生徒F', 'created_at' => Now()],
        ]);
    }
}
