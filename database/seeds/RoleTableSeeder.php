<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('roles')->truncate();

        \App\Role::create([
            'name' => 'Administrator'
        ]);

        \App\Role::create([
            'name' => 'Manager'
        ]);


    }
}
