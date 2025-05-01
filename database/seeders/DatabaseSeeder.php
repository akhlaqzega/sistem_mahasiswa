<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat user admin
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin' // Pastikan role di-set sebagai admin
        ]);

        // Opsional: Jika ingin admin juga punya profil, aktifkan ini
        // Profile::create([
        //     'user_id' => $admin->id,
        //     'nim' => '00000000',
        //     'fakultas' => 'Umum',
        //     'jurusan' => 'Administrasi',
        //     'semester' => 0,
        //     'alamat' => 'Kampus Pusat',
        //     'no_hp' => '080000000000',
        // ]);

        // Panggil seeder mahasiswa
        $this->call(UserSeeder::class);
    }
}
