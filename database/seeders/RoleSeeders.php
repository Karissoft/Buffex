<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::create(
            [
                'role' => 'admin',

            ],
        );
        \App\Models\Role::create(
            [
                'role' => 'vendor',

            ],
        );
        \App\Models\Role::create(
            [
                'role' => 'user',

            ],
        );
    }
}
