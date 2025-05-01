<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create sample mahasiswa with profile
        $mahasiswa = User::create([
            'name' => 'Mahasiswa Contoh',
            'email' => 'mahasiswa@example.com',
            'password' => bcrypt('password'),
            'role' => 'mahasiswa',
        ]);

        Profile::create([
            'user_id' => $mahasiswa->id,
            'nim' => '12345678',
            'fakultas' => 'Teknik',
            'jurusan' => 'Informatika',
            'semester' => 5,
            'alamat' => 'Jl. Contoh No. 123',
            'no_hp' => '081234567890',
        ]);
    }
}