<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $this->db->table('users')->insertBatch([
            [
                'username'   => 'admin.kaye',
                'full_name'  => 'Kaye Domingo',
                'created_at' => '2026-08-25 08:00:00',
            ],
            [
                'username'   => 'cashier.anna',
                'full_name'  => 'Anna Cruz',
                'created_at' => '2026-08-27 08:30:00',
            ],
            [
                'username'   => 'cashier.joel',
                'full_name'  => 'Joel Ramos',
                'created_at' => '2026-08-29 09:10:00',
            ],
            [
                'username'   => 'manager.luis',
                'full_name'  => 'Luis Navarro',
                'created_at' => '2026-09-02 10:25:00',
            ],
            [
                'username'   => 'inventory.mia',
                'full_name'  => 'Mia Flores',
                'created_at' => '2026-09-06 12:15:00',
            ],
            [
                'username'   => 'support.enzo',
                'full_name'  => 'Enzo Aquino',
                'created_at' => '2026-09-10 15:45:00',
            ],
        ]);
    }
}
