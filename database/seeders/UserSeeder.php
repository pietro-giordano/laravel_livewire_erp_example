<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testUsers = [
            [
                'name' => 'HR',
                'email' => 'hr@example.com',
                'role_id' => Role::IS_HR
            ],
            [
                'name' => 'Manager',
                'email' => 'manager@example.com',
                'role_id' => Role::IS_MANAGER
            ],
            [
                'name' => 'Impiegato',
                'email' => 'employee@example.com',
                'role_id' => Role::IS_EMPLOYEE
            ]
        ];

        foreach ($testUsers as $user) {
            User::factory()->create($user);
        }

        User::factory()->count(20)->state(['role_id' => Role::IS_EMPLOYEE])->create();
        User::factory()->count(3)->state(['role_id' => Role::IS_MANAGER])->create();
    }
}
