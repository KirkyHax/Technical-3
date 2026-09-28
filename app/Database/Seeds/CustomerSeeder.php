<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $this->db->table('customers')->insertBatch([
            [
                'full_name'  => 'Andrea Santos',
                'email'      => 'andrea.santos@example.com',
                'phone'      => '0917 204 6813',
                'created_at' => '2026-09-01 09:15:00',
            ],
            [
                'full_name'  => 'Miguel Reyes',
                'email'      => 'miguel.reyes@example.com',
                'phone'      => '0918 775 2194',
                'created_at' => '2026-09-03 10:40:00',
            ],
            [
                'full_name'  => 'Jasmine Lim',
                'email'      => 'jasmine.lim@example.com',
                'phone'      => '0920 613 5528',
                'created_at' => '2026-09-05 14:05:00',
            ],
            [
                'full_name'  => 'Paolo Mendoza',
                'email'      => 'paolo.mendoza@example.com',
                'phone'      => '0921 804 3376',
                'created_at' => '2026-09-07 16:30:00',
            ],
            [
                'full_name'  => 'Nicole Garcia',
                'email'      => 'nicole.garcia@example.com',
                'phone'      => '0922 449 1820',
                'created_at' => '2026-09-09 11:20:00',
            ],
            [
                'full_name'  => 'Carlo Villanueva',
                'email'      => 'carlo.villanueva@example.com',
                'phone'      => '0923 558 7041',
                'created_at' => '2026-09-11 13:50:00',
            ],
        ]);
    }
}
