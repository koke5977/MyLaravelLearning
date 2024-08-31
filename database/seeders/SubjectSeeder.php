<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subjects')->insert([
            ['name' => '国語', 'created_at' => Now()],
            ['name' => '社会', 'created_at' => Now()],
            ['name' => '算数', 'created_at' => Now()],
            ['name' => '理科', 'created_at' => Now()],
            ['name' => '英語', 'created_at' => Now()],
        ]);
    }
}
