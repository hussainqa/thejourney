<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $codes = [];
        for ($i = 0; $i < 100; $i++) {
            $codes[] = Str::random(10);
        }

        // Insert the generated codes into the database
        foreach ($codes as $code) {
            DB::table('hotspot-codes')->insert([
                'code' => $code,
            ]);
        }
    }
}
