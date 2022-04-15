<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Villa;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([

            'name' => 'Admin',
            'username' => 'Admin',
            'email' => 'ghilman.zaki1@gmail.com',
            'password' => bcrypt('admin123'),
            'isAdmin' => true,
            'asal' => "",
        ]);

        Villa::create([
            'namaVilla' => 'Villa Parahyangan',
            'lokasi' => 'Bandung',
            'deskripsi' => 'Villa Parahyangan',
            'harga' => '2.000.000'
        ]);
    }
}
