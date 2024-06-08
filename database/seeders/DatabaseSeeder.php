<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Logbook;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => Hash::make(env('ADMIN_PASSWORD'))
        ]);
        Logbook::create([
            'nama' => 'Ryan',
            'kegiatan' => 'Membuat website untuk mengelola logbook tefa',
            'waktu masuk' => date('Y-m-d H:i:s'),
            'waktu keluar' => date('Y-m-d H:i:s'),
        ]);
    }
}
