<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\refAgensi::factory()->create([
            'kod_agensi' => '1',
            'nama_agensi' => 'test agensi',
            'penerangan_agensi' => 'test description',
            'dibuat_oleh' => 'test',
            'dibuat_pada' => Carbon::now()->format('Y-m-d H:i:s'),
            'dikemaskini_oleh' => 'test',
            'dikemaskini_pada' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_hidden' => 0,
            'row_status' => 1,
        ]);
    }
}
