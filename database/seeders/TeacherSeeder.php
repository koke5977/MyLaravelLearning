<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teachers')->insert([
            ['name' => '鈴木先生', 'created_at' => Now()],
            ['name' => '田中先生', 'created_at' => Now()],
            ['name' => '佐藤先生', 'created_at' => Now()],
            ['name' => '高橋先生', 'created_at' => Now()],
            ['name' => '竹下先生', 'created_at' => Now()],
        ]);
    }
}
